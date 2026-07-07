document.addEventListener('DOMContentLoaded', () => {
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeToggleMobileBtn = document.getElementById('theme-toggle-mobile');

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon?.classList.remove('hidden');
    } else {
        themeToggleDarkIcon?.classList.remove('hidden');
    }

    const toggleTheme = () => {
        themeToggleDarkIcon?.classList.toggle('hidden');
        themeToggleLightIcon?.classList.toggle('hidden');

        // if set via local storage previously
        if (localStorage.getItem('theme')) {
            if (localStorage.getItem('theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
        // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    };

    if (themeToggleBtn) themeToggleBtn.addEventListener('click', toggleTheme);
    if (themeToggleMobileBtn) themeToggleMobileBtn.addEventListener('click', toggleTheme);
});

// Lógica para Modais de Projetos e Experiência
window.showCardModal = function (element) {
    const titleHtml = element.querySelector('.modal-data .title').innerHTML;
    const contentHtml = element.querySelector('.modal-data .content').innerHTML;

    document.getElementById('modalTitle').innerHTML = titleHtml;
    document.getElementById('modalContent').innerHTML = contentHtml;

    const modal = document.getElementById('genericModal');
    modal.classList.remove('hidden');

    // Animação de fade-in e scale
    setTimeout(() => {
        modal.classList.remove('opacity-0');
        modal.querySelector('div').classList.remove('scale-95');
    }, 10);
};

window.closeModal = function () {
    const modal = document.getElementById('genericModal');
    const modalInner = modal.querySelector('div');

    modal.classList.add('opacity-0');
    modalInner.classList.add('scale-95');

    // Esconder após a animação
    setTimeout(() => {
        modal.classList.add('hidden');
        
        // Reset das classes caso tenha sido aberto como PDF
        modalInner.classList.remove('max-w-5xl', 'h-[90vh]');
        modalInner.classList.add('max-w-2xl');
        
        // Limpar conteúdo para parar carregamento do iframe
        document.getElementById('modalContent').innerHTML = '';
    }, 300);
};

window.showPdfModal = function (url, title) {
    document.getElementById('modalTitle').innerHTML = title;
    // Carrega o PDF via iframe
    document.getElementById('modalContent').innerHTML = `<iframe src="${url}" class="w-full h-[75vh] rounded-lg border-0" title="${title}"></iframe>`;

    const modal = document.getElementById('genericModal');
    const modalInner = modal.querySelector('div');
    
    // Ajustar largura e altura para melhor visualização do PDF
    modalInner.classList.remove('max-w-2xl');
    modalInner.classList.add('max-w-5xl', 'h-[90vh]');
    
    modal.classList.remove('hidden');

    // Animação de fade-in e scale
    setTimeout(() => {
        modal.classList.remove('opacity-0');
        modalInner.classList.remove('scale-95');
    }, 10);
};

document.getElementById('closeModalBtn')?.addEventListener('click', closeModal);
document.getElementById('genericModal')?.addEventListener('click', (e) => {
    // Fecha apenas se clicar na área escura (fora do modal)
    if (e.target.id === 'genericModal') closeModal();
});