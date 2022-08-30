<?php
    $id_incidencia=$_POST["id_inci"];
    $fecha_respuesta =$_POST["fecha_ini_respu"];
    $respuesta=$_POST["descrip3"];    
    $status_respu =$_POST["status_respu"];


    require ("../template/config.php");
    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);
	if(mysqli_connect_errno()){
	       echo "Fallo al conectar con la BBDD";
           exit();
		};
	mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
	mysqli_set_charset($conexion, "utf8");
    //echo $id_incidencia;    

    $consulta ="UPDATE `insidencias` SET 
                fecha_respuesta =    '$fecha_respuesta',
                respuesta =  '$respuesta',                
                status='$status_respu' WHERE id_insi= $id_incidencia"; 
  
    $resultado = mysqli_query($conexion,$consulta);
    if(!$resultado){
        die ('Error en la consulta');
        }
	echo "tarea actualizada satisfactoriamente";


    


?>