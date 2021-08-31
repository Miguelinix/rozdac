<?php

    class negoClass{

        public function cargarNegocios($user){
            try{
                $rows = null;
                $modelo = new Conexion();
                $db = $modelo->get_conexion();
                $st = $db->prepare("SELECT * FROM negocio WHERE user = :user");
                $st->bindParam(":user", $user);
                $st->execute();
    
                while($result = $st->fetch()){
                    $rows[] = $result;
                }
                return $rows;
            }catch(PDOException $e){
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            }
        }

        public function cargarNegocio($negoid){
            try{
                $rows = null;
                $modelo = new Conexion();
                $db = $modelo->get_conexion();
                $st = $db->prepare("SELECT * FROM negocio WHERE Id = :negoid");
                $st->bindParam(":negoid", $negoid);
                $st->execute();
    
                while($result = $st->fetch()){
                    $rows[] = $result;
                }
                return $rows;
            }catch(PDOException $e){
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            }
        }

        public function contarNegocios($user){
            try{
                $modelo = new Conexion();
                $db = $modelo->get_conexion();
                $st = $db->prepare("SELECT * FROM negocio WHERE user = :user");
                $st->bindParam(":user", $user);
                $st->execute();
    
                $count = $st->rowCount();
                if($count < 4){
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            }
        }

        public function addNegocio($negoid, $name, $description, $mision, $vision, $user){
            try{
                $modelo = new Conexion();
                $db = $modelo->get_conexion();
                $st = $db->prepare("SELECT * FROM negocio WHERE Id = :negoid");
                $st->bindParam(":negoid", $negoid);
                $st->execute();
                $count = $st->rowCount();

                if($count < 1){
                    $stmt = $db->prepare("INSERT INTO negocio(Id, name, descripcion, mision, vision, user) VALUES (:Id, :name, :descripcion, :mision, :vision, :user)");
                    $stmt->bindParam(":Id",$negoid);
                    $stmt->bindParam(":name",$name);
                    $stmt->bindParam(":descripcion",$description);
                    $stmt->bindParam(":mision",$mision);
                    $stmt->bindParam(":vision",$vision);
                    $stmt->bindParam(":user",$user);
                    $stmt->execute();
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            }
        }

        public function fotoLogo($negoid, $photoLogo){
            try{
                $modelo = new Conexion();
                $db = $modelo->get_conexion();
                $st = $db->prepare("UPDATE negocio SET photoLogo = :photoLogo WHERE Id = :negoid");
                $st->bindParam(":photoLogo", $photoLogo);
                $st->bindParam(":negoid", $negoid);
                $st->execute();
            }catch(PDOException $e){
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            } 
        }

        public function modificarNego($campo, $valor, $negoid){
            try{
                $modelo = new Conexion();
                $db = $modelo->get_conexion();
                $st = $db->prepare("UPDATE negocio SET $campo = :valor WHERE Id = :negoid");
                $st->bindParam(":valor", $valor);
                $st->bindParam(":negoid", $negoid);
                $st->execute();
                return true;
            }catch(PDOException $e){
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            } 
        }
    }

?>