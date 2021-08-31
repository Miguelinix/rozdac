<?php

    require_once("../../Procesos/Controlador/negocios.php");
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

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mis Negocios | Rozdac</title>
    </head>
    <body>
        <a href="../../Index.php">Regresar</a><br>
        <h1>Mis negocios</h1>
        <?php
            $nego = new negoClass();
            $user = $_SESSION['userid'];

            mostrarnNegocios($user);

            $contar = $nego->contarNegocios($user);
            if($contar){
        ?>
        <a href="addnegocio.php">+</a>
        <?php
            }
        ?>
    </body>
</html>