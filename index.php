<?php 
$headerImg = 'perfil.png';
require_once 'header.php'; 
?>

<div class="flex flex-col items-center justify-center min-h-[60vh] text-center space-y-8 p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-xl transition-all duration-300">
    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white drop-shadow-md">Portfolio Profissional</h1>
    
    <div class="space-y-4 max-w-3xl">
        <h4 class="text-xl md:text-2xl text-gray-700 dark:text-gray-300">
            Meu nome é <span class="text-primary-dark dark:text-primary-light font-bold">João Scheleder Neto</span>, 
            atuo na área de Análise de Sistemas como Desenvolvedor Full-stack.
        </h4>
        <h4 class="text-lg md:text-xl text-gray-600 dark:text-gray-400">Acesse o menu acima para saber mais.</h4>
        <h4 class="text-lg md:text-xl text-gray-600 dark:text-gray-400">Ou então, faça o download do meu cartão virtual:</h4>  
    </div>

    <a href="#" onclick="event.preventDefault(); showPdfModal('docs/scheleder.pdf', 'Currículo');" class="inline-flex items-center gap-3 px-6 py-3 mt-4 text-lg font-medium text-white bg-primary-dark dark:bg-primary-light dark:text-gray-900 rounded-full hover:bg-opacity-90 dark:hover:bg-opacity-90 transition-transform duration-300 hover:scale-105 shadow-lg">
        <ion-icon size="large" name="newspaper-outline"></ion-icon>   
        <span>scheleder.pdf</span>
    </a>
</div>

<?php require_once 'footer.php'; ?>
