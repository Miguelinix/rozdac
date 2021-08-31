<?php

    require_once("../../Procesos/Controlador/negocios.php");
    $errorMsg = '';
    session_start();

    if(isset($_SESSION['userid']) && isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 2:
                $url = BASE_URL."Admin.php";
                header("location: $url");
            break;
        }
    }else{
        $url = BASE_URL."login.php";
        header("location: $url");
    }

    if(isset($_POST['enviar'])){
        $negoid = $_POST['Id'];
        $name = $_POST['name'];
        $descripcion = $_POST['descripcion'];
        $mision = $_POST['mision'];
        $vision = $_POST['vision'];
        
        if(strlen($negoid)>0 && strlen($name)>0 && strlen($descripcion)>0){
            if(!(strlen($mision)>0)){
                $mision = "Aun no sé ha agregado ninguna misión";
            }
            if(!(strlen($vision)>0)){
                $vision = "Aun no sé ha agregado ninguna visión";
            }
            if(strlen($negoid)<6){
                $errorMsg = addNegocio($negoid, $name, $descripcion, $mision, $vision);
            }else{
                $errorMsg = "El nombre corto debe contener 5 dígitos máximo";
            }
        }else{
            $errorMsg = "Por favor rellene todos los campos";
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear negocio | Rozdac</title>
    </head>
    <body>
        <h1>Crear un negocio</h1>
        <form action="" method="post" name="addnego" enctype="multipart/form-data">

            <input type="text" name="Id"  placeholder="Nombre corto" autocomplete="off" /><br>

            <input type="text" name="name"  placeholder="Nombre" autocomplete="off" /><br>

            <textarea name="descripcion" placeholder="Descripción" cols="30" rows="10"></textarea><br>

            <textarea name="mision" placeholder="Misión" cols="30" rows="10"></textarea><br>

            <textarea name="vision" placeholder="Visión" cols="30" rows="10"></textarea><br>

            <input type="file" name="fotoLogo"  placeholder="Nombre" autocomplete="off" /><br>

            <div class="errorMsg"><?php echo $errorMsg; ?></div>

            <input type="submit" value="Registrar" name="enviar">

        </form>
    </body>
</html>