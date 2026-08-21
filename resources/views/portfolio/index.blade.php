@extends('layouts.app')

@section('title', 'Scheleder - Home')

@php
    $headerImg = 'logo.png';
    $headerIsLogo = true;
@endphp

@section('content')
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch" aria-labelledby="hero-title">
        <div
            class="lg:col-span-5 flex flex-col justify-between p-8 md:p-10 bg-white/85 dark:bg-gray-900/85 backdrop-blur-sm rounded-2xl shadow-xl border border-white/50 dark:border-gray-700/50">
            <div class="space-y-6">
                <span
                    class="inline-block w-fit px-3 py-1 text-xs font-bold uppercase tracking-wider text-primary-dark dark:text-primary-light bg-primary-dark/10 dark:bg-primary-light/10 rounded-full">Desenvolvimento
                    sob medida</span>
                <h1 id="hero-title" class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white leading-[1.08]">
                    Sistemas que tornam o seu processo mais simples.</h1>
                <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 leading-relaxed">Aplicações web, integrações e
                    automações para empresas que precisam substituir retrabalho, planilhas e etapas manuais por soluções
                    eficientes.</p>
                <figure class="pt-1" aria-label="Ilustração de tecnologia, automação e inteligência artificial">
                    <img src="{{ asset('img/technology-ai-network-logo.png') }}"
                        alt="Rede de sistemas conectados representando automação, inteligência artificial e a marca Scheleder dentro de uma cúpula de vidro"
                        class="w-full max-w-md h-auto object-contain" width="1536" height="1024">
                </figure>
                <p class="text-base text-gray-600 dark:text-gray-400">João Scheleder Neto — desenvolvedor full-stack com
                    experiência em software, automação industrial e operações.</p>
            </div>
            <div class="mt-8 flex flex-col sm:flex-row gap-3">
                <a href="{{ route('portfolio.contact') }}"
                    class="inline-flex flex-1 items-center justify-center gap-2 px-5 py-3.5 text-base font-semibold text-white bg-primary-dark dark:bg-primary-light dark:text-gray-900 rounded-xl hover:bg-[#76000f] dark:hover:bg-white transition-colors shadow-md"><ion-icon
                        name="chatbubble-ellipses-outline" class="text-xl"></ion-icon>Conversar</a>
                <a href="{{ route('portfolio.projects') }}"
                    class="inline-flex flex-1 items-center justify-center gap-2 px-5 py-3.5 text-base font-semibold text-primary-dark dark:text-primary-light border border-primary-dark/30 dark:border-primary-light/40 rounded-xl hover:bg-primary-dark/5 dark:hover:bg-primary-light/10 transition-colors"><ion-icon
                        name="layers-outline" class="text-xl"></ion-icon>Ver soluções</a>
            </div>
        </div>

        <div class="lg:col-span-7 space-y-6">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                    <ion-icon name="star" class="text-yellow-500 dark:text-yellow-400"></ion-icon>
                    Soluções em destaque
                </h2>
                <a href="{{ route('portfolio.projects') }}"
                    class="text-sm font-semibold text-primary-dark dark:text-primary-light hover:underline flex items-center gap-1">
                    Ver todas <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Projeto: FASBRA -->
                <a href="https://bra.scheleder.com" target="_blank" rel="noopener noreferrer"
                    class="group relative flex flex-col justify-between p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-md border border-white/20 dark:border-gray-700/30 hover:border-primary-dark/30 dark:hover:border-primary-light/30 transition-all duration-300 hover:scale-[1.03] hover:shadow-xl">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div
                                class="w-12 h-12 rounded-xl bg-blue-500/10 dark:bg-blue-400/10 text-blue-600 dark:text-blue-400 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                                <ion-icon name="business-outline" class="text-2xl"></ion-icon>
                            </div>
                            <div
                                class="text-xs font-semibold px-2.5 py-1 rounded-full bg-gray-100 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 flex items-center gap-1 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                                <span>Acessar</span>
                                <ion-icon name="open-outline" class="text-sm"></ion-icon>
                            </div>
                        </div>
                        <h3
                            class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                            FASBRA
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Plataforma integrada para gerenciamento de processos corporativos e operacionais.
                        </p>
                    </div>
                    <div
                        class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-700/50 text-xs font-mono text-gray-500 dark:text-gray-400 tracking-wider">
                        bra.scheleder.com
                    </div>
                </a>

                <!-- Projeto: Yumies -->
                <a href="https://receitas.scheleder.com" target="_blank" rel="noopener noreferrer"
                    class="group relative flex flex-col justify-between p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-md border border-white/20 dark:border-gray-700/30 hover:border-primary-dark/30 dark:hover:border-primary-light/30 transition-all duration-300 hover:scale-[1.03] hover:shadow-xl">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div
                                class="w-12 h-12 rounded-xl bg-orange-500/10 dark:bg-orange-400/10 text-orange-600 dark:text-orange-400 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                                <ion-icon name="restaurant-outline" class="text-2xl"></ion-icon>
                            </div>
                            <div
                                class="text-xs font-semibold px-2.5 py-1 rounded-full bg-gray-100 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 flex items-center gap-1 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                                <span>Acessar</span>
                                <ion-icon name="open-outline" class="text-sm"></ion-icon>
                            </div>
                        </div>
                        <h3
                            class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                            Yumies
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Plataforma moderna de receitas e culinária, com interface interativa e amigável.
                        </p>
                    </div>
                    <div
                        class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-700/50 text-xs font-mono text-gray-500 dark:text-gray-400 tracking-wider">
                        receitas.scheleder.com
                    </div>
                </a>

                <!-- Projeto: Estoque Fácil -->
                <a href="https://estoque.scheleder.com" target="_blank" rel="noopener noreferrer"
                    class="group relative flex flex-col justify-between p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-md border border-white/20 dark:border-gray-700/30 hover:border-primary-dark/30 dark:hover:border-primary-light/30 transition-all duration-300 hover:scale-[1.03] hover:shadow-xl">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div
                                class="w-12 h-12 rounded-xl bg-emerald-500/10 dark:bg-emerald-400/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                                <ion-icon name="cube-outline" class="text-2xl"></ion-icon>
                            </div>
                            <div
                                class="text-xs font-semibold px-2.5 py-1 rounded-full bg-gray-100 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 flex items-center gap-1 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                                <span>Acessar</span>
                                <ion-icon name="open-outline" class="text-sm"></ion-icon>
                            </div>
                        </div>
                        <h3
                            class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                            Estoque Fácil
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Sistema de controle e gestão de estoque projetado para máxima eficiência e simplicidade.
                        </p>
                    </div>
                    <div
                        class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-700/50 text-xs font-mono text-gray-500 dark:text-gray-400 tracking-wider">
                        estoque.scheleder.com
                    </div>
                </a>

                <!-- Projeto: Pindura -->
                <a href="https://pindura.scheleder.com" target="_blank" rel="noopener noreferrer"
                    class="group relative flex flex-col justify-between p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-md border border-white/20 dark:border-gray-700/30 hover:border-primary-dark/30 dark:hover:border-primary-light/30 transition-all duration-300 hover:scale-[1.03] hover:shadow-xl">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div
                                class="w-12 h-12 rounded-xl bg-purple-500/10 dark:bg-purple-400/10 text-purple-600 dark:text-purple-400 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                                <ion-icon name="receipt-outline" class="text-2xl"></ion-icon>
                            </div>
                            <div
                                class="text-xs font-semibold px-2.5 py-1 rounded-full bg-gray-100 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 flex items-center gap-1 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                                <span>Acessar</span>
                                <ion-icon name="open-outline" class="text-sm"></ion-icon>
                            </div>
                        </div>
                        <h3
                            class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                            Pindura
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Gerenciador financeiro ágil para controle de contas e consumo compartilhado.
                        </p>
                    </div>
                    <div
                        class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-700/50 text-xs font-mono text-gray-500 dark:text-gray-400 tracking-wider">
                        pindura.scheleder.com
                    </div>
                </a>

                <!-- Projeto: Files -->
                <a href="https://files.scheleder.com" target="_blank" rel="noopener noreferrer"
                    class="group relative flex flex-col justify-between p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-md border border-white/20 dark:border-gray-700/30 hover:border-primary-dark/30 dark:hover:border-primary-light/30 transition-all duration-300 hover:scale-[1.03] hover:shadow-xl">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div
                                class="w-12 h-12 rounded-xl bg-cyan-500/10 dark:bg-cyan-400/10 text-cyan-600 dark:text-cyan-400 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                                <ion-icon name="folder-open-outline" class="text-2xl"></ion-icon>
                            </div>
                            <div
                                class="text-xs font-semibold px-2.5 py-1 rounded-full bg-gray-100 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 flex items-center gap-1 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                                <span>Acessar</span>
                                <ion-icon name="open-outline" class="text-sm"></ion-icon>
                            </div>
                        </div>
                        <h3
                            class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                            Files
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Serviço de armazenamento, gerenciamento e compartilhamento rápido de arquivos em nuvem.
                        </p>
                    </div>
                    <div
                        class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-700/50 text-xs font-mono text-gray-500 dark:text-gray-400 tracking-wider">
                        files.scheleder.com
                    </div>
                </a>

                <!-- Projeto: FastMessage -->
                <a href="https://celular.scheleder.com" target="_blank" rel="noopener noreferrer"
                    class="group relative flex flex-col justify-between p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-md border border-white/20 dark:border-gray-700/30 hover:border-primary-dark/30 dark:hover:border-primary-light/30 transition-all duration-300 hover:scale-[1.03] hover:shadow-xl">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div
                                class="w-12 h-12 rounded-xl bg-rose-500/10 dark:bg-rose-400/10 text-rose-600 dark:text-rose-400 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                                <ion-icon name="chatbubble-ellipses-outline" class="text-2xl"></ion-icon>
                            </div>
                            <div
                                class="text-xs font-semibold px-2.5 py-1 rounded-full bg-gray-100 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 flex items-center gap-1 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                                <span>Acessar</span>
                                <ion-icon name="open-outline" class="text-sm"></ion-icon>
                            </div>
                        </div>
                        <h3
                            class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors">
                            FastMessage
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Plataforma de mensageria instantânea e notificações móveis em tempo real.
                        </p>
                    </div>
                    <div
                        class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-700/50 text-xs font-mono text-gray-500 dark:text-gray-400 tracking-wider">
                        celular.scheleder.com
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section id="servicos" class="mt-14" aria-labelledby="services-title">
        <div class="max-w-2xl mb-7">
            <p class="text-sm font-semibold uppercase tracking-widest text-primary-dark dark:text-primary-light">Como posso
                ajudar</p>
            <h2 id="services-title" class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">Tecnologia aplicada a
                problemas reais.</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <article
                class="p-6 rounded-2xl bg-white/85 dark:bg-gray-900/85 border border-gray-200/80 dark:border-gray-700 shadow-sm">
                <ion-icon name="globe-outline" class="text-3xl text-primary-dark dark:text-primary-light"></ion-icon>
                <h3 class="mt-4 text-xl font-bold text-gray-900 dark:text-white">Sistemas Web</h3>
                <p class="mt-2 text-gray-600 dark:text-gray-400 leading-relaxed">Painéis, aplicações internas e ferramentas
                    para centralizar a operação do seu negócio.</p>
            </article>
            <article
                class="p-6 rounded-2xl bg-white/85 dark:bg-gray-900/85 border border-gray-200/80 dark:border-gray-700 shadow-sm">
                <ion-icon name="sparkles" class="text-3xl text-primary-dark dark:text-primary-light"></ion-icon>
                <h3 class="mt-4 text-xl font-bold text-gray-900 dark:text-white">Integrações e Automações</h3>
                <p class="mt-2 text-gray-600 dark:text-gray-400 leading-relaxed">Conexão entre ferramentas e automação de
                    tarefas repetitivas para reduzir esforço manual.</p>
            </article>
            <article
                class="p-6 rounded-2xl bg-white/85 dark:bg-gray-900/85 border border-gray-200/80 dark:border-gray-700 shadow-sm">
                <ion-icon name="bulb-outline" class="text-3xl text-primary-dark dark:text-primary-light"></ion-icon>
                <h3 class="mt-4 text-xl font-bold text-gray-900 dark:text-white">Melhoria de Processos</h3>
                <p class="mt-2 text-gray-600 dark:text-gray-400 leading-relaxed">Experiência prática para transformar
                    necessidades técnicas e operacionais em soluções viáveis.</p>
            </article>
        </div>
    </section>

    <section
        class="mt-14 rounded-2xl bg-primary-dark dark:bg-primary-light px-7 py-8 md:px-10 md:py-10 text-white dark:text-gray-900 flex flex-col md:flex-row gap-6 md:items-center md:justify-between">
        <div>
            <p class="font-mono text-sm uppercase tracking-wider opacity-80">Experiência que sustenta a entrega</p>
            <h2 class="mt-2 text-xl md:text-2xl font-bold">Software, automação e operações no mesmo repertório.</h2>
        </div>
        <div class="flex flex-wrap gap-3 items-center justify-center">
            <a href="{{ route('portfolio.career') }}"
                class="w-full justify-center inline-flex items-center gap-2 rounded-xl border border-white/50 dark:border-gray-900/30 px-4 py-3 font-semibold hover:bg-white/10 dark:hover:bg-gray-900/10 transition-colors">
                Experiência
                <ion-icon name="arrow-forward-outline"></ion-icon>
            </a>
            <a href="#"
                onclick="event.preventDefault(); window.showPdfModal('{{ asset('docs/scheleder.pdf') }}', 'Currículo');"
                class="w-full justify-center inline-flex items-center gap-2 rounded-xl bg-white text-primary-dark px-4 py-3 font-semibold hover:bg-gray-100 transition-colors">
                Cartão de visita
                <ion-icon name="document-text-outline"></ion-icon>
            </a>
        </div>
    </section>
@endsection
