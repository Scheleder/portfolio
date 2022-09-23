<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Scheleder</title>
        
	    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />     
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
                    <a href="index.php"><img src="img/logo.png" alt="SCHELEDER"></a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse" id="menu" style="">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a href="welcome.php active" class="nav-link">Perfil</a>
                            </li>
                            <li class="nav-item">
                            <a href="education.php" class="nav-link">Formação</a>
                            </li>
                            <li class="nav-item">
                            <a href="carreer.php" class="nav-link">Experiência</a>
                            </li>
                            <li class="nav-item">
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
                <div class="row">
                <div class="col-2">imagem</div>

                <div class="col-8">
                
                    <h2>João Scheleder Neto</h2> 
                    <h3>Analista de Sistemas</h3>    
                    <h4>
                    PCD visão monocular, Divorciado, 3 filhos, 50 anos, carteira de habilitação B, 
                    não fumante, pontual, bom conhecimento em informática, resiliente, proativo, 
                    intraempreendedor, experiência com trabalho em equipe, disponibilidade para viagens, 
                    negociação com clientes e fornecedores, vivência com normas técnicas e de 
                    qualidade. 
                    </br>
                    Busco oportunidades na área de Análise de Sistemas para as funções de Programador, 
                    Analista, Controlador de Qualidade, Projetista Eletrônico ou em demais áreas em que 
                    meus conhecimentos se enquadrem e possam efetivamente contribuir.
                    </br>
                    Conhecimento em linguagens de programação Java, PHP, C, Assembly, Delphi, HTML e CSS.
                    Experiência na utilização de framework Bootstrap, Laravel, Github, SQL e aplicações 
                    mobile.
                    </br>
                    Desenvolvimento de aplicações para sistemas mobile e desktop, conexão a banco de 
                    dados, atuação em laboratório de manutenção, atendimentos em diversos contratos 
                    de manutenção, homologação de componentes e fornecedores, venda técnica de produtos 
                    e serviços, desenvolvimento de produtos, projetos eletrônicos diversos...
                    </h4> 
                </div>
                </div>
                </div>     
            </main>
         <footer>
         <a href="contact.php"><p>João Scheleder Neto &copy; 2022</p></a>   
         </footer>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> 
    </body>
</html>