<?php
    $id_usuario = $_POST['id_usuario'];
    $depar = $_POST['depar'];
    $fecha_ini =$_POST['fecha_ini'];    
    $descrip =$_POST['descrip'];
    $foto =$_FILES['foto_in']['name'];    
    $status =$_POST ['status'];
  

    $carpeta_destino = 'img_insi/'.$_FILES['foto_in']['name'];

    if (isset($_FILES['foto_in'])) {
	//move_uploaded_file($_FILES['foto_in']['tmp_name'],'img_insi/'.$_FILES['foto_in']['name']);
    move_uploaded_file($_FILES['foto_in']['tmp_name'],$carpeta_destino);    
    }    
    require ("../template/config.php");

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);
	if(mysqli_connect_errno()){
	       echo "Fallo al conectar con la BBDD";
           exit();
		};
	mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
	mysqli_set_charset($conexion, "utf8");
    //echo $fecha_ini
    //echo $foto;
    $consulta = "INSERT INTO insidencias(
                id_usuariops,
                id_departamentos,
                fecha_ini,                
                descrip,
                foto_in,
                status     
                
                )VALUES(?,?,?,?,?,?)";

    $resu =mysqli_prepare($conexion, $consulta);
    $ok = mysqli_stmt_bind_param($resu,"ssssss",
                        $id_usuario,
                        $depar,         
                        $fecha_ini,                       
                        $descrip,
                        $foto,
                        $status                      
                                
                        );
    
    $ok = mysqli_stmt_execute($resu);
   
     if($ok = false){
        echo "error en la consulta";
     }else{
        echo "Inisidencia registrada correctamente";
     }
    mysqli_stmt_close($resu);
                /*usuario,
                descrip,
                foto_in,
                status,
                ruta*/

?>