<?php

    class productClass{

        public function registrarProduct($produid, $name, $descripcion, $precio, $negocio){
            try{
                $modelo = new Conexion();
                $db = $modelo->get_conexion();
                $st = $db->prepare("INSERT INTO productos(Id, name, descripcion, precio, negocio) VALUES(:produid, :name, :decripcion, :precio, :negocio)");
                $st->bindParam(":produid", $produid);
                $st->bindParam(":name", $name);
                $st->bindParam(":descripcion", $descripcion);
                $st->bindParam(":precio", $precio);
                $st->bindParam(":negocio", $negocio);
                $st->execute();
                return true;
            }catch(PDOException $e){
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            }
        }

    }