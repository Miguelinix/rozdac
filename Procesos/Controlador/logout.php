<?php

    require_once("../Modelos/class.conexion.php");
     
    session_start();
    session_unset();

    if(empty($_SESSION['user']) && empty($_SESSION['rol'])){
        $url = BASE_URL."Index.php";
        header("location: $url");
    }