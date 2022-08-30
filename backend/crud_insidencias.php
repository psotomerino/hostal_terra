<?php
require_once 'conexion.php';

function get_insidencias(){
    $mysqli = getConn();
    $query ="SELECT 
            usuarios_ps.Id_usuariops, 
            usuarios_ps.Nombres, 
            usuarios_ps.Apellidos, 
            departamentos.nom_departamente, 
            insidencias.fecha_ini, 
            insidencias.descrip, 
            insidencias.foto_in, 
            insidencias.status,
            insidencias.fecha_ruta,
            insidencias.descrip_ruta,
            insidencias.depart_ruta,
            insidencias.prioridad     
            FROM `insidencias` 
                        INNER JOIN usuarios_ps ON usuarios_ps.Id_usuariops = insidencias.id_usuariops 
                        INNER JOIN departamentos ON departamentos.id_departamentos = insidencias.id_departamentos";
    $resultado = mysqli_query($mysqli,$query);
        $json = array();
    while ($fila =  mysqli_fetch_array($resultado)){
        $json[]=array (
        'id_usuariops' =>$fila['Id_usuariops'],
        'Nombres' =>$fila['Nombres'],
        'Apellidos' =>$fila['Apellidos'], 
        'depart' =>$fila['nom_departamente'],   
        'fecha_ini' => $fila['fecha_ini'],
        'descrip'=> $fila['descrip'],
        'foto_in' => $fila['foto_in'],
        'status' => $fila['status'],
        'fecha_ruta' => $fila['fecha_ruta'],
        'descrip_ruta' => $fila['descrip_ruta'],
        'depart_ruta' => $fila['depart_ruta'],
        'prioridad' => $fila['prioridad']        
        );
    }
    $jsonstring = json_encode($json);   
    return $jsonstring;
}
echo get_insidencias();