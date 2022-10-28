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
                    <a href="index.php"><img src="img/logo.png" alt="logo"></a>
                    <div id="foto"><img src="img/perfil.png" alt="foto"></div>                    
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse" id="menu" style="">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item active">
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
                    <h1>João Scheleder Neto</h1>    
                    <h4>
                    Nasci em Curitiba e hoje tenho 50 anos, resido na cidade de Colombo 
                    (região metropolitana de Curitiba), sou solteiro, tenho 3 lindos 
                    filhos (13, 17 e 30 anos), carteira de habilitação B,
                    não fumante, disponivel para viagens, trabalho on-site e/ou home-office.
                    </p>
                    Posso trabalhar como PCD, pois possuo visão monocular (CID H54-4), 
                    devido a uma toxoplasmose.
                    </p>
                    Tenho boa vivência com normas técnicas e de qualidade, melhoria de processos, 
                    negociação com clientes e fornecedores, gestão de contratos de manutenção, 
                    desenvolvimento de produtos, projetos eletrônicos e trabalho em equipe.
                    </p>
                    Tenho conhecimento em algumas linguagens de programação 
                    (Java, JavaSript, PHP, C, C++, Asssembly, Delphi, HTML, CSS...),
                    frameworks como Laravel, Spring, Node, React e Bootstrap, 
                    banco de dados SQL, Postgres, MongoDBe MariaDB, plataforma Github e 
                    desenvolvimento Android para aplicações mobile.                    
                    </h4> 
                </div>     
            </main>
         <footer>
         <a href="contact.php"><p>João Scheleder Neto &copy; 2022</p></a>   
         </footer>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> 
    </body>
</html>