<?php
    $mysqli = new mysqli('localhost','hostalte','Ecuador.2016#','hostalte_master');
    if($mysqli->connect_errno):
        echo "Error al conectarse con Mysql debido al error: ".$mysqli->connect_errno;
    endif;
    //echo "conexion correcta";
?>