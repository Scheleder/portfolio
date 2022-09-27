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
    </head>
    <body background="img/wall.jpg">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid" id="navbar">
                    <a href="index.php"><img src="img/logo.png" alt="SCHELEDER"></a>
                    <div id="foto"><img src="img/perfil.png" alt="foto"></div>
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
                <h1>Bem vindo ao meu Portfolio Profissional!</h1>
                <h4>Meu nome é <spam style="color:#A11">João Scheleder Neto</spam>, 
                busco oportunidades na área de Análise de Sistemas para as funções de Programador, Desenvolvedor,
                    Analista, Controlador de Qualidade, Projetista Eletrônico ou em demais áreas em que 
                    meus conhecimentos se enquadrem.</h4>
                <h4>Acesse o menu ao lado para saber mais.</h4>
                <h4>Ou então, faça o download do meu Currículo:</h4>  
                <a href="docs/cv_scheleder.pdf" class="nav-link">
                            <ion-icon size="large" name="newspaper-outline"></ion-icon>   
                            cv_scheleder.pdf</a>
                </div>              
            </main>
         <footer>
         <a href="contact.php"><p>João Scheleder Neto &copy; 2022</p></a>   
         </footer>
         <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> 
    </body>
</html>
