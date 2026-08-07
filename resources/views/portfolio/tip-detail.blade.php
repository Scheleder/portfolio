@extends('layouts.app')

@section('title', 'TechTips - ' . $tip->title)

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Botão de Voltar e Breadcrumb -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <a href="{{ route('techtips.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-primary-dark dark:text-primary-light hover:underline">
            <ion-icon name="arrow-back-outline"></ion-icon>
            Voltar para TechTips
        </a>

        <div class="text-xs font-mono text-gray-500 dark:text-gray-400">
            TechTips &gt; {{ $tip->subcategory->category->name }} &gt; {{ $tip->subcategory->name }}
        </div>
    </div>

    <!-- Mensagem de Sucesso -->
    @if (session('success'))
    <div class="bg-emerald-500/10 border-l-4 border-emerald-500 text-emerald-700 dark:text-emerald-400 p-4 rounded-r-xl text-sm font-medium" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <!-- Card Principal -->
    <div class="bg-white/70 dark:bg-gray-850/70 backdrop-blur-sm rounded-3xl shadow-xl border border-white/20 dark:border-gray-800/80 overflow-hidden">
        <div class="p-8 md:p-10 space-y-6">
            <!-- Cabeçalho do Card -->
            <div class="flex items-center justify-between gap-4 flex-wrap pb-6 border-b border-gray-150/40 dark:border-gray-800/60">
                <div class="space-y-2">
                    @php
                        $typeColors = match ($tip->type) {
                            'dica' => 'bg-emerald-500/10 text-emerald-700 dark:text-emerald-400',
                            'método' => 'bg-amber-500/10 text-amber-700 dark:text-amber-400',
                            'comando' => 'bg-rose-500/10 text-rose-700 dark:text-rose-400',
                            'snippet' => 'bg-cyan-500/10 text-cyan-700 dark:text-cyan-400',
                            'tutorial' => 'bg-purple-500/10 text-purple-700 dark:text-purple-400',
                            default => 'bg-gray-500/10 text-gray-700 dark:text-gray-400'
                        };
                    @endphp
                    <span class="inline-block px-3 py-1 text-xs font-bold rounded-full uppercase tracking-wider {{ $typeColors }}">
                        {{ $tip->type }}
                    </span>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white leading-tight">
                        {{ $tip->title }}
                    </h1>
                </div>

                <div class="flex items-center gap-4 text-xs font-mono text-gray-500 dark:text-gray-450">
                    <span class="flex items-center gap-1">
                        <ion-icon name="calendar-outline" class="text-sm"></ion-icon>
                        {{ $tip->created_at->format('d/m/Y') }}
                    </span>
                    <span class="flex items-center gap-1">
                        <ion-icon name="eye-outline" class="text-sm"></ion-icon>
                        {{ $tip->view_count }} visualizações
                    </span>
                </div>
            </div>

            <!-- Conteúdo -->
            <div class="prose dark:prose-invert max-w-none text-gray-850 dark:text-gray-205 leading-relaxed text-base md:text-lg markdown-content">
                {!! Str::markdown($tip->content) !!}
            </div>

            <!-- Tags -->
            @if ($tip->tags)
            <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-150/40 dark:border-gray-800/60">
                @foreach ($tip->tags as $tag)
                    <span class="px-3 py-1 text-xs bg-gray-150 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg font-medium">
                        #{{ $tag }}
                    </span>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    <!-- Seção de Imagens -->
    @if ($tip->images->isNotEmpty())
    <div class="bg-white/60 dark:bg-gray-850/60 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/20 dark:border-gray-800/60 space-y-6">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
            <ion-icon name="images-outline" class="text-primary-dark dark:text-primary-light"></ion-icon>
            Galeria de Imagens
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($tip->images as $img)
            <div class="group bg-white dark:bg-gray-800/50 p-3 rounded-2xl shadow border dark:border-gray-700/50 flex flex-col justify-between overflow-hidden">
                <div class="relative overflow-hidden rounded-xl h-48 bg-gray-100 dark:bg-gray-900">
                    <img src="{{ asset('storage/' . $img->image_path) }}" alt="{{ $img->caption }}"
                    class="object-cover w-full h-full cursor-pointer transition-transform duration-300 group-hover:scale-105"
                    onclick="window.showPdfModal('{{ asset('storage/' . $img->image_path) }}', '{{ $img->caption ?? 'Imagem' }}')">
                </div>
                @if ($img->caption)
                <p class="text-xs text-gray-650 dark:text-gray-400 mt-3 text-center italic font-medium">{{ $img->caption }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endif

    @auth
    <!-- Seção de Compartilhamento -->
    <div class="bg-white/60 dark:bg-gray-850/60 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/20 dark:border-gray-800/60 flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="space-y-1 text-center md:text-left">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Compartilhe esta dica</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">Envie esta dica diretamente para o e-mail de um colega desenvolvedor.</p>
        </div>

        <form action="{{ route('tip.share', $tip->slug) }}" method="POST" class="w-full md:w-auto flex flex-col sm:flex-row gap-3">
            @csrf
            <input type="email" name="email" required placeholder="destinatario@exemplo.com"
            class="px-4 py-2.5 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-650 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-dark dark:focus:ring-primary-light text-gray-800 dark:text-gray-150 w-full sm:w-64">
            <button type="submit" class="py-2.5 px-6 bg-primary-dark dark:bg-primary-light text-white dark:text-gray-900 font-bold text-sm rounded-xl hover:opacity-90 transition shadow-md flex items-center justify-center gap-2 shrink-0">
                <ion-icon name="send-outline"></ion-icon>
                Enviar por e-mail
            </button>
        </form>
    </div>
    @endauth
</div>

<style>
    /* Custom styling for markdown output to align with general theme */
    .markdown-content pre {
        background-color: #1e293b;
        color: #f8fafc;
        padding: 1rem;
        border-radius: 0.75rem;
        overflow-x: auto;
        margin-top: 1rem;
        margin-bottom: 1rem;
        font-family: monospace;
        font-size: 0.875rem;
    }
    .markdown-content code {
        background-color: rgba(30, 41, 59, 0.1);
        color: #e11d48;
        padding: 0.125rem 0.25rem;
        border-radius: 0.25rem;
        font-family: monospace;
        font-size: 0.875rem;
    }
    .dark .markdown-content code {
        background-color: rgba(248, 250, 252, 0.1);
        color: #fda4af;
    }
    .markdown-content ul {
        list-style-type: disc;
        padding-left: 1.5rem;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    .markdown-content ol {
        list-style-type: decimal;
        padding-left: 1.5rem;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    .markdown-content h2, .markdown-content h3 {
        font-weight: 700;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
        color: inherit;
    }
    .markdown-content h2 { font-size: 1.5rem; }
    .markdown-content h3 { font-size: 1.25rem; }
</style>
@endsection
