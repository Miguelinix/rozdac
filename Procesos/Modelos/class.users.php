<?php

    class userClass{

        /* Register */
        public function userRegister($user, $name, $fechaNac, $email, $password, $rol, $telefono, $direccion){
            try{
                $modelo = new Conexion();
                $db = $modelo->get_conexion();
                $stmt = $db->prepare("SELECT * FROM user WHERE user=:user OR email=:email");
                $stmt->bindParam("user", $user, PDO::PARAM_STR);
                $stmt->bindParam("email", $email, PDO::PARAM_STR);
                $stmt->execute();
                $count = $stmt->rowCount();
                if($count<1){
                    $st = $db->prepare("INSERT INTO user(user,name,fechaNac,email,password,rol,telefono,direccion) VALUES (:user,:name,:fechaNac,:email,:password,:rol,:telefono,:direccion)");
                    $st->bindParam("user", $user, PDO::PARAM_STR);
                    $st->bindParam("email", $email, PDO::PARAM_STR);
                    $st->bindParam("fechaNac", $fechaNac);
                    $st->bindParam("name", $name, PDO::PARAM_STR);
                    $st->bindParam("rol", $rol, PDO::PARAM_STR);
                    $st->bindParam("telefono", $telefono, PDO::PARAM_STR);
                    $st->bindParam("direccion", $direccion, PDO::PARAM_STR);
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT, array("cost"=>10));
                    $st->bindParam("password", $passwordHash);

                    $st->execute();
                    $userid = $db->lastInsertId();
                    $db = null;
                    session_start();
                    $_SESSION['userid'] = $userid;
                    $_SESSION['rol'] = $rol;
                    return true;
                }
            }catch(PDOException $e){
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            }
        }

        public function userLogin($useroremail, $password){
            try{
                $modelo = new Conexion();
                $db = $modelo->get_conexion();
                $st = $db->prepare("SELECT * FROM user WHERE (user = :useroremail or email = :useroremail)");
                $st->bindParam("useroremail", $useroremail, PDO::PARAM_STR);
                $st->execute();

                $count = $st->rowCount();
                $data = $st->fetch();
                $db = null;

                if($count){
                    if(password_verify($password, $data['password'])){
                        $_SESSION['userid'] = $data['user'];
                        $_SESSION['rol'] = $data['rol'];
                        return true;
                    }
                }else{
                    return false;
                }
            }catch(PDOException $e){
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            }
        }
    }