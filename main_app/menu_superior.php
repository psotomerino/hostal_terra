<?php
    include '../../template/header.php';  
    include '../../template/conexion.php';

    session_start();    
    $id_usuario =$_SESSION['usuario']['Id_usuariops'];
    //echo $id_usuario; 

    $sql = "SELECT * FROM `usuario_departamento` 
    INNER JOIN usuarios_ps on usuarios_ps.Id_usuariops = usuario_departamento.Id_usuariops 
    INNER JOIN departamentos ON departamentos.id_departamentos = usuario_departamento.id_departamentos 
    INNER JOIN login_ps on login_ps.Id_usuariops = usuarios_ps.Id_usuariops where usuarios_ps.Id_usuariops = $id_usuario";

    if ($resultado = mysqli_query($conexion,$sql)) {

    /* obtener array asociativo */
    while ($row = mysqli_fetch_assoc($resultado)) {
        $nombres = $row["Nombres"];
        $apellidos = $row["Apellidos"];
        $perfil = $row["Tipo_usuario"];
        $departamento = $row["nom_departamente"];
    }

    /* liberar el conjunto de resultados */
    //echo $nic;    
    mysqli_free_result($resultado);
}

?> 
<link rel="stylesheet" href="../../css/para_menu_superior.css">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'> 

 <style>
    .menu_A{
        background-color:#67b97d;
        height: 50px;
        width: 100%;
        display: grid;
        grid-template-columns: 50% 50%;        
        
    }
    .text{
        color: aliceblue;
        
    }
    #menu_movil{
        width: 100%;
        background-color:#124E6B;
        padding: 0;   
    } 
    #fila_1{   
        /*color:aliceblue;*/
        font-family: inherit;
        background-color: #F3EF15 ;
    }
    #btn_0{
    text-align: center;
    padding: 20px;
    } 
    #id_usu_{
         display: none;
    } 
    #perfil{
         display: none;
    } 
     

     
</style>
<section>
    <div class="row g-0 d-flex">
        <div class="col-lg-7 menu_A">
            <div class="text"><b>USUARIO:&nbsp  </b> <span id="nombres_"> <?php echo $nombres;?>&nbsp <?php  echo $apellidos; ?></span><br>
                <b id="">DEPARTAMENTO:&nbsp</b><span id="Ddepartamento"><?php  echo $departamento; ?></span>
                <b id="perfil">Perfil:&nbsp</b><span id="id_usu_"><?php  echo $id_usuario; ?></span>
            </div>    
            <div class="col-lg-4" id="btn-salir"><a href="../salir_perfil.php"><p class="btn btn-success">TERMINAR SESSION</p></a> </div>            
        </div>  
    </div>
    <div class="enlace" id="btn_movil">
        <div id="fila_0">
            <i class="bx bx-grid-alt"></i>
            <span>MENU</span>     
        </div>
    </div>    
    <div class="row" id="fila_1">
            <div class="enlace" id="btn_cerrar_">
                <span>cerrar</span>  
            </div>
            <br>
            <div class="col-md-3 col-sm-12" id="btn_0">
                <a href="../salir_perfil.php" style="color: black; text-decoration: none;">Salir</a>          
            </div>
            <!--<div class="col-md-3 col-sm-12 " id="btn_1">
                <a href="../login/login.php">Area de Clientes</a>           
            </div>
            <div class="col-md-3 col-sm-12 " id="btn_2">
                <a href="../eden.html">Eden Virgin Lands</a>          
           </div>
            <div class="col-md-3 col-sm-12 " id="btn_2">
                <a href="../nft.html">Metaverse</a>          
           </div>-->
    </div> 
    
    
    <div class="px-lg-5"></div>
</section>
<script src="../../js/para_menu-superior.js"></script>
