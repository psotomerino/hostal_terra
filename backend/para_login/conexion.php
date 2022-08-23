<?php
    $mysqli = new mysqli('','','','');
    if($mysqli->connect_errno):
        echo "Error al conectarse con Mysql debido al error: ".$mysqli->connect_errno;
    endif;
    //echo "conexion correcta";
?>