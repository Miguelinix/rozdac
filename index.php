<?php

    session_start();
    // session_unset();

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="css/index-style.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/footer.css">
        <script src="https://kit.fontawesome.com/28279bfb40.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="media/favicon.jpg" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio | Rozdac</title>
        </head>
    <body>
        <!-- <a href="apis/cliente/negocios.php">Mis Negocios</a> -->
        
        <header>  
            <input type="checkbox" id="btn-menu">
            <label for="btn-menu"><img src="media/recursos/menu-icon.png" width="30px"></label>
            <img id="log" src="media/recursos/rozdac.jpg" width="100px" alt="logo Rozdac">
            <nav class="menu">
                <ul>
                    <li><a href="#top" id="logoAlb"></a></li>
                    <li><a href="#description">¿Qué es Rozdac?</a></li>
                    <li><a href="#services">¿Por qué Rozdac?</a></li>
                    <li><a href="#team">Equipo</a></li>
                    <?php if(isset($_SESSION['userid'])){ ?><li><a href="apis/cliente/negocios.php">Mis Negocios</a></li><?php } ?>
                    <li><?php if(isset($_SESSION['userid'])){ ?><a href="#"><?php echo $_SESSION['userid']; ?></a> <?php }else{ ?><a href="login.php" id="login"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a> <?php } ?> </li>
                    <?php if(isset($_SESSION['userid'])){ ?><li><a href="Procesos/Controlador/logout.php">Cerrar Sesión</a></li><?php } ?>
                </ul>
            </nav>
        </header>
        <div class="head">
            <div class="backg">
                <img src="media/recursos/back.jpg">
                <div class="text">
                    <p>¡Hola, somos</p>
                    <p>
                        <span class="word">rozdac!</span>
                        <span class="word">rozdac!</span>
                    </p>
                    </div>
                <a href="#description">Saber más <i class="fas fa-arrow-circle-down"></i></a>
            </div>
        </div>
        <div class="body">
            <div class="descp">
                <p id="description">Here</p>
                <i class="fas fa-question-circle"></i>
                <h1>¿Qué es Rozdac?</h1>
                <p>Rozdac es un app dedicada al comercio virtual que hoy en dia debido a la pandemia por covid-19, ha experimentado un boom dentro del mercado nacional e 
                    internacional. Nuestra app cuenta con muchas funciones desde poder administrar tu pequeño negocio (Ej. Una tiendita de la colonia o un pequeño emprendimiento) a través del manejo de todo
                    tu inventario el cual podrá ser compartido por tus redes sociales mediante un link para poder llegar así más clientes y aumentar tus ganancias.
                    ¡EL FUTURO ES HOY!
                </p>
            </div>
            <div class="serv">
                <p id="services">Here</p>
                <h1>¿Por qué Rozdac?</h1>
                <div class="serv-client">
                    <img src="media/recursos/business_shop.svg">
                    <h2>Para ti que vendes</h2>
                    <p>¿Aburrido/a de administrar tu negocio una forma tradicional y tediosa? Con rozdac todo eso cambiará, como administrador/a de tu negocio 
                        podrás agilizar muchos procesos, con la ayuda de nuestra app tendrás una herremienta para crear tu propio inventario 
                        de productos cada uno con su nombre, descripción, precio, etc. Y asi llevar un mejor control del mismo
                        además este lo podrás compartir a través de un link por tus redes sociales para que cualquier persona con un celular tenga acceso a el, innovando 
                        asi la manera de poder llevar tus productos a más clientes potenciales.
                    </p>
                </div>
            </div>
            <div class="eqp">
                <p id="team">Here</p>
                <h1>Nuestro Equipo</h1>
                <p>Conoce un poco sobre los desarrolladores de Rozdac ;)</p>
            </div>
            <figure class="cards">
                <img src="media/recursos/programming.jpg" alt="programming" />
                <figcaption>
                    <img src="media/recursos/jeffry.webp" alt="profile" class="profile" />
                    <h2>Jeffry Hernández<span>Programador</span></h2>
                    <p>Estudiante de tercer año en desarrollo de software del colegio "Don Bosco", El Salvador — </p>
                    <a href="#" class="follow">GitHub</a>
                </figcaption>
                </figure>
                <figure class="cards"><img src="media/recursos/desing.jpg" alt="desing" />
                <figcaption>
                    <img src="media/recursos/christian.jpg" alt="profile" class="profile" id="this" />
                    <h2>Christian López<span>Diseñador Web</span></h2>
                    <p>Estudiante de tercer año en desarrollo de software del colegio "Don Bosco", El Salvador —</p>
                    <a href="#" class="follow">GitHub</a>
                </figcaption>
                </figure>
                <figure class="cards"><img src="media/recursos/programming.jpg" alt="programming" />
                <figcaption>
                    <img src="media/recursos/kevin.webp" alt="profile" class="profile" />
                    <h2>Kevin Sánchez Cano<span>Programador</span></h2>
                    <p>Estudiante de tercer año en desarrollo de software del colegio "Don Bosco", El Salvador — Si te caes siete veces, levántate ocho.</p>
                    <a href="https://github.com/kevinsanchezcano08" class="follow">GitHub</a>
                </figcaption>
                </figure>
                <figure class="cards"><img src="media/recursos/desing.jpg" alt="desing" />
                <figcaption>
                    <img src="media/recursos/marco.jpg" alt="profile" class="profile" id="this" />
                    <h2>Marco Zelaya<span>Diseñador Web</span></h2>
                    <p>Estudiante de tercer año en desarrollo de software del colegio "Don Bosco", El Salvador —</p>
                    <a href="#" class="follow">GitHub</a>
                </figcaption>
                </figure>
                <figure class="cards"><img src="media/recursos/programming.jpg" alt="programming" />
                <figcaption>
                    <img src="media/recursos/miguel.jpg" alt="profile" class="profile" id="this" />
                    <h2>Miguel Pineda<span>Programador</span></h2>
                    <p>Estudiante de tercer año en desarrollo de software del colegio "Don Bosco", El Salvador — </p>
                    <a href="https://github.com/kevinsanchezcano08" class="follow">GitHub</a>
                </figcaption>
                </figure> 
                <div class="lp">
                    <h1>Todo lo anterior se escucha chivo <span>¿cierto?</span></h1>
                    <img src="media/recursos/logo.jpg" alt="logo">
                    <a href="login.php">¡Usar la app! <i class="fas fa-arrow-circle-right"></i></a>
                </div>
        </div>
        <section>
            <footer class="container">
                <div class="social-media">
                    <nav>
                        <a href="#">
                            <img src="https://i.postimg.cc/SxprfYTY/facebook.png" alt="Facebook">
                        </a>
                        <a href="#">
                            <img src="https://i.postimg.cc/W4NwQLP2/instagram.png" alt="Instagram">
                        </a>
                        <a href="#">
                            <img src="https://i.postimg.cc/s2T4z6V5/youtube.png" alt="YouTube">
                        </a>
                    </nav>
                </div>
                <br>
                <div class="copyright">
                    <p>Rozdac</p>
                    <p>© copyright 2021.</p>
                    <p>Derechos Reservados UDB.</p>
                </div>
                <br>
                <a class="top" href="#top"><img src="https://i.postimg.cc/nrDLzgZg/arrow-up.png" alt="Top"></a>
            </footer>
        </section>
        <script src="js/words.js"></script>
    </body>
</html>