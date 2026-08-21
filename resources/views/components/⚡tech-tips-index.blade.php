<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Tip;
use Illuminate\Support\Str;

new class extends Component {
    use WithPagination;

    public $search = '';
    public $categoryId = '';
    public $subcategoryId = '';
    public $type = '';
    public $sort = 'latest';

    protected $queryString = [
        'search' => ['except' => ''],
        'categoryId' => ['except' => ''],
        'subcategoryId' => ['except' => ''],
        'type' => ['except' => ''],
        'sort' => ['except' => 'latest'],
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function updatedCategoryId()
    {
        $this->subcategoryId = '';
        $this->resetPage();
    }
    public function updatedSubcategoryId()
    {
        $this->resetPage();
    }
    public function updatedType()
    {
        $this->resetPage();
    }
    public function updatedSort()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->reset(['search', 'categoryId', 'subcategoryId', 'type', 'sort']);
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::with('subcategories')->get();
        $subcategories = $this->categoryId ? Subcategory::where('category_id', $this->categoryId)->get() : collect();

        $tips = Tip::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('content', 'like', '%' . $this->search . '%')
                        ->orWhere('tags', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->categoryId, function ($query) {
                $query->whereHas('subcategory', function ($q) {
                    $q->where('category_id', $this->categoryId);
                });
            })
            ->when($this->subcategoryId, function ($query) {
                $query->where('subcategory_id', $this->subcategoryId);
            })
            ->when($this->type, function ($query) {
                $query->where('type', $this->type);
            })
            ->where(function ($query) {
                if (auth()->check() && auth()->user()->is_admin) {
                    return;
                }
                $query->where('is_public', true);
                if (auth()->check()) {
                    $query->orWhere('user_id', auth()->id());
                }
            })
            ->with(['subcategory.category', 'images'])
            ->orderBy($this->sort === 'views' ? 'view_count' : 'created_at', 'desc')
            ->paginate(6);

        return view('components.⚡tech-tips-index', [
            'categories' => $categories,
            'subcategories' => $subcategories,
            'tips' => $tips,
        ]);
    }
};
?>

<div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
    <!-- Sidebar de Filtros -->
    <div
        class="lg:col-span-1 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm p-6 rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/30 self-start space-y-6">
        <!-- Botão Painel Administrativo -->
        <a href="/admin"
            class="w-full py-2.5 px-4 bg-primary-dark text-white hover:bg-opacity-90 text-sm font-bold rounded-xl transition duration-300 flex items-center justify-center gap-2 shadow-md border border-primary-dark dark:border-primary-light">
            <ion-icon name="shield-checkmark-outline" class="text-lg"></ion-icon>
            Painel Administrativo
        </a>

        <div>
            <h3 class="text-lg font-bold text-gray-900 dark:text-white flex items-center gap-2 mb-4">
                <ion-icon name="funnel-outline" class="text-primary-dark dark:text-primary-light"></ion-icon>
                Filtros
            </h3>

            <!-- Campo de Busca -->
            <div class="space-y-2">
                <label class="text-sm font-semibold text-gray-650 dark:text-gray-400">Pesquisar</label>
                <div class="relative">
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Título, conteúdo..."
                        class="w-full pl-10 pr-4 py-2 text-sm bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-650 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-dark dark:focus:ring-primary-light text-gray-800 dark:text-gray-150 transition duration-350">
                    <span class="absolute left-3 top-2.5 text-gray-450 dark:text-gray-405">
                        <ion-icon name="search-outline" class="text-lg"></ion-icon>
                    </span>
                </div>
            </div>
        </div>

        <!-- Categoria -->
        <div class="space-y-2">
            <label class="text-sm font-semibold text-gray-650 dark:text-gray-400 font-medium">Categoria</label>
            <select wire:model.live="categoryId"
                class="w-full p-2.5 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-650 rounded-xl text-sm focus:outline-none text-gray-800 dark:text-gray-150">
                <option value="">Todas as Categorias</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Subcategoria -->
        @if ($categoryId)
            <div class="space-y-2">
                <label class="text-sm font-semibold text-gray-650 dark:text-gray-400 font-medium">Subcategoria</label>
                <select wire:model.live="subcategoryId"
                    class="w-full p-2.5 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-650 rounded-xl text-sm focus:outline-none text-gray-800 dark:text-gray-150">
                    <option value="">Todas as Subcategorias</option>
                    @foreach ($subcategories as $sub)
                        <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <!-- Tipo -->
        <div class="space-y-2">
            <label class="text-sm font-semibold text-gray-650 dark:text-gray-400 font-medium">Tipo</label>
            <select wire:model.live="type"
                class="w-full p-2.5 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-650 rounded-xl text-sm focus:outline-none text-gray-800 dark:text-gray-150">
                <option value="">Todos os Tipos</option>
                <option value="dica">Dica</option>
                <option value="método">Método</option>
                <option value="comando">Comando</option>
                <option value="snippet">Snippet</option>
                <option value="tutorial">Tutorial</option>
            </select>
        </div>

        <!-- Ordenação -->
        <div class="space-y-2">
            <label class="text-sm font-semibold text-gray-650 dark:text-gray-400 font-medium">Ordenar por</label>
            <select wire:model.live="sort"
                class="w-full p-2.5 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-650 rounded-xl text-sm focus:outline-none text-gray-800 dark:text-gray-150">
                <option value="latest">Mais recentes</option>
                <option value="views">Mais visualizados</option>
            </select>
        </div>

        <!-- Botão Limpar Filtros -->
        <button wire:click="clearFilters"
            class="w-full py-2.5 px-4 bg-gray-100 hover:bg-gray-250 dark:bg-gray-700 dark:hover:bg-gray-650 text-gray-700 dark:text-gray-200 text-sm font-bold rounded-xl transition duration-300 flex items-center justify-center gap-2">
            <ion-icon name="refresh-outline" class="text-base"></ion-icon>
            Limpar Filtros
        </button>
    </div>

    <!-- Lista de Cards de Dicas -->
    <div class="lg:col-span-3 space-y-6">
        <!-- Cabeçalho -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold dark:text-white flex items-center gap-2">
                    <img src="public\images\bulb.png" alt="" class="h-8">
                    TechTips Repository
                </h1>
                <p class="text-sm text-gray-400 mt-1">Dicas rápidas, snippets de código, comandos e tutoriais úteis.</p>
            </div>

            <div
                class="bg-white/40 dark:bg-gray-800/40 backdrop-blur-sm px-4 py-2 rounded-xl text-sm font-medium border border-white/20">
                Total de Dicas: <span
                    class="font-bold text-primary-dark dark:text-primary-light">{{ $tips->total() }}</span>
            </div>
        </div>

        <!-- Grid de Dicas -->
        @if ($tips->isEmpty())
            <div
                class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-xl p-12 text-center border border-white/20">
                <ion-icon name="sad-outline" class="text-5xl text-gray-450 dark:text-gray-405 mb-4"></ion-icon>
                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200">Nenhuma dica encontrada</h3>
                <p class="text-sm text-gray-605 dark:text-gray-400 mt-1">Tente ajustar seus termos de pesquisa ou limpar
                    os filtros.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($tips as $tip)
                    <div
                        class="group bg-white/70 dark:bg-gray-850/70 backdrop-blur-sm rounded-2xl shadow-lg border border-white/25 dark:border-gray-800 hover:border-primary-dark/30 dark:hover:border-primary-light/30 transition-all duration-350 hover:shadow-xl transform hover:-translate-y-1 flex flex-col justify-between overflow-hidden">
                        <div>
                            <!-- Thumbnail se houver imagem -->
                            @if ($tip->images->isNotEmpty())
                                <div
                                    class="relative h-40 w-full overflow-hidden bg-gray-100 dark:bg-gray-800 border-b border-gray-150 dark:border-gray-800">
                                    <img src="{{ asset('storage/' . $tip->images->first()->image_path) }}"
                                        alt="{{ $tip->title }}"
                                        class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                                    <span
                                        class="absolute bottom-2 right-2 px-2.5 py-0.5 text-xs font-bold bg-black/60 text-white rounded-full">
                                        +{{ $tip->images->count() }}
                                    </span>
                                </div>
                            @endif

                            <div class="p-6 space-y-4">
                                <!-- Badges e Data -->
                                <div class="flex items-center justify-between gap-2 flex-wrap">
                                    <div class="flex items-center gap-2">
                                        <!-- Badge de Tipo -->
                                        @php
                                            $typeColors = match ($tip->type) {
                                                'dica' => 'bg-emerald-500/10 text-emerald-700',
                                                'método' => 'bg-amber-500/10 text-amber-700',
                                                'comando' => 'bg-rose-500/10 text-rose-700',
                                                'snippet' => 'bg-cyan-500/10 text-cyan-700',
                                                'tutorial' => 'bg-purple-500/10 text-purple-700',
                                                default => 'bg-gray-500/10 text-gray-700',
                                            };
                                        @endphp
                                        <span
                                            class="px-2.5 py-0.5 text-xs font-bold rounded-full uppercase tracking-wider {{ $typeColors }}">
                                            {{ $tip->type }}
                                        </span>

                                        <span class="text-xs text-gray-900 font-mono">
                                            {{ $tip->subcategory->name }}
                                        </span>
                                    </div>

                                    <span class="text-xs text-gray-450 flex items-center gap-1">
                                        <ion-icon name="calendar-outline"></ion-icon>
                                        {{ $tip->created_at->format('d/m/Y') }}
                                    </span>
                                </div>

                                <!-- Titulo e Excert -->
                                <div>
                                    <h3
                                        class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors line-clamp-1">
                                        {{ $tip->title }}
                                    </h3>
                                    <p class="text-sm text-gray-900 leading-relaxed mt-2 line-clamp-3">
                                        {{ Str::limit(strip_tags(Str::markdown($tip->content)), 120) }}
                                    </p>
                                </div>

                                <!-- Tags -->
                                @if ($tip->tags)
                                    <div class="flex flex-wrap gap-1.5 pt-2">
                                        @foreach ($tip->tags as $tag)
                                            <span
                                                class="px-2 py-0.5 text-xs bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded">
                                                #{{ $tag }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Footer Card -->
                        <div
                            class="px-6 py-4 bg-gray-50/50 dark:bg-gray-800/20 border-t border-gray-150/40 dark:border-gray-800/40 flex items-center justify-between text-sm">
                            <span class="text-xs text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                <ion-icon name="eye-outline" class="text-base"></ion-icon>
                                {{ $tip->view_count }} views
                            </span>

                            <a href="{{ route('tip.show', $tip->slug) }}"
                                class="inline-flex items-center gap-1 font-bold text-primary-dark dark:text-primary-light hover:underline group-hover:translate-x-0.5 transition-transform duration-300">
                                Acessar Dica
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Paginação -->
            <div class="pt-6">
                {{ $tips->links() }}
            </div>
        @endif
    </div>
</div>
