<?php

    define("BASE_URL", "http://localhost/rozdac/");
    class Conexion{
        public function get_conexion(){
            $user = "root";
            $pass = "";
            $host = "localhost";
            $db = "rozdac";
            $conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            return $conexion;
        }
    }

?>