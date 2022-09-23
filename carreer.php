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
                            <a href="welcome.php" class="nav-link">Perfil</a>
                            </li>
                            <li class="nav-item">
                            <a href="education.php" class="nav-link">Formação</a>
                            </li>
                            <li class="nav-item active">
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
            
                <h1>Experiência Profissional</h1> 

                <h3>BERRY GLOBAL (abr/2018 – jun/2022)</h3>

                <h3>SICPA DO BRASIL (out/2011 – mar/2017)</h3>

                <h3>ELECTRICWARE EQUIPAMENTOS (abr/2005 – set/2011)</h3>

                <h3>DARAX EXIDE ELECTRONICS (set/2001 – fev/2005)</h3>

                <h3>ENGENTRONICS (jun/1999 – ago/2001)</h3>

                <h3>NOBREPAR (mai/1995 – mai/1999)</h3>

                <h3>CEBEL EQUIPAMENTOS (nov/1992 – ago/1994)</h3>

                <h3>MILAN EQUIPAMENTOS CIENTÍFICOS (jan/1988 – out/1992)</h3>

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
