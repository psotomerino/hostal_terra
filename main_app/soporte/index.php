<link rel="stylesheet" href="../../css/site.css">
<link rel="stylesheet" href="../../css/para_index_soporte.css">
<?php

    session_start();
    if(!isset($_SESSION['usuario'])){
        header('location: https://www.hostalterra.com.ec/gestion/');
        exit();
    }

    //include '../../templates/cortina.php';
    include '../../template/header.php';    

?>
<script src="../../ckeditor/ckeditor.js"></script> 
<style>
    .ocl{
        display: none;
    }
    #fecha_ini_tem{
        display: none;
    }
    #ini_base{
        width: 100%;
        height: auto;
        background-color: cadetblue;
        padding: 3px;
    }
    .contenedor{
        align-content: center;
    }
    .sele{
        padding: 3px;
        width: 30%;
        margin-left: 10px;
        
    }
    #btn_enruta{
        display: none;

    }
    .selector{
        padding: 3px;
        width: 50%;
        background-color: rgba(145, 228, 163, 0.534);
        
        
    }

</style>
<body>
<section>
    <?php include '../menu_superior.php' ?>
    <div id="ini_base">
        <button id="ini_" class="btn btn-warning">Incio</button>    
    </div>
    
</section> 
<div class="grid-container g-0" id="home">
      <div class="grid-item" id="btn_inci" ><p><img src="../../imagenes/mis_inci.png" class="img_" alt=""></p><p>INCIDENCIAS</p></div>
      <!-- <div class="grid-item" id="btn_insi"><p><img src="../../imagenes/incidencia.png" class="img_" alt=""></p><p>NUEVA INCIDENCIA</p></div> -->
      <div class=""></div>
      <div class=""></div>
      <div class=""></div>
      <div class=""></div>
      <div class=""></div>
      <div class=""></div>
</div> 
<div class="contenedor mt-4">
<div class="sele">
        <select name="status_R" id="status_R" class ="selector"> 
            <option value="">Selecicone una opción</option>
            <option value="Inicio">Inicio</option>
            <option value="Proceso">Proceso</option>
            <option value="Finalizado">Finalizado</option>
        </select>
    </div>  
    <br> 
    <table id="table_proceso" class="table table-bordered table-hover table-striped">
       <thead class="thead-light">
           <tr>
               <th >Fecha/registro</th>
               <th >Descripción</th>
               <th >Foto</th>              
               <th >Estado</th>           
           </tr>
         
       </thead>
       <tbody id="">

       </tbody>
       
    </table>    
</div>

</body>
</html>
<script src="../../js/para_inci_soporte.js"></script>
