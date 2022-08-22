<?php
    $id_incidencia=$_POST["id_inci"];
    $fecha_ruta =$_POST["fecha_ini_ruta"];
    $descrip=$_POST["descrip2"];
    $depart=$_POST["depar_ruta"];
    $prioridad=$_POST["prioridad"];
    $status_ruta =$_POST["status_ruta"];


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
                fecha_ruta =    '$fecha_ruta',
                descrip_ruta =  '$descrip',
                depart_ruta =   '$depart',
                prioridad =     '$prioridad',
                status='$status_ruta' WHERE id_insi= $id_incidencia"; 
  
    $resultado = mysqli_query($conexion,$consulta);
    if(!$resultado){
        die ('Error en la consulta');
        }
	echo "tarea actualizada satisfactoriamente";


    


?>