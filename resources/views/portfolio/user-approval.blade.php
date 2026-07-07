@extends('layouts.app')

@section('title', 'Análise de Cadastro - TechTips')

@section('content')
<div class="max-w-2xl mx-auto bg-white/70 dark:bg-gray-850/70 backdrop-blur-sm rounded-3xl shadow-xl border border-white/20 dark:border-gray-800 p-8 md:p-10 text-center space-y-6">
    <div class="space-y-2">
        <div class="w-20 h-20 mx-auto rounded-full bg-amber-500/10 text-amber-600 dark:text-amber-400 flex items-center justify-center">
            <ion-icon name="shield-checkmark-outline" class="text-4xl"></ion-icon>
        </div>
        <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 dark:text-white leading-tight">
            Análise de Cadastro
        </h1>
        <p class="text-sm text-gray-600 dark:text-gray-400">Um novo usuário solicitou autorização de acesso ao TechTips Repository.</p>
    </div>

    <!-- Dados do Usuário -->
    <div class="bg-gray-50/50 dark:bg-gray-800/30 p-6 rounded-2xl border border-gray-150/40 dark:border-gray-800 text-left space-y-4 max-w-md mx-auto">
        <div class="flex items-center gap-4">
            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}" alt="Avatar" class="w-16 h-16 rounded-full border-2 border-white dark:border-gray-700 shadow object-cover">
            <div>
                <h4 class="text-lg font-bold text-gray-900 dark:text-white">{{ $user->name }}</h4>
                <p class="text-sm font-mono text-gray-550 dark:text-gray-400">{{ $user->email }}</p>
            </div>
        </div>

        @if ($user->bio)
        <div class="pt-3 border-t border-gray-150/40 dark:border-gray-800">
            <h5 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Biografia</h5>
            <p class="text-sm text-gray-650 dark:text-gray-300 leading-relaxed">{{ $user->bio }}</p>
        </div>
        @endif
    </div>

    <!-- Ações de Aprovação -->
    <form action="{{ request()->fullUrl() }}" method="POST" class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
        @csrf
        <button type="submit" name="status" value="approve" class="py-3 px-6 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl transition shadow-md flex items-center justify-center gap-2">
            <ion-icon name="checkmark-circle-outline" class="text-xl"></ion-icon>
            Liberar Acesso
        </button>

        <button type="submit" name="status" value="reject" class="py-3 px-6 bg-rose-600 hover:bg-rose-700 text-white font-bold rounded-xl transition shadow-md flex items-center justify-center gap-2">
            <ion-icon name="close-circle-outline" class="text-xl"></ion-icon>
            Manter Bloqueado
        </button>
    </form>
</div>
@endsection
