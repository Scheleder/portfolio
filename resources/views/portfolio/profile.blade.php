@extends('layouts.app')

@section('title', 'Scheleder - Perfil')

@php
    $headerImg = 'perfil.png';
@endphp

@section('content')
<div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-xl p-8 md:p-12 transition-all duration-300">
    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b-2 border-primary-dark dark:border-primary-light pb-4 inline-block">João Scheleder Neto</h1>

    <div class="prose dark:prose-invert max-w-none text-lg md:text-xl text-gray-700 dark:text-gray-300 leading-relaxed space-y-6">
        <p>
            Profissional com experiência em desenvolvimento de aplicações, automação industrial e melhoria de processos.
        </p>
        <p>
            Atua na criação de sistemas web, desktop e mobile, com foco em soluções eficientes, integração de sistemas e otimização.
        </p>
        <p>
            Possui perfil analítico, facilidade na resolução de problemas e experiência no relacionamento técnico com clientes e fornecedores.
        </p>
    </div>
</div>
@endsection
