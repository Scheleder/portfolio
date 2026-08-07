<?php

use App\Http\Controllers\TipDetailController;
use App\Http\Controllers\UserApprovalController;
use Illuminate\Support\Facades\Route;

// Rotas do Portfólio
Route::get('/', function () {
    return view('portfolio.index');
})->name('portfolio.index');

Route::get('/profile', function () {
    return view('portfolio.profile');
})->name('portfolio.profile');

Route::get('/education', function () {
    return view('portfolio.education');
})->name('portfolio.education');

Route::get('/career', function () {
    return view('portfolio.career');
})->name('portfolio.career');

Route::get('/projects', function () {
    return view('portfolio.projects');
})->name('portfolio.projects');

Route::get('/contact', function () {
    return view('portfolio.contact');
})->name('portfolio.contact');

// Rotas do TechTips
Route::get('/techtips', function () {
    return view('portfolio.techtips-list');
})->name('techtips.index');

Route::get('/tip/{slug}', [TipDetailController::class, 'show'])->name('tip.show');
Route::post('/tip/{slug}/share', [TipDetailController::class, 'share'])->name('tip.share')->middleware('auth');

Route::any('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/admin/toggle-layout', function () {
    $current = session('filament_navigation_layout', 'sidebar');
    $new = $current === 'top' ? 'sidebar' : 'top';
    session(['filament_navigation_layout' => $new]);
    return back();
})->name('filament.toggle-layout')->middleware(['web', 'auth']);

Route::get('/admin/logout', fn () => redirect()->route('logout'));

Route::match(['get', 'post'], '/approve-user/{user}', [UserApprovalController::class, 'handle'])->name('user.approve.show');
