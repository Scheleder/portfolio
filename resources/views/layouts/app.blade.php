<!DOCTYPE html>
<html lang="pt-BR" class="light">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Scheleder - Portfólio & TechTips')</title>
    
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('ico/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('ico/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('ico/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('ico/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('ico/safari-pinned-tab.svg') }}" color="#880000">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" href="{{ asset('ico/favicon.ico') }}" type="image/x-icon" /> 
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Roboto', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            light: '#E6E6FA', // Roxo Claro
                            dark: '#5c0011',  // Bordô Escuro
                        }
                    }
                }
            }
        }
        
        // Tema Dark/Light
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    
    <!-- CSS Customizado -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    
    @livewireStyles
    @stack('styles')
</head>
<body class="bg-primary-light dark:bg-primary-dark text-gray-800 dark:text-gray-200 transition-colors duration-500 min-h-screen relative pb-20 bg-[url('{{ asset('img/wall.jpg') }}')] bg-cover bg-no-repeat bg-fixed bg-blend-normal dark:bg-blend-multiply">
    
    <header class="sticky top-0 z-50">
        <!-- Glassmorphism Navbar -->
        <nav class="backdrop-blur-md bg-white/70 dark:bg-gray-900/80 border-b border-gray-200 dark:border-gray-800 shadow-sm transition-colors duration-500">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <div class="flex justify-between h-20 items-center">
                    
                    <!-- Left: Profile Image -->
                    <div class="flex-shrink-0 flex items-center w-24">
                        <img src="{{ asset('img/' . ($headerImg ?? 'perfil.png')) }}" alt="foto"
                            class="absolute top-1 left-20 h-24 w-24 rounded-full border-2 backdrop-blur-md border-white/70 dark:border-gray-900/80 shadow-lg z-50 transition-transform duration-300 hover:scale-105 bg-white dark:bg-gray-800 object-cover">
                    </div>
                    
                    <!-- Right: Navigation & Logo -->
                    <div class="flex items-center gap-4 md:gap-8">
                        <!-- Desktop Menu -->
                        <div class="hidden md:flex items-center space-x-6">
                            @php
                                $links = [
                                    'portfolio.index' => 'Home',
                                    'portfolio.profile' => 'Perfil',
                                    'portfolio.education' => 'Formação',
                                    'portfolio.career' => 'Experiência',
                                    'portfolio.projects' => 'Projetos',
                                    'portfolio.contact' => 'Contato',
                                    'techtips.index' => 'TechTips',
                                ];
                            @endphp
                            
                            @foreach ($links as $routeName => $label)
                                @php
                                    $isActive = request()->routeIs($routeName) ? 'text-primary-dark dark:text-primary-light font-bold scale-105' : 'text-gray-600 dark:text-gray-400 hover:text-primary-dark dark:hover:text-primary-light hover:scale-105';
                                @endphp
                                <a href="{{ route($routeName) }}" class="transition-all duration-300 inline-block {{ $isActive }}">{{ $label }}</a>
                            @endforeach
                            
                            <!-- Theme Toggle Button -->
                            <button id="theme-toggle" type="button" class="flex items-center gap-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 transition-colors duration-300 font-medium border border-gray-200 dark:border-gray-700">
                                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                            </button>
                            
                            <!-- Botão Painel Admin -->
                            <a href="/admin" class="flex items-center gap-2 text-white bg-primary-dark dark:bg-primary-light dark:text-primary-dark hover:bg-opacity-90 dark:hover:bg-opacity-90 rounded-lg text-sm px-4 py-2.5 transition-colors duration-300 font-semibold shadow-md border border-primary-dark dark:border-primary-light">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                                Entrar
                            </a>
                        </div>

                        <!-- Mobile Menu Button -->
                        <div class="md:hidden flex items-center gap-2">
                            <button id="theme-toggle-mobile" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg p-2 transition-colors">
                                <ion-icon name="contrast-outline" class="text-xl"></ion-icon>
                            </button>
                            <button id="mobile-menu-btn" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white focus:outline-none p-2">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Logo Right -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('portfolio.index') }}" class="transition-transform duration-300 hover:scale-105 block">
                                <img src="{{ asset('img/logo.png') }}" alt="SCHELEDER" class="h-12 w-auto">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div id="mobile-menu" class="hidden md:hidden bg-white/95 dark:bg-gray-900/95 backdrop-blur-lg border-b border-gray-200 dark:border-gray-800 absolute w-full z-[80]">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    @foreach ($links as $routeName => $label)
                        @php
                            $isActiveMobile = request()->routeIs($routeName) ? 'bg-primary-light/50 dark:bg-primary-dark/50 text-primary-dark dark:text-primary-light font-bold' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800';
                        @endphp
                        <a href="{{ route($routeName) }}" class="block px-3 py-2 rounded-md text-base transition-colors {{ $isActiveMobile }}">{{ $label }}</a>
                    @endforeach
                    <a href="/admin" class="block px-3 py-2 rounded-md text-base transition-colors bg-primary-dark/10 dark:bg-primary-light/10 text-primary-dark dark:text-primary-light font-semibold hover:bg-primary-dark/20 dark:hover:bg-primary-light/20">Entrar</a>
                </div>
            </div>
        </nav>
    </header>
    
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 animate-fade-in-up">
        @yield('content')
    </main>

    <!-- Modal Genérico para Experiência, Projetos e Ações -->
    <div id="genericModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity duration-300 opacity-0 px-4">
        <div class="bg-white dark:bg-gray-800 w-full max-w-2xl rounded-2xl shadow-2xl p-6 md:p-8 transform scale-95 transition-transform duration-300 overflow-y-auto max-h-[90vh] border border-gray-100 dark:border-gray-700">
            <div class="flex justify-between items-start mb-6">
                <h3 id="modalTitle" class="text-2xl font-bold text-gray-900 dark:text-white pr-4 leading-tight"></h3>
                <button id="closeModalBtn" onclick="window.closeModal()" class="text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 rounded-full p-1 flex items-center justify-center">
                    <ion-icon name="close" class="text-2xl"></ion-icon>
                </button>
            </div>
            <div id="modalContent" class="text-gray-700 dark:text-gray-300 space-y-4">
                <!-- Conteúdo Dinâmico -->
            </div>
        </div>
    </div>

    <footer class="absolute bottom-0 w-full h-16 flex items-center justify-center text-gray-600 dark:text-gray-400 bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm border-t border-gray-200 dark:border-gray-800 transition-colors duration-500">
        <a href="{{ route('portfolio.contact') }}" class="hover:text-primary-dark dark:hover:text-primary-light transition-colors duration-300">
            <p class="font-medium text-sm">João Scheleder Neto &copy; {{ date('Y') }}</p>
        </a>
    </footer>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
    <!-- Scripts Customizados -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        // Mobile Menu Toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }
    </script>
    
    @livewireScripts
    @stack('scripts')
</body>
</html>
