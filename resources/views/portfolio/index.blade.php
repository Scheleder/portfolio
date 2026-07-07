@extends('layouts.app')

@section('title', 'Scheleder - Home')

@php
    $headerImg = 'perfil.png';
@endphp

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
    <!-- Coluna Esquerda: Apresentação do Perfil -->
    <div class="lg:col-span-5 flex flex-col justify-between p-8 md:p-10 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/30 transition-all duration-300">
        <div class="space-y-6">
            <span class="inline-block px-3 py-1 text-xs font-bold uppercase tracking-wider text-primary-dark dark:text-primary-light bg-primary-dark/10 dark:bg-primary-light/10 rounded-full">
                Boas-vindas
            </span>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white leading-tight">
                Portfólio <br class="hidden sm:inline" />Profissional
            </h1>
            
            <div class="space-y-4">
                <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 leading-relaxed">
                    Meu nome é <span class="bg-gradient-to-r from-primary-dark via-purple-700 to-indigo-600 dark:from-primary-light dark:to-indigo-300 bg-clip-text text-transparent font-bold">João Scheleder Neto</span>, e atuo na área de Análise de Sistemas como Desenvolvedor Full-stack.
                </p>
                <p class="text-base text-gray-650 dark:text-gray-400">
                    Acesse o menu de navegação acima para explorar minha formação, experiência e projetos detalhados.
                </p>
                <p class="text-base text-gray-650 dark:text-gray-400">
                    Ou então, visualize e faça o download do meu cartão virtual:
                </p>  
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200/50 dark:border-gray-700/50">
            <a href="#" onclick="event.preventDefault(); window.showPdfModal('{{ asset('docs/scheleder.pdf') }}', 'Currículo');" class="inline-flex items-center justify-center gap-3 w-full px-6 py-3.5 text-base font-semibold text-white bg-primary-dark dark:bg-primary-light dark:text-gray-900 rounded-full hover:bg-opacity-90 dark:hover:bg-opacity-90 transition-all duration-300 hover:scale-[1.03] shadow-md hover:shadow-lg">
                <ion-icon size="large" name="newspaper-outline" class="text-xl"></ion-icon>   
                <span>Visualizar Currículo (PDF)</span>
            </a>
        </div>
    </div>

    <!-- Coluna Direita: Projetos em Destaque -->
    <div class="lg:col-span-7 space-y-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                <ion-icon name="star" class="text-yellow-500 dark:text-yellow-400"></ion-icon>
                Projetos em Destaque
            </h2>
            <a href="{{ route('portfolio.projects') }}" class="text-sm font-semibold text-primary-dark dark:text-primary-light hover:underline flex items-center gap-1">
                Ver todos os projetos <ion-icon name="arrow-forward-outline"></ion-icon>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Projeto: FASBRA -->
            <a href="https://bra.scheleder.com" target="_blank" rel="noopener noreferrer" 
               class="group relative flex flex-col justify-between p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-md border border-white/20 dark:border-gray-700/30 hover:border-primary-dark/30 dark:hover:border-primary-light/30 transition-all duration-300 hover:scale-[1.03] hover:shadow-xl">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-500/10 dark:bg-blue-400/10 text-blue-600 dark:text-blue-400 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                            <ion-icon name="business-outline" class="text-2xl"></ion-icon>
                        </div>
                        <div class="text-xs font-semibold px-2.5 py-1 rounded-full bg-gray-100 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 flex items-center gap-1 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                            <span>Acessar</span>
                            <ion-icon name="open-outline" class="text-sm"></ion-icon>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                        FASBRA
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                        Plataforma integrada para gerenciamento de processos corporativos e operacionais.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-700/50 text-xs font-mono text-gray-500 dark:text-gray-400 tracking-wider">
                    bra.scheleder.com
                </div>
            </a>
            
            <!-- Projeto: Yumies -->
            <a href="https://receitas.scheleder.com" target="_blank" rel="noopener noreferrer" 
               class="group relative flex flex-col justify-between p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-md border border-white/20 dark:border-gray-700/30 hover:border-primary-dark/30 dark:hover:border-primary-light/30 transition-all duration-300 hover:scale-[1.03] hover:shadow-xl">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-orange-500/10 dark:bg-orange-400/10 text-orange-600 dark:text-orange-400 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                            <ion-icon name="restaurant-outline" class="text-2xl"></ion-icon>
                        </div>
                        <div class="text-xs font-semibold px-2.5 py-1 rounded-full bg-gray-100 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 flex items-center gap-1 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                            <span>Acessar</span>
                            <ion-icon name="open-outline" class="text-sm"></ion-icon>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                        Yumies
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                        Plataforma moderna de receitas e culinária, com interface interativa e amigável.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-700/50 text-xs font-mono text-gray-500 dark:text-gray-400 tracking-wider">
                    receitas.scheleder.com
                </div>
            </a>

            <!-- Projeto: Estoque Fácil -->
            <a href="https://estoque.scheleder.com" target="_blank" rel="noopener noreferrer" 
               class="group relative flex flex-col justify-between p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-md border border-white/20 dark:border-gray-700/30 hover:border-primary-dark/30 dark:hover:border-primary-light/30 transition-all duration-300 hover:scale-[1.03] hover:shadow-xl">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 dark:bg-emerald-400/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                            <ion-icon name="cube-outline" class="text-2xl"></ion-icon>
                        </div>
                        <div class="text-xs font-semibold px-2.5 py-1 rounded-full bg-gray-100 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 flex items-center gap-1 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                            <span>Acessar</span>
                            <ion-icon name="open-outline" class="text-sm"></ion-icon>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                        Estoque Fácil
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                        Sistema de controle e gestão de estoque projetado para máxima eficiência e simplicidade.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-700/50 text-xs font-mono text-gray-500 dark:text-gray-400 tracking-wider">
                    estoque.scheleder.com
                </div>
            </a>

            <!-- Projeto: Pindura -->
            <a href="https://pindura.scheleder.com" target="_blank" rel="noopener noreferrer" 
               class="group relative flex flex-col justify-between p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-md border border-white/20 dark:border-gray-700/30 hover:border-primary-dark/30 dark:hover:border-primary-light/30 transition-all duration-300 hover:scale-[1.03] hover:shadow-xl">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-purple-500/10 dark:bg-purple-400/10 text-purple-600 dark:text-purple-400 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                            <ion-icon name="receipt-outline" class="text-2xl"></ion-icon>
                        </div>
                        <div class="text-xs font-semibold px-2.5 py-1 rounded-full bg-gray-100 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 flex items-center gap-1 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                            <span>Acessar</span>
                            <ion-icon name="open-outline" class="text-sm"></ion-icon>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                        Pindura
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                        Gerenciador financeiro ágil para controle de contas e consumo compartilhado.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-700/50 text-xs font-mono text-gray-500 dark:text-gray-400 tracking-wider">
                    pindura.scheleder.com
                </div>
            </a>

            <!-- Projeto: Files -->
            <a href="https://files.scheleder.com" target="_blank" rel="noopener noreferrer" 
               class="group relative flex flex-col justify-between p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-md border border-white/20 dark:border-gray-700/30 hover:border-primary-dark/30 dark:hover:border-primary-light/30 transition-all duration-300 hover:scale-[1.03] hover:shadow-xl">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-cyan-500/10 dark:bg-cyan-400/10 text-cyan-600 dark:text-cyan-400 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                            <ion-icon name="folder-open-outline" class="text-2xl"></ion-icon>
                        </div>
                        <div class="text-xs font-semibold px-2.5 py-1 rounded-full bg-gray-100 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 flex items-center gap-1 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                            <span>Acessar</span>
                            <ion-icon name="open-outline" class="text-sm"></ion-icon>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                        Files
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                        Serviço de armazenamento, gerenciamento e compartilhamento rápido de arquivos em nuvem.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-700/50 text-xs font-mono text-gray-500 dark:text-gray-400 tracking-wider">
                    files.scheleder.com
                </div>
            </a>

            <!-- Projeto: FastMessage -->
            <a href="https://celular.scheleder.com" target="_blank" rel="noopener noreferrer" 
               class="group relative flex flex-col justify-between p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-md border border-white/20 dark:border-gray-700/30 hover:border-primary-dark/30 dark:hover:border-primary-light/30 transition-all duration-300 hover:scale-[1.03] hover:shadow-xl">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-rose-500/10 dark:bg-rose-400/10 text-rose-600 dark:text-rose-400 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                            <ion-icon name="chatbubble-ellipses-outline" class="text-2xl"></ion-icon>
                        </div>
                        <div class="text-xs font-semibold px-2.5 py-1 rounded-full bg-gray-100 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 flex items-center gap-1 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                            <span>Acessar</span>
                            <ion-icon name="open-outline" class="text-sm"></ion-icon>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                        FastMessage
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                        Plataforma de mensageria instantânea e notificações móveis em tempo real.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-700/50 text-xs font-mono text-gray-500 dark:text-gray-400 tracking-wider">
                    celular.scheleder.com
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
