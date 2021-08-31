<?php

    require_once('Procesos/Controlador/loginregister.php');
    $errorMsg = '';
    session_start();

    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                $url = BASE_URL."Index.php";
                header("location: $url");
            break;
            case 2:
                $url = BASE_URL."Index.php";
                header("location: $url");
            break;
            default:
                $url = BASE_URL."login.php";
                header("location: $url");
            break;
        }
    }

    if(!empty($_POST["enviarSesion"])){
        $useremail = $_POST['useremail'];
        $password = $_POST['password'];


        if(strlen(trim($useremail))> 1 && strlen(trim($password))> 1){
            $errorMsg = login($useremail, $password);
        }else{
            $errorMsg = 'Por favor rellene todos los campos';
        }
    }

    if(!empty($_POST["enviar"])){
        $user = $_POST['user'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $verify = $_POST['verify_password'];
        $telefono = $_POST['telefono'];
        $fechaNac = $_POST['fechaNac'];

        $municipio = $_POST['municipio'];
        $departamento = $_POST['departamento'];
        $direccion = $_POST['direccion'];


        if(strlen(trim($user))> 1 && strlen(trim($name))> 1 && strlen(trim($lastname))> 1 && strlen(trim($email))> 1 && strlen(trim($password))> 1 && strlen(trim($verify))> 1 && strlen(trim($telefono))> 1 && strlen(trim($fechaNac))> 1  && strlen(trim($municipio))> 1  && strlen(trim($departamento))> 1 ){
            if($password == $verify){

                $direcion = $municipio.", ".$departamento;

                if(strlen(trim($direccion))> 1 ){
                    $direcion = $direccion.", ".$direcion;
                }

                $name .= $lastname;
                $rol = 1;
                $errorMsg = registro($user, $name, $email, $password, $telefono, $fechaNac, $rol, $direcion);
            }else{
                $errorMsg = 'Las contraseñas no coinciden';
            }
        }else{
            $errorMsg = 'Por favor rellene todos los campos';
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
        <link rel="preconnect" href="https://fonts.gstatic.com">
       
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet"> 
        <title>Login | Rozdac</title>
    </head>
    <body>
        <header>
        <a href="index.php"><img id="log" src="media/recursos/rozdac.jpg" width="100px" alt="logo Rozdac"></a>
            
            </nav>
        </header>
                <!-- <h2>Rozdac</h2> -->
        <main class="wrapper ">
            <div class="container" id="container">
                <div class="form-container sign-up-container">
                    <form action="" method="post" name="registro" enctype="multipart/form-data">
                        <h1>Crear Cuenta</h1>
                        
                        <div class="errorMsg"><?php echo $errorMsg; ?></div>
                        <!-- <span>use su correo electrónico para registrarse</span> -->
                        <div class="row">
                            <input class="field col m6" type="text" name="name" placeholder="Nombre" autocomplete="off" />
                            <input class="field col m6" type="text" name="lastname" placeholder="Apellido" autocomplete="off" />
                        </div>
                        <div class="row">
                            <input class="field col m6" type="text" name="user" placeholder="Nombre de Usuario" autocomplete="off" />
                            <input class="field col m6" type="email" name="email" placeholder="Correo Electrónico" autocomplete="off" />
                        </div>
                        
                        <div class="row">
                            
                            
                            <input class="field col m6" type="password" name="password" placeholder="Contraseña" autocomplete="off" />
                            <input class="field col m6" type="password" name="verify_password" placeholder="Confirmar contraseña" autocomplete="off" />
                        </div>

                        <div class="row">
                            <input class="field col m6" type="tel" name="telefono" placeholder="Teléfeno (Sin guión)" autocomplete="off" min="0" pattern="[0-9]{8}"/>
                            <select class=" field-select col m6" name="departamento" id="departamento" onchange="selc();">
                                <option value="0">Departamento</option>
                                <option>Ahuachapán</option>
                                <option>Cabañas</option>
                                <option>Chalatenango</option>
                                <option>Cuscatlán</option>
                                <option>La Libertad</option>
                                <option>La Paz</option>
                                <option>La Unión</option>
                                <option>Morazán</option>
                                <option>San Salvador</option>
                                <option>San Vicente</option>
                                <option>Santa Ana</option>
                                <option>Sonsonate</option>
                                <option>San Miguel</option>
                                <option>Usulután</option>
                            </select>
                        </div>
                        <div class="row">
                            <input class=" field col m6" type="date" name="fechaNac" autocomplete="off" >
                            <select class=" field-select col m6" name="municipio" id="municipio" disabled onchange="munic_vac();">
                                <option value="0">Municipio</option>
                            </select>
                        </div>
                        <textarea name="direccion" placeholder="Dirección" cols="30" rows="3"></textarea>
                        <input class="button" type="submit" value="Enviar" name="enviar" />

                    </form>
                </div>
                <div class="form-container sign-in-container">
                    <form action="" method="post" name="registro" enctype="multipart/form-data" class="">
                        <h1>Iniciar sesión</h1>
                        <div class="social-container">
                            <!-- si tienen forma de loguearse con cuentas sociales pueden usar esto -->

                            <!-- <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> -->
                        </div>
                        <!-- Use su cuenta -->
                        <div class="errorMsg"><span><?php echo $errorMsg; ?></span></div>
                        <input type="text" name="useremail" placeholder="Usuario o email" autocomplete="off"  />
                        <input  type="password" name="password" placeholder="Contraseña" autocomplete="off" />
                        <a href="#">¿Olvidó su contraseña?</a>
                        <input class="button" type="submit" value="Iniciar sesión" name="enviarSesion"/>
                    </form>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1>¡Bienvenido!</h1>
                            <p>Para mantenerse conectado con nosotros, inicie sesión con sus credenciales</p>
                            <button class="ghost" id="signIn">Iniciar sesión</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1>¡Hola, Amigo!</h1>
                            <p>Registre sus datos personales y empiece a trabajar con nosotros</p>
                            <button class="ghost" id="signUp">Registrarse</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        


    
        <script  src="js/login_efect.js"></script>
        <script src="js/arrays_munics.js"></script>
            <script src="js/dept_munic.js"></script>
    </body>
</html>