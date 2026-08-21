<?php

namespace Tests\Feature;

use App\Events\TipViewed;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Tip;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class TechTipsTest extends TestCase
{
    use RefreshDatabase;

    protected Tip $tip;

    protected function setUp(): void
    {
        parent::setUp();

        // Criar estrutura de dados básica para os testes
        $category = Category::create([
            'name' => 'Backend',
            'slug' => 'backend',
        ]);

        $subcategory = Subcategory::create([
            'category_id' => $category->id,
            'name' => 'Laravel',
            'slug' => 'laravel',
        ]);

        $this->tip = Tip::create([
            'subcategory_id' => $subcategory->id,
            'title' => 'Test Tip',
            'slug' => 'test-tip',
            'content' => 'This is a test tip content.',
            'type' => 'dica',
            'is_public' => true,
        ]);
    }

    public function test_portfolio_home_page_returns_ok(): void
    {
        $response = $this->get(route('portfolio.index'));

        $response->assertStatus(200);
        $response->assertSee('Desenvolvimento sob medida');
    }

    public function test_techtips_index_page_returns_ok(): void
    {
        $response = $this->get(route('techtips.index'));

        $response->assertStatus(200);
        $response->assertSee('TechTips Repository');
    }

    public function test_tip_detail_page_increments_views_and_dispatches_event(): void
    {
        Event::fake();

        $this->assertEquals(0, $this->tip->view_count);

        $response = $this->get(route('tip.show', $this->tip->slug));

        $response->assertStatus(200);
        $response->assertSee('Test Tip');

        Event::assertDispatched(TipViewed::class);
    }

    public function test_guest_cannot_access_filament_admin(): void
    {
        $response = $this->get('/admin');

        // Filament redireciona visitantes para a página de login
        $response->assertRedirect('/admin/login');
    }

    public function test_non_admin_can_access_filament_dashboard_but_not_user_management(): void
    {
        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
            'is_blocked' => false,
        ]);

        // Usuários comuns (não bloqueados) agora podem acessar o painel principal
        $response = $this->actingAs($user)->get('/admin');
        $response->assertStatus(200);

        // Mas eles não podem gerenciar outros usuários (403 Forbidden)
        $responseUsers = $this->get('/admin/users');
        $responseUsers->assertStatus(403);
    }

    public function test_admin_can_access_filament_dashboard(): void
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        $response = $this->actingAs($admin)->get('/admin');

        $response->assertStatus(200);
    }

    public function test_user_registration_creates_blocked_non_admin_user_and_sends_email(): void
    {
        \Illuminate\Support\Facades\Mail::fake();

        \Livewire\Livewire::test(\App\Filament\Pages\Auth\CustomRegister::class)
            ->set('data.name', 'New Registered User')
            ->set('data.email', 'new@example.com')
            ->set('data.password', 'password')
            ->set('data.passwordConfirmation', 'password')
            ->call('register')
            ->assertRedirect('/');

        $user = User::where('email', 'new@example.com')->first();
        $this->assertNotNull($user);
        $this->assertTrue($user->is_blocked);
        $this->assertFalse($user->is_admin);

        \Illuminate\Support\Facades\Mail::assertSent(\App\Mail\NewUserRegistered::class, function ($mail) use ($user) {
            return $mail->user->id === $user->id && $mail->hasTo('me@scheleder.com');
        });
    }

    public function test_blocked_user_cannot_login(): void
    {
        $user = User::create([
            'name' => 'Blocked User',
            'email' => 'blocked@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
            'is_blocked' => true,
        ]);

        \Livewire\Livewire::test(\App\Filament\Pages\Auth\CustomLogin::class)
            ->set('data.email', 'blocked@example.com')
            ->set('data.password', 'password')
            ->call('authenticate');

        $this->assertFalse(auth()->check());
    }

    public function test_user_approval_process(): void
    {
        \Illuminate\Support\Facades\Mail::fake();

        $user = User::create([
            'name' => 'Pending Approval User',
            'email' => 'pending@example.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
            'is_blocked' => true,
        ]);

        $url = \Illuminate\Support\Facades\URL::temporarySignedRoute(
            'user.approve.show',
            now()->addDays(7),
            ['user' => $user->id]
        );

        $response = $this->get($url);
        $response->assertStatus(200);
        $response->assertSee('Pending Approval User');

        $response = $this->post($url, ['status' => 'approve']);
        $response->assertRedirect('/');

        $user->refresh();
        $this->assertFalse($user->is_blocked);

        \Illuminate\Support\Facades\Mail::assertSent(\App\Mail\UserAccessApproved::class, function ($mail) use ($user) {
            return $mail->user->id === $user->id && $mail->hasTo('pending@example.com');
        });
    }

    public function test_user_can_change_own_password(): void
    {
        \Filament\Facades\Filament::setCurrentPanel(\Filament\Facades\Filament::getPanel('admin'));

        $user = User::create([
            'name' => 'Self User',
            'email' => 'self@example.com',
            'password' => bcrypt('old-password'),
            'is_admin' => true,
            'is_blocked' => false,
        ]);

        $this->actingAs($user);

        \Livewire\Livewire::test(\App\Filament\Resources\Users\Pages\EditUser::class, [
            'record' => $user->id,
        ])
        ->callFormComponentAction('password_actions', 'changeOwnPassword', [
            'new_password' => 'new-secure-password',
            'new_password_confirmation' => 'new-secure-password',
        ])
        ->assertHasNoFormComponentActionErrors();

        $this->assertTrue(\Illuminate\Support\Facades\Hash::check('new-secure-password', $user->refresh()->password));
    }

    public function test_admin_can_reset_another_users_password(): void
    {
        \Illuminate\Support\Facades\Mail::fake();
        \Filament\Facades\Filament::setCurrentPanel(\Filament\Facades\Filament::getPanel('admin'));

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin-test@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
            'is_blocked' => false,
        ]);

        $targetUser = User::create([
            'name' => 'Target User',
            'email' => 'target@example.com',
            'password' => bcrypt('original-password'),
            'is_admin' => false,
            'is_blocked' => false,
        ]);

        $this->actingAs($admin);

        \Livewire\Livewire::test(\App\Filament\Resources\Users\Pages\EditUser::class, [
            'record' => $targetUser->id,
        ])
        ->callFormComponentAction('password_actions', 'resetUserPassword')
        ->assertHasNoFormComponentActionErrors();

        $this->assertFalse(\Illuminate\Support\Facades\Hash::check('original-password', $targetUser->refresh()->password));

        \Illuminate\Support\Facades\Mail::assertSent(\App\Mail\UserPasswordReset::class, function ($mail) use ($targetUser) {
            return $mail->user->id === $targetUser->id && $mail->hasTo('target@example.com');
        });
    }

    public function test_private_cards_visibility_logic(): void
    {
        $owner = User::create([
            'name' => 'Owner User',
            'email' => 'owner@example.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
            'is_blocked' => false,
        ]);

        $otherUser = User::create([
            'name' => 'Other User',
            'email' => 'other@example.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
            'is_blocked' => false,
        ]);

        $category = Category::create(['name' => 'General Category', 'slug' => 'general-category']);
        $subcategory = Subcategory::create(['name' => 'General Subcategory', 'slug' => 'general-subcategory', 'category_id' => $category->id]);

        $publicTip = Tip::create([
            'user_id' => $owner->id,
            'subcategory_id' => $subcategory->id,
            'title' => 'Public Tip Title',
            'slug' => 'public-tip-title',
            'content' => 'Content',
            'type' => 'dica',
            'is_public' => true,
        ]);

        $privateTip = Tip::create([
            'user_id' => $owner->id,
            'subcategory_id' => $subcategory->id,
            'title' => 'Private Tip Title',
            'slug' => 'private-tip-title',
            'content' => 'Content',
            'type' => 'dica',
            'is_public' => false,
        ]);

        // 1. Guest access to detail pages
        $this->get('/tip/public-tip-title')->assertStatus(200);
        $this->get('/tip/private-tip-title')->assertStatus(404);

        // 2. Guest listing check
        $response = $this->get(route('techtips.index'));
        $response->assertSee('Public Tip Title');
        $response->assertDontSee('Private Tip Title');

        // 3. Owner access to detail pages
        $this->actingAs($owner);
        $this->get('/tip/public-tip-title')->assertStatus(200);
        $this->get('/tip/private-tip-title')->assertStatus(200);

        // 4. Owner listing check
        $response = $this->get(route('techtips.index'));
        $response->assertSee('Public Tip Title');
        $response->assertSee('Private Tip Title');

        // 5. Other user access to detail pages
        $this->actingAs($otherUser);
        $this->get('/tip/public-tip-title')->assertStatus(200);
        $this->get('/tip/private-tip-title')->assertStatus(404);

        // 6. Other user listing check
        $response = $this->get(route('techtips.index'));
        $response->assertSee('Public Tip Title');
        $response->assertDontSee('Private Tip Title');

        // 7. Admin user access to detail pages (should see other user's private tip)
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin-view-test@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
            'is_blocked' => false,
        ]);
        $this->actingAs($admin);
        $this->get('/tip/public-tip-title')->assertStatus(200);
        $this->get('/tip/private-tip-title')->assertStatus(200);

        // 8. Admin user listing check (should see other user's private tip)
        $response = $this->get(route('techtips.index'));
        $response->assertSee('Public Tip Title');
        $response->assertSee('Private Tip Title');
    }
}
