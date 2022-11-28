<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Scheleder</title>
        <link rel="apple-touch-icon" sizes="180x180" href="/ico/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/ico/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/ico/favicon-16x16.png">
        <link rel="manifest" href="/ico/site.webmanifest">
        <link rel="mask-icon" href="/ico/safari-pinned-tab.svg" color="#880000">
        <meta name="msapplication-TileColor" content="#ffc40d">
        <meta name="theme-color" content="#ffffff">
        <link rel="shortcut icon" href="ico/favicon.ico" type="image/x-icon" />     
        <!--Fonte do Google-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!--CSS da Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">         
        <!--CSS da Aplicação-->
        <link rel="stylesheet" href="css/styles.css" />
        <script src="js/scripts.js"></script>
        <script type="text/javascript">
            function url(link){
                document.getElementById("conteudo").setAttribute('src',link);
            }
        </script>

    </head>
    <body background="img/wall.jpg">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid" id="navbar">
                    <a href="index.php"><img src="img/logo.png" alt="logo"></a>
                    <div id="foto"><img src="img/projects.png" alt="foto"></div>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse" id="menu" style="">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a href="welcome.php" class="nav-link">Perfil</a>
                            </li>
                            <li class="nav-item">
                            <a href="education.php" class="nav-link">Formação</a>
                            </li>
                            <li class="nav-item">
                            <a href="carreer.php" class="nav-link">Experiência</a>
                            </li>
                            <li class="nav-item active">
                            <a href="projects.php" class="nav-link">Projetos</a>
                            </li>
                            <li class="nav-item">
                            <a href="contact.php" class="nav-link">Contato</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
             <main>
                <div id="container-fluid">
                    <h1>Projetos e Realização Profissional</h1> 
                    
                    <h4><ion-icon size="normal" name="create"></ion-icon> APLICAÇÃO - GERENCIADOR DE AGENDAMENTOS</h4>
                    <h5>Aplicação desenvolvida em LARAVEL, com acesso via web, responsável pela gestão de cursos, matriculas 
                        e agendamentos de pacientes nas aulas de pós graduação e residência clínica do Instituto BRA de 
                        Capacitação e Treinamento, em Curitiba.</h5>

                    <h4><ion-icon size="normal" name="code-working"></ion-icon> WEBSERVICE - GERENCIADOR DE BACKUPS PARA AUTOMAÇÃO INDUSTRIAL</h4>
                    <h5>Aplicação desenvolvida em PHP, HTML, JS e CSS, funciona via ethernet, para armazenamento e 
                        gerenciamento de backups dos firmwares, projetos e arquivos de configuração dos equipamentos 
                        de automação industrial (CLPs, Drivers, PCs, Inversores, etc.) utilizados na planta da 
                        Berry Global de São José dos Pinhais.</h5>

                        <h4><ion-icon size="normal" name="logo-android"></ion-icon> APLICATIVO - BERRY 5S</h4>
                    <h5>Aplicação Android desenvolvida em JAVA para realização e gestão de auditorias de housekeeping, 
                        utilizando a metodologia 5S utilizando o aparelho celular, com registros de imagens e geração 
                        de gráficos de desempenho e relatórios on-line em pdf, eliminando a utlização de papel no processo.</h5>

                        <h4><ion-icon size="normal" name="bulb"></ion-icon> APLICATIVO - NAVEGADOR</h4>
                    <h5>Aplicativo desenvolvido em JAVA para desktop e celular. Armazena os relatórios de atendimentos realizados
                        pelo setor de manutenção, registrando todo o processo desde o inicio do incidente até a solução, 
                        podendo armazenar fotos e comentários inseridos pelo técnico. Visa melhorar a gestão do conhecimento
                        e auxiliar no processo de melhoria contínua.</h5>

                        <h4><ion-icon size="normal" name="desktop"></ion-icon> APLICATIVO - SLIDE PICTURES</h4>
                    <h5>Aplicativo desenvolvido em JAVA para desktop. Consiste numa aplicação que exibe anúncios e pode 
                        ser gerenciada pela rede local, com o objetivo de melhorar a comunicação empresarial.</h5>
               
                        <h4><ion-icon size="normal" name="color-wand"></ion-icon> ORGANIZAÇÃO SETOR</h4>
                    <h5>Organização do setor de Tecnologia da Informação dos Computadores Industriais da Berry Global 
                        na planta de São José dos Pinhais, incluindo manutenção dos backups dos Hard-drivers e montagem 
                        e disponibilização de equipamentos reservas para pronta substituição.</h5>
               
                        <h4><ion-icon size="normal" name="sparkles"></ion-icon> ORGANIZAÇÃO SETOR</h4>
                    <h5>Organização do setor de Laboratório de Manutenção da Regional Sul do Projeto SICOBE na Sicpa do 
                        Brasil, melhorando o suporte e treinamentos aos técnicos de campo.</h5>
               
                        <h4><ion-icon size="normal" name="trending-up"></ion-icon> MELHORIA DA PLANTA</h4>
                    <h5>Organização e melhoria implementada nos equipamentos do Projeto SICOBE da Casa da Moeda do Brasil,
                        instalados nas sete linhas de produção da Grassi Bebidas em Tubarão, Santa Catarina. Em dois anos de 
                        trabalho a planta saltou do penúltimo para o terceiro lugar na regional sul em termos de indicadores 
                        de desempenho, incluindo economia de insumos.</h5>

                        <h4><ion-icon size="normal" name="cog"></ion-icon> MELHORIA EM EQUIPAMENTO</h4>
                    <h5>Modificações de software e substituição de componentes em equipamento do tipo Jar-Teste na Milan Equipamentos, 
                        em Colombo, Paraná. A mudança no tipo de polias de trasmissão possibilitou a utilização de um único 
                        motor, com menor custo, em todos os modelos de equipamentos fabricados.
                    </h5>

                    <h4><ion-icon size="normal" name="hardware-chip"></ion-icon> DESENVOLVIMENTO DE EQUIPAMENTO</h4>
                    <h5>Desenvolvimento de hardware e software de equipamento do tipo Jar-teste em miniatura, para mini estações 
                        de tratamento de água, na Milan Equipamentos, em Colombo, Paraná. O equipamento é utilizado com 
                        fins educacionais.
                    </h5>

                    <h4><ion-icon size="normal" name="file-tray-stacked"></ion-icon> GESTÂO</h4>
                    <h5>Gestão de contratos de manutenção com diversas empresas (Vivo, Caixa Econômica Federal, PUC-PR, 
                        TecBan, CREA-PR, Receita Federal, Bradesco, Nortox, Prefeitura de Curitiba, Casa Civil, Lojas 
                        Americanas, C&A Modas, Unimed, etc.), gestão e homologação de fornecedores, negociação com clientes e 
                        demais processos empresariais, durante a gestão da Electricware Equipamentos.
                    </h5>

                    <h4><ion-icon size="normal" name="hardware-chip"></ion-icon> DESENVOLVIMENTO DE EQUIPAMENTOS</h4>
                    <h5>Desenvolvimento de diversos equipamentos microcontrolados (Inversores, Retificadores, Estabilizadores de tensão, 
                        carregadores de baterias, interfaces de comunicação, etc) utilizados na automação de motor-homes e 
                        diversas aplicações industriais patra clientes da Electricware Equipamentos.
                    </h5>

                    <h4><ion-icon size="normal" name="construct"></ion-icon> REFORMA DE EQUIPAMENTOS</h4>
                    <h5>Participação na reforma e melhoria do placar eletrônico do Jockey Club do Paraná. O equipamento estava 
                        desativado a muito tempo devido a um incêndio, foi realizado então uma substituição completa dos equipamentos,
                        implementando também a comunicação com a central de apostas e a possibilidade de exibição de mensagens ao público.
                    </h5>

                    <h4><ion-icon size="normal" name="git-network"></ion-icon> MELHORIA EM EQUIPAMENTO</h4>
                    <h5>Modificações de layout no circuito impresso do amplificador de áudio para headset na Cebel Equipamentos, 
                        eliminando a reprodução de ruídos indesejáveis e melhorando a qualidade do equipamento.
                    </h5>
               
                </div>               
            </main>
         <footer>
         <a href="contact.php"><p>João Scheleder Neto &copy; 2022</p></a>   
         </footer>
         <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> 
    </body>
</html>

    