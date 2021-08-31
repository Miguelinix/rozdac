<?php

    require_once("../../Procesos/Modelos/class.conexion.php");
    require_once("../../Procesos/Modelos/class.negocios.php");

    function mostrarnNegocios($user){
        $nego = new negoClass();
        $rows = $nego->cargarNegocios($user);

        if(isset($rows)){
            foreach($rows as $row){
                echo "<a href='ajustes_negocio.php?Id=".$row['Id']."'>".$row['name']."</a><br>";
            }
        }else{
            echo "<p>Aun no cuentas con ningún negocio</p>";
        }
    }

    function addNegocio($negoid, $name, $descripcion, $mision, $vision){
        $nego = new negoClass();
        $negoid_check = preg_match('~^[A-Za-z0-9]{1,5}$~i', $negoid);

        $img = $_FILES['fotoLogo']['name'];
        $tipo = $_FILES['fotoLogo']['type'];
        $tamano = $_FILES['fotoLogo']['size'];

        $extension = explode("/",$tipo);
        if(($img == !null) && ($tamano <= 400000) && $negoid_check){
            if(($tipo == "image/jpeg") || ($tipo == "image/png") || ( $tipo == "image/jpg")){
                $directorio = $_SERVER['DOCUMENT_ROOT'].'/Rozdac/media/negocios/';
                $user = $_SESSION['userid'];
                $fin = $nego->addNegocio($negoid, $name, $descripcion, $mision, $vision, $user);

                if($fin){
                    $pic = "logotipo".$negoid.".".$extension[1];
                    move_uploaded_file($_FILES['fotoLogo']['tmp_name'],$directorio.$pic);
                    $nego->fotoLogo($negoid, $pic);
                    $url = BASE_URL."apis/cliente/negocios.php";
                    return "<script>alert('Negocio registrado correctamente')
                                window.location.href = '$url';</script>";
                }else{
                    return "Verifique los datos ingresados";
                }
            }else{
                return "No puedes ingresar una imagen en ese formato";
            }
        }else{
            if(!$negoid_check){
                return "Nombre corto no valido";
            }
            if($img == null){
                $user = $_SESSION['userid'];
                $fin = $nego->addNegocio($negoid, $name, $descripcion, $mision, $vision, $user);
                
                if($fin){
                    $pic = "default.jpg";
                    $nego->fotoLogo($negoid, $pic);
                    $url = BASE_URL."apis/cliente/negocios.php";
                    return "<script>alert('Negocio registrado correctamente')
                              window.location.href = '$url';</script>";
                }else{
                    return "Verifique los datos ingresados";
                }
            }
            if(!($tamano <= 400000)){
                return "La imagen es muy grande";
            }
        }
        
    }

    function modPhoto($campo, $negoid){
        $nego = new negoClass();
                        
        $img = $_FILES['valor']['name'];
        $tipo = $_FILES['valor']['type'];
        $tamano = $_FILES['valor']['size'];

        $extension = explode("/",$tipo);
        if(($img == !null) && ($tamano <= 400000)){
            if(($tipo == "image/jpeg") || ($tipo == "image/png") || ( $tipo == "image/jpg")){
                $directorio = $_SERVER['DOCUMENT_ROOT'].'/Rozdac/media/negocios/';

                $valor = "logotipo".$negoid.".".$extension[1];
                move_uploaded_file($_FILES['valor']['tmp_name'],$directorio.$valor);
                $nego->modificarNego($campo, $valor, $negoid);
                $url = BASE_URL."apis/cliente/negocios.php";
                $errorMsg = "<script>alert('Negocio registrado correctamente')
                            window.location.href = '$url';</script>";
            }else{
                $errorMsg = "No puedes ingresar una imagen en ese formato";
            }
        }else{
            if($img == null){
                $errorMsg = "Debes seleccionar una imagen";
            }
            if(!($tamano <= 400000))
            $errorMsg = "La imagen es muy grande";
        }

    }

