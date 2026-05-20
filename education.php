<?php 
$headerImg = 'graduation.png';
require_once 'header.php'; 
?>

<div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-xl p-8 md:p-12 transition-all duration-300">
    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-10 border-b-2 border-primary-dark dark:border-primary-light pb-4 inline-block">Formação</h1> 
    
    <div class="space-y-8">
        <!-- Item 1 -->
        <div class="group flex flex-col md:flex-row items-start md:items-center gap-6 p-6 rounded-xl bg-white dark:bg-gray-700/50 shadow-md hover:bg-gray-50 dark:hover:bg-gray-700/80 transition-all duration-300 border border-gray-100 dark:border-gray-600 hover:border-gray-200 dark:hover:border-gray-500">
            <img src="img/estacio.png" alt="logo" class="w-16 h-16 object-contain bg-white rounded-lg p-1 shadow-sm group-hover:scale-110 transition-transform duration-300">
            <div>
                <h4 class="text-xl font-bold text-gray-900 dark:text-white">UNIVERSIDADE ESTÁCIO DE SÁ <span class="text-sm font-normal text-gray-500 dark:text-gray-400 ml-2">(2014 – 2017)</span></h4>
                <h5 class="text-lg text-primary-dark dark:text-primary-light font-medium mt-1">Análise e Desenvolvimento de Sistemas</h5>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="group flex flex-col md:flex-row items-start md:items-center gap-6 p-6 rounded-xl bg-white dark:bg-gray-700/50 shadow-md hover:bg-gray-50 dark:hover:bg-gray-700/80 transition-all duration-300 border border-gray-100 dark:border-gray-600 hover:border-gray-200 dark:hover:border-gray-500">
            <img src="img/senai.png" alt="logo" class="w-16 h-16 object-contain bg-white rounded-lg p-1 shadow-sm group-hover:scale-110 transition-transform duration-300">
            <div>
                <h4 class="text-xl font-bold text-gray-900 dark:text-white">SENAI-SP <span class="text-sm font-normal text-gray-500 dark:text-gray-400 ml-2">(2011 – 2013)</span></h4>
                <h5 class="text-lg text-primary-dark dark:text-primary-light font-medium mt-1">Técnico em Mecatrônica e Automação Industrial</h5>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="group flex flex-col md:flex-row items-start md:items-center gap-6 p-6 rounded-xl bg-white dark:bg-gray-700/50 shadow-md hover:bg-gray-50 dark:hover:bg-gray-700/80 transition-all duration-300 border border-gray-100 dark:border-gray-600 hover:border-gray-200 dark:hover:border-gray-500">
            <img src="img/monitor.png" alt="logo" class="w-16 h-16 object-contain bg-white rounded-lg p-1 shadow-sm group-hover:scale-110 transition-transform duration-300">
            <div>
                <h4 class="text-xl font-bold text-gray-900 dark:text-white">INSTITUTO MONITOR <span class="text-sm font-normal text-gray-500 dark:text-gray-400 ml-2">(2005 - 2009)</span></h4>
                <h5 class="text-lg text-primary-dark dark:text-primary-light font-medium mt-1">Técnico em Eletrônica</h5>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>
