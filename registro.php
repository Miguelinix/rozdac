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
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <title>Registro | Rozdac</title>
    </head>
    <body>
         <header>
            <input type="checkbox" id="btn-menu">
            <label for="btn-menu"><img src="media/recursos/menu-icon.png" width="30px"></label>
            <img id="log" src="media/recursos/rozdac.jpg" width="85px" alt="logo Rozdac">

            <nav class="menu">
                <ul>
                    <li><a href="#" id="logoAlb">.</a></li>
                    
                </ul>
            </nav>
        </header>
        <div class="inicio">
            
            <h1>Registro</h1>
            <form action="" method="post" name="registro" enctype="multipart/form-data">

                <input type="text" name="name" placeholder="Nombre" autocomplete="off" />

                <input type="text" name="lastname" placeholder="Apellido" autocomplete="off" />

                <input type="text" name="user" placeholder="Nombre de Usuario" autocomplete="off" />

                <input type="email" name="email" placeholder="Correo Electrónico" autocomplete="off" />

                <input type="password" name="password" placeholder="Contraseña" autocomplete="off" />

                <input type="password" name="verify_password" placeholder="Confirmar contraseña" autocomplete="off" />

                <input type="tel" name="telefono" placeholder="Teléfeno (Sin guión)" autocomplete="off" min="0" pattern="[0-9]{8}"/>

                <select name="departamento" id="departamento" onchange="selc();">
                    <option value="0">Seleccione Departamento</option>
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

                <select name="municipio" id="municipio" disabled onchange="munic_vac();">
                    <option value="0">Seleccione Municipio</option>
                </select>

                <textarea name="direccion" placeholder="Dirección" cols="30" rows="10"></textarea>

                <input type="date" name="fechaNac" autocomplete="off" >

                <div class="errorMsg"><?php echo $errorMsg; ?></div>

                <input type="submit" value="Enviar" name="enviar" />

            </form>
            <p>¿Ya tienes una cuenta <a href="login.php">aquí</a>?</p>    
            <a href="index.php">Regresar</a>

            <script src="js/arrays_munics.js"></script>
            <script src="js/dept_munic.js"></script>
        </div>
        
    </body>
</html>