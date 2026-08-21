@extends('layouts.app')

@section('title', 'Scheleder - Projetos')

@php
    $headerImg = 'projects.png';
    
    $projects = [
        ['icon' => 'code-working', 'title' => 'APLICAÇÃO WEB - CONTROLE DE ESTOQUE', 'tech' => 'NodeJS, ReactJS, Swagger, IA', 'desc' => 'Sistema completo de gestão de estoque, com possibilidade de cadastro de vários armazéns e integração com inteligência artificial. Composto por uma API em NODEJS com documentação em SWAGGER e um front-end em REACTJS.'],
        ['icon' => 'create', 'title' => 'APLICAÇÃO ERP - CETUS SOLUTION', 'tech' => 'C#, PHP, JavaScript, SQL', 'desc' => 'Sistema de gestão empresarial, atuação em diversos módulos, principlamente em produção e qualidade.'],
        ['icon' => 'create', 'title' => 'GERENCIADOR DE AGENDAMENTOS', 'tech' => 'PHP, Laravel, MySQL, HTML, CSS', 'desc' => 'Aplicação desenvolvida em LARAVEL, com acesso via web, responsável pela gestão de cursos, matriculas, relatórios e agendamentos de pacientes nas aulas de pós graduação.'],
        ['icon' => 'code-working', 'title' => 'GERENCIADOR DE BACKUPS', 'tech' => 'PHP, HTML, JavaScript, CSS', 'desc' => 'Aplicação desenvolvida em PHP, HTML, JS e CSS, funciona via ethernet, para armazenamento e gerenciamento de backups dos firmwares, projetos e arquivos de configuração.'],
        ['icon' => 'logo-android', 'title' => 'APLICATIVO - BERRY 5S', 'tech' => 'Java, Android SDK', 'desc' => 'Aplicação Android desenvolvida em JAVA para realização e gestão de auditorias de housekeeping, utilizando a metodologia 5S.'],
        ['icon' => 'bulb', 'title' => 'APLICATIVO - NAVEGADOR', 'tech' => 'Java, Desktop Mobile', 'desc' => 'Aplicativo desenvolvido em JAVA para desktop e celular. Armazena os relatórios de atendimentos realizados pelo setor de manutenção.'],
        ['icon' => 'desktop', 'title' => 'APLICATIVO - SLIDE PICTURES', 'tech' => 'Java, Redes', 'desc' => 'Aplicativo desenvolvido em JAVA para desktop. Consiste numa aplicação que exibe anúncios e pode ser gerenciada pela rede local.'],
        ['icon' => 'color-wand', 'title' => 'ORGANIZAÇÃO SETOR T.I.', 'tech' => 'Infraestrutura, Hardware', 'desc' => 'Organização do setor de Tecnologia da Informação dos Computadores Industriais da Berry Global na planta de São José dos Pinhais.'],
        ['icon' => 'sparkles', 'title' => 'ORGANIZAÇÃO SETOR SICOBE', 'tech' => 'Suporte, Automação', 'desc' => 'Organização do setor de Laboratório de Manutenção da Regional Sul do Projeto SICOBE na Sicpa do Brasil.'],
        ['icon' => 'trending-up', 'title' => 'MELHORIA DA PLANTA', 'tech' => 'Processos, Indicadores', 'desc' => 'Organização e melhoria implementada nos equipamentos do Projeto SICOBE da Casa da Moeda do Brasil, instalados nas sete linhas de produção da Grassi.'],
        ['icon' => 'cog', 'title' => 'MELHORIA EM EQUIPAMENTO', 'tech' => 'Hardware, Eletrônica', 'desc' => 'Modificações de software e substituição de componentes em equipamento do tipo Jar-Teste na Milan Equipamentos. A mudança possibilitou a utilização de um único motor.'],
        ['icon' => 'hardware-chip', 'title' => 'DESENVOLVIMENTO (Mini Jar-Teste)', 'tech' => 'Hardware, Software, Microcontroladores', 'desc' => 'Desenvolvimento de hardware e software de equipamento do tipo Jar-teste em miniatura, para mini estações de tratamento de água.'],
        ['icon' => 'file-tray-stacked', 'title' => 'GESTÃO EMPRESARIAL', 'tech' => 'Gestão, Contratos, Negociação', 'desc' => 'Gestão de contratos de manutenção com diversas empresas (Vivo, Caixa, PUC-PR, TecBan, etc.), gestão e homologação de fornecedores.'],
        ['icon' => 'hardware-chip', 'title' => 'DESENVOLVIMENTO DE EQUIPAMENTOS', 'tech' => 'Eletrônica, Microcontroladores', 'desc' => 'Desenvolvimento de diversos equipamentos microcontrolados (Inversores, Retificadores, Estabilizadores de tensão, etc.) utilizados na automação.'],
        ['icon' => 'construct', 'title' => 'REFORMA DE EQUIPAMENTOS', 'tech' => 'Eletrônica, Redes', 'desc' => 'Participação na reforma e melhoria do placar eletrônico do Jockey Club do Paraná, implementando comunicação com central.'],
        ['icon' => 'git-network', 'title' => 'MELHORIA EM EQUIPAMENTO (ÁUDIO)', 'tech' => 'Circuitos Impressos, PCB, Áudio', 'desc' => 'Modificações de layout no circuito impresso do amplificador de áudio para headset na Cebel Equipamentos, eliminando a reprodução de ruídos.']
    ];
@endphp

@section('content')
<div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-xl p-8 md:p-12 transition-all duration-300 mb-10">
    <p class="text-sm font-semibold uppercase tracking-widest text-primary-dark dark:text-primary-light mb-3">Portfólio de soluções</p>
    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">Soluções e projetos desenvolvidos</h1>
    <p class="mt-4 mb-10 max-w-3xl text-lg leading-relaxed text-gray-600 dark:text-gray-400">Uma seleção de sistemas, aplicações e melhorias criados a partir de desafios operacionais, de negócio e de tecnologia.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($projects as $proj)
        <!-- Card Clicável -->
        <div class="group relative bg-white dark:bg-gray-700/50 shadow-md p-6 rounded-xl border border-gray-100 dark:border-gray-600 hover:shadow-xl hover:border-primary-light dark:hover:border-primary-dark transition-all duration-300 cursor-pointer transform hover:-translate-y-1 flex flex-col justify-between" onclick="window.showCardModal(this)">
            
            <!-- Dados Ocultos para o Modal -->
            <div class="modal-data hidden">
                <div class="title flex items-center gap-3">
                    <ion-icon name="{{ $proj['icon'] }}" class="text-3xl text-primary-dark dark:text-primary-light"></ion-icon>
                    {{ $proj['title'] }}
                </div>
                <div class="content">
                    <div class="bg-primary-light/10 dark:bg-gray-700 p-5 rounded-xl border-l-4 border-primary-dark dark:border-primary-light mb-4">
                        <h4 class="text-sm text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wider mb-2">Detalhes do Projeto</h4>
                        <p class="text-lg text-gray-700 dark:text-gray-200 leading-relaxed">{{ $proj['desc'] }}</p>
                    </div>
                    <div class="flex items-start gap-3 mt-4 text-gray-600 dark:text-gray-300 px-2">
                        <ion-icon name="code-slash" class="text-2xl mt-0.5 text-primary-dark dark:text-primary-light flex-shrink-0"></ion-icon>
                        <div>
                            <h4 class="text-sm text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wider mb-1">Tecnologias Utilizadas</h4>
                            <p class="text-base font-semibold text-gray-800 dark:text-gray-100">{{ $proj['tech'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Visão Simplificada do Card -->
            <div class="flex flex-col items-center text-center gap-4">
                <div class="w-14 h-14 rounded-full bg-primary-light/20 dark:bg-gray-600 text-primary-dark dark:text-primary-light flex items-center justify-center group-hover:bg-primary-dark group-hover:text-white dark:group-hover:bg-primary-light dark:group-hover:text-gray-900 transition-colors duration-300">
                    <ion-icon name="{{ $proj['icon'] }}" class="text-3xl"></ion-icon>
                </div>
                <h4 class="text-base font-bold text-gray-900 dark:text-white leading-tight px-2">{{ $proj['title'] }}</h4>
            </div>
            
            <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-600 flex justify-center">
                <span class="text-xs font-bold uppercase tracking-widest text-primary-dark dark:text-primary-light group-hover:text-gray-900 dark:group-hover:text-white transition-colors duration-300 flex items-center gap-1">
                    Ver Mais <ion-icon name="arrow-forward"></ion-icon>
                </span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
