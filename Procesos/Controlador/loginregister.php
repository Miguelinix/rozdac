<?php

    require_once('Procesos/Modelos/class.conexion.php');
    require_once('Procesos/Modelos/class.users.php');

    function registro($user, $name, $email, $password, $telefono, $fechaNac, $rol, $direccion){
        $userClass = new userClass();
        $username_check = preg_match('~^[A-Za-z0-9_]{3,15}$~i', $user);
        $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-Z]{2,4})$~i', $email);
        $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

        if($username_check && $email_check && $password_check){
            $userClass->userRegister($user, $name, $fechaNac, $email, $password, $rol, $telefono, $direccion);
            switch($_SESSION['rol']){
                case 1:
                    $url = BASE_URL."Index.php";
                    header("location: $url");
                break;
                case 2:
                    $url = BASE_URL."Index.php";
                    header("location: $url");
                break;
            }
        }else{
            if(!$username_check)
                return "Verifique el nombre de usuario.";
            if(!$email_check)
                return "Verifique el email de usuario.";
            if(!$password_check)
                return "Verifique la contraseña.";
        }
    }

    function login($useremail, $password){
        $userClass = new userClass();
        
        $userid = $userClass->userLogin($useremail, $password);
        if($userid){
            switch($_SESSION['rol']){
                case 1:
                    $url = BASE_URL."Index.php";
                    header("location: $url");
                break;
                case 2:
                    $url = BASE_URL."Admin.php";
                    header("location: $url");
                break;
            }

        }else{
            return "Por favor, revise nuevamente los datos.";
        }
    }