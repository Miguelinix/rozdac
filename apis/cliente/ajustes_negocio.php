<?php

    require_once("../../Procesos/Modelos/class.conexion.php");
    require_once("../../Procesos/Modelos/class.negocios.php");
    require_once("../../Procesos/Controlador/negocios.php");
    $errorMsg = '';
    $nego = new negoClass();
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

    if(isset($_GET['Id'])){
        $negoid = $_GET['Id'];

        if(isset($_POST['enviar']) && isset($_POST['campo'])){
            if(isset($_POST['valor'])){
                $valor = $_POST['valor'];
            }
            $campo = $_POST['campo'];

            switch($campo){
                case "name":
                case "descripcion":
                case "mision":
                case "vision":
                    if(strlen(trim($valor))> 1 && strlen(trim($campo))> 1){
                        $nego->modificarNego($campo, $valor, $negoid);
                    }else{
                        $errorMsg = "Debes rellenar todos los campos";
                    }
                break;
                case "photoLogo":
                    if(strlen(trim($campo))> 1){
                        modPhoto($campo,$negoid);
                    }else{
                        $errorMsg = "Debes rellenar todos los campos";
                    }
                break;
                default:
                    $errorMsg = "<script>alert('Ocurrio un error a la hora de modificar el dato, intenta nuevamente más tarde.');</script>";
            }
        }
    }else{
        $negoid = 0;
    }
    
    $rows = $nego->cargarNegocio($negoid);

    if(isset($rows)){
        foreach($rows as $row){
            if(isset($_SESSION['userid'])){
                if(!($_SESSION['userid'] == $row['user'])){
                    $url = BASE_URL."apis/cliente/negocios.php";
                    header("location: $url");
                }
            }
        }
    }

?>
<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajustes de negocio | Rozdac</title>
    </head>
    <body>
        <h1>Ajustes de negocio</h1>
        <a href="negocios.php">Regresar</a><br>
        <?php

            if(isset($rows)){
                foreach($rows as $row){

                    if(isset($_GET['settingData'])){

                        $ds = $_GET['settingData'];
                        switch($ds){
                            case 1:
                                echo "<a href='ajustes_negocio.php?Id=".$row['Id']."'>Cancelar</a>";
                                echo $row['name']."<br>";?>
                                <form action="" method="post" name="modificar" enctype="multipart/form-data">

                                    <input type="text" name="valor" placeholder="Nombre" autocomplete="off" value="<?php echo $row['name']; ?>"/>
                                    <input type="hidden" name="campo" value="name">
                                    <input type="hidden" name="settingData" value=0>
                                    <div class="errorMsg"><?php echo $errorMsg; ?></div>
                                    <input type="submit" name="enviar" value="Enviar">

                                </form>
                                <a href="ajustes_negocio.php?Id=<?php echo $negoid; ?>&settingData=0">Cancelar</a><br>
                                <?php
                                echo $row['descripcion']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=2' >Editar</a>"."<br>";
                                echo $row['mision']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=3' >Editar</a>"."<br>";
                                echo $row['vision']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=4' >Editar</a>"."<br>";
                                echo "<p>Logo del negocio</p><img src='../../media/negocios/".$row['photoLogo']."' alt='Logo'><a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=5' >Cambiar logo</a>"."<br>";
                            break;
                            case 2:
                                echo "<a href='ajustes_negocio.php?Id=".$row['Id']."'>Cancelar</a>";
                                echo $row['name']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=1' >Editar</a>"."<br>";
                                echo $row['descripcion']."<br>";?>
                                <form action="" method="post" name="modificar" enctype="multipart/form-data">

                                    <textarea name="valor" cols="30" rows="10"><?php echo $row['descripcion']; ?></textarea>
                                    <input type="hidden" name="campo" value="descripcion">
                                    <div class="errorMsg"><?php echo $errorMsg; ?></div>
                                    <input type="submit" name="enviar" value="Enviar">

                                </form>
                                <a href="ajustes_negocio.php?Id=<?php echo $negoid; ?>&settingData=0">Cancelar</a><br>
                                <?php
                                echo $row['mision']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=3' >Editar</a>"."<br>";
                                echo $row['vision']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=4' >Editar</a>"."<br>";
                                echo "<p>Logo del negocio</p><img src='../../media/negocios/".$row['photoLogo']."' alt='Logo'><a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=5' >Cambiar logo</a>"."<br>";
                            break;
                            case 3:
                                echo "<a href='ajustes_negocio.php?Id=".$row['Id']."'>Cancelar</a>";
                                echo $row['name']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=1' >Editar</a>"."<br>";
                                echo $row['descripcion']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=2' >Editar</a>"."<br>";
                                echo $row['mision']."<br>";?>
                                <form action="" method="post" name="modificar" enctype="multipart/form-data">

                                    <textarea name="valor" cols="30" rows="10"><?php echo $row['mision']; ?></textarea>
                                    <input type="hidden" name="campo" value="mision">
                                    <div class="errorMsg"><?php echo $errorMsg; ?></div>
                                    <input type="submit" name="enviar" value="Enviar">

                                </form>
                                <a href="ajustes_negocio.php?Id=<?php echo $negoid; ?>&settingData=0">Cancelar</a><br>
                                <?php
                                echo $row['vision']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=4' >Editar</a>"."<br>";
                                echo "<p>Logo del negocio</p><img src='../../media/negocios/".$row['photoLogo']."' alt='Logo'><a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=5' >Cambiar logo</a>"."<br>";
                            break;
                            case 4:
                                echo "<a href='ajustes_negocio.php?Id=".$row['Id']."'>Cancelar</a>";
                                echo $row['name']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=1' >Editar</a>"."<br>";
                                echo $row['descripcion']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=2' >Editar</a>"."<br>";
                                echo $row['mision']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=3' >Editar</a>"."<br>";
                                echo $row['vision']."<br>";?>
                                <form action="" method="post" name="modificar" enctype="multipart/form-data">
                                    
                                    <textarea name="valor" cols="30" rows="10"><?php echo $row['vision']; ?></textarea>
                                    <input type="hidden" name="campo" value="vision">
                                    <div class="errorMsg"><?php echo $errorMsg; ?></div>
                                    <input type="submit" name="enviar" value="Enviar">

                                </form>
                                <a href="ajustes_negocio.php?Id=<?php echo $negoid; ?>&settingData=0">Cancelar</a><br>
                                <?php
                                echo "<p>Logo del negocio</p><img src='../../media/negocios/".$row['photoLogo']."' alt='Logo'><a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=5' >Cambiar logo</a>"."<br>";
                            break;
                            case 5:
                                echo "<a href='ajustes_negocio.php?Id=".$row['Id']."'>Cancelar</a>";
                                echo $row['name']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=1' >Editar</a>"."<br>";
                                echo $row['descripcion']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=2' >Editar</a>"."<br>";
                                echo $row['mision']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=3' >Editar</a>"."<br>";
                                echo $row['vision']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=4' >Editar</a>"."<br>";
                                echo "<p>Logo del negocio</p>"?>
                                <form action="" method="post" name="modificar" enctype="multipart/form-data">
                                    
                                    <input type="file" name="valor" accept=".jpg, .png, .jpeg">
                                    <input type="hidden" name="campo" value="photoLogo">
                                    <div class="errorMsg"><?php echo $errorMsg; ?></div>
                                    <input type="submit" name="enviar" value="Enviar">

                                </form>
                                <a href="ajustes_negocio.php?Id=<?php echo $negoid; ?>&settingData=0">Cancelar</a><br>
                                <?php
                            break;
                            default:
                                echo "<a href='ajustes_negocio.php?Id=".$row['Id']."'>Cancelar</a>";
                                echo $row['name']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=1' >Editar</a>"."<br>";
                                echo $row['descripcion']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=2' >Editar</a>"."<br>";
                                echo $row['mision']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=3' >Editar</a>"."<br>";
                                echo $row['vision']."<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=4' >Editar</a>"."<br>";
                                echo "<p>Logo del negocio</p><img src='../../media/negocios/".$row['photoLogo']."' alt='Logo'><a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=5' >Cambiar logo</a>"."<br>";
                        }
                    }else{
                        echo "<a href='ajustes_negocio.php?Id=".$row['Id']."&settingData=0'>Editar negocio</a><br>";
                        echo $row['name']."<br>";
                        echo $row['descripcion']."<br>";
                        echo $row['mision']."<br>";
                        echo $row['vision']."<br>";
                        echo "<img src='../../media/negocios/".$row['photoLogo']."' alt='Logo'>";
                    }
                }
            }else{
                $url = BASE_URL."apis/cliente/negocios.php";
                header("location: $url");
            }
        ?>
    </body>
</html>