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
    <body background="img/lake.jpg">
    
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class= "collapse navbar-collapse" id="navbar">
                <a href="index.php">
                    <img src="img/logo.png" alt="SCHELEDER">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a href="welcome.php" class="nav-link">Perfil</a>
                        </li>
                        <li class="nav-item">
                        <a href="contact.php" class="nav-link">Contato</a>
                        </li>
                        <li class="nav-item">
                        <a href="projects.php" class="nav-link">Projetos</a>
                        </li>
                        <li class="nav-item">
                        <a href="education.php" class="nav-link">Formação</a>
                        </li>
                        <li class="nav-item">
                        <a href="carreer.php" class="nav-link">Experiência</a>
                        </li>
            
                    </ul>
                </div>
            </nav>
        </header>
             <main>
             
             <div id="container-fluid">
            <div class="row">
                <div class="col-4">imagem</div>

                <div class="col-8">
                    <h1>Contato</h1> 
                </div>
            </div>
        </div>
                
            </main>
         <footer>
         <a href="/contact"><p>Contato &copy; 2022</p></a>   
         </footer>
         <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>