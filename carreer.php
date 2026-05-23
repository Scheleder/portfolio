<?php 
$headerImg = 'carreer.png';
require_once 'header.php'; 
?>

<div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-xl p-8 md:p-12 transition-all duration-300 mb-10">
    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-10 border-b-2 border-primary-dark dark:border-primary-light pb-4 inline-block">Experiência Profissional</h1> 

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <?php
        $experiences = [
            ['logo' => 'gstech.png', 'company' => 'GSTECH', 'date' => 'jul/2024', 'role' => 'Desenvolvedor de Sistemas', 'prof_dev' => 'Aprimoramento em novas tecnologias e projetos.', 'desc' => 'Programação em C#, PHP e JavaScript.'],
            ['logo' => 'boticario.png', 'company' => 'GRUPO BOTICÁRIO', 'date' => 'fev/2024 – abr/2026', 'role' => 'Técnico de Automação.', 'prof_dev' => 'Aprimoramento em manutenção e processos da logísticos.', 'desc' => 'Manutenção de sistemas de automação industrial.'],
            ['logo' => 'raltec.png', 'company' => 'RALTEC BRASIL', 'date' => 'fev/2023 – jul/2024', 'role' => 'Desenvolvedor full-stack.', 'prof_dev' => 'Avanço em arquiteturas web, banco de dados e linguagens full-stack.', 'desc' => 'Desenvolvimento de aplicações diversas nas linguagens C#, javascript e PHP.'],
            ['logo' => 'berry.png', 'company' => 'BERRY GLOBAL', 'date' => 'abr/2018 – jun/2022', 'role' => 'Analista de TI Industrial e Técnico de Automação.', 'prof_dev' => 'Desenvolvimento contínuo em TI industrial, integração de sistemas e automação.', 'desc' => 'Desenvolvimento de aplicações diversas, manutenção e programação de computadores industriais e manutenção de sistemas de automação industrial.'],
            ['logo' => 'sicpa.png', 'company' => 'SICPA DO BRASIL', 'date' => 'out/2011 – mar/2017', 'role' => 'Técnico de Sistemas.', 'prof_dev' => 'Especialização em CLPs, infraestrutura de servidores e controle de qualidade.', 'desc' => 'Técnico de laboratório, programação e manutenção em CLPs e servidores (Beckhoff), manutenção em sistema de automação e impressoras jato de tinta, revisão em instruções de trabalho no Projeto SICOBE na Casa da Moeda do Brasil.'],
            ['logo' => 'electricware.png', 'company' => 'ELECTRICWARE EQUIPAMENTOS', 'date' => 'abr/2005 – set/2011', 'role' => 'Sócio gerente.', 'prof_dev' => 'Gestão corporativa, liderança de equipes e expertise em engenharia eletrônica aplicada.', 'desc' => 'Instalação, manutenção em sistemas de energia estabilizada e ininterrupta, inversores. Desenvolvimento de projetos eletrônicos e programação de microcontroladores.'],
            ['logo' => 'industry2.png', 'company' => 'DARAX EXIDE ELECTRONICS', 'date' => 'set/2001 – fev/2005', 'role' => 'Técnico em Eletrônica.', 'prof_dev' => 'Especialização em sistemas de fornecimento de energia de alta capacidade e manutenção preditiva.', 'desc' => 'Instalação, manutenção corretiva, preventiva e preditiva em sistemas de energia estabilizada e ininterrupta e carregadores para baterias.'],
            ['logo' => 'industry2.png', 'company' => 'ENGENTRONICS', 'date' => 'jun/1999 – ago/2001', 'role' => 'Técnico em Eletrônica.', 'prof_dev' => 'Aprimoramento em telecomunicações, reparo em campo e sistemas eletrônicos dedicados.', 'desc' => 'Instalação, manutenção em sistemas de energia estabilizada. Automação de granjas. Manutenção de computadores, modems e reforma do placar eletrônico no Jockey Club do Paraná.'],
            ['logo' => 'industry2.png', 'company' => 'NOBREPAR', 'date' => 'mai/1995 – mai/1999', 'role' => 'Técnico em Eletrônica.', 'prof_dev' => 'Consolidação de fundamentos em circuitos, estabilizadores e resolução de falhas.', 'desc' => 'Instalação, manutenção corretiva, preventiva e preditiva em sistemas de energia estabilizada e ininterrupta.'],
            ['logo' => 'industry2.png', 'company' => 'CEBEL EQUIPAMENTOS', 'date' => 'nov/1992 – ago/1994', 'role' => 'Auxiliar Técnico e Desenhista.', 'prof_dev' => 'Desenvolvimento de habilidades em design mecânico/elétrico e projetos de áudio/vídeo.', 'desc' => 'Projeto, montagem e manutenção de equipamentos de áudio, vídeo e interface em equipamentos para aprendizado lingüístico.'],
            ['logo' => 'industry2.png', 'company' => 'MILAN EQUIPAMENTOS', 'date' => 'jan/1988 – out/1992', 'role' => 'Auxiliar Técnico e Serigrafista.', 'prof_dev' => 'Iniciação na montagem eletrônica laboratorial e práticas de serigrafia industrial.', 'desc' => 'Montagem e manutenção de equipamentos médicos e laboratoriais para sistemas de tratamento de água.']
        ];

        foreach ($experiences as $exp):
        ?>
        <!-- Card Clicável com Lógica de Modal -->
        <div class="group relative bg-white dark:bg-gray-700/50 shadow-md p-6 rounded-xl border border-gray-200 dark:border-gray-600 hover:shadow-xl hover:border-primary-light dark:hover:border-primary-dark transition-all duration-300 cursor-pointer transform hover:-translate-y-1" onclick="showCardModal(this)">
            
            <!-- Dados Ocultos para o Modal -->
            <div class="modal-data hidden">
                <div class="title">
                    <?= $exp['company'] ?> 
                    <span class="text-base font-medium text-primary-dark dark:text-primary-light ml-2 border-l-2 border-gray-300 dark:border-gray-600 pl-2"><?= $exp['date'] ?></span>
                </div>
                <div class="content">
                    <div class="flex items-start gap-3 text-gray-700 dark:text-gray-300 mb-4 bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border-l-4 border-primary-dark dark:border-primary-light">
                        <ion-icon name="id-card-outline" class="text-2xl mt-0.5 text-primary-dark dark:text-primary-light flex-shrink-0"></ion-icon>
                        <div>
                            <h4 class="text-sm text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wider mb-1">Cargo Ocupado</h4>
                            <h5 class="text-lg font-bold"><?= $exp['role'] ?></h5>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 text-gray-600 dark:text-gray-300 mb-4 px-2">
                        <ion-icon name="construct" class="text-2xl mt-0.5 text-primary-dark dark:text-primary-light flex-shrink-0"></ion-icon>
                        <div>
                            <h4 class="text-sm text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wider mb-1">Trabalhos Realizados</h4>
                            <p class="text-base leading-relaxed"><?= $exp['desc'] ?></p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 text-gray-600 dark:text-gray-300 px-2">
                        <ion-icon name="trending-up" class="text-2xl mt-0.5 text-primary-dark dark:text-primary-light flex-shrink-0"></ion-icon>
                        <div>
                            <h4 class="text-sm text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wider mb-1">Desenvolvimento Profissional</h4>
                            <p class="text-base font-semibold text-gray-800 dark:text-gray-100"><?= $exp['prof_dev'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Visão Simplificada do Card -->
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-white rounded-lg p-1 shadow flex-shrink-0 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                    <img src="img/<?= $exp['logo'] ?>" alt="logo" class="max-w-full max-h-full object-contain">
                </div>
                <div class="flex-1">
                    <h4 class="text-lg font-bold text-gray-900 dark:text-white"><?= $exp['company'] ?></h4>
                    <h5 class="text-sm font-semibold text-gray-600 dark:text-gray-300 mt-1 flex items-center gap-2">
                        <ion-icon name="calendar-outline" class="text-primary-dark dark:text-primary-light"></ion-icon>
                        <?= $exp['date'] ?>
                    </h5>
                </div>
                <div class="w-8 h-8 rounded-full bg-gray-100 dark:bg-gray-600 flex items-center justify-center text-gray-500 dark:text-gray-400 group-hover:bg-primary-light group-hover:text-primary-dark dark:group-hover:bg-primary-dark dark:group-hover:text-white transition-colors duration-300">
                    <ion-icon name="add"></ion-icon>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once 'footer.php'; ?>
