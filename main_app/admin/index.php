<link rel="stylesheet" href="../../css/richtext.min.css">
<link rel="stylesheet" href="../../css/site.css">
<link rel="stylesheet" href="../../css/para_index_admin.css">
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
    #table_inicio{
        width: 90%;
        margin-left: 10px;
        
    }
    #table_proceso{
        width: 90%;
        margin-left: 10px;
        
    }
    .carbon-example.svelte-1ss3gv2.svelte-1ss3gv2.svelte-1ss3gv2 {        
    padding: 8px;
    background-color: #fff;
    height: 90px;
    box-sizing: border-box;
    border-radius: 6px;
    -webkit-box-align: start;
    -ms-flex-align: start;
    -webkit-align-items: flex-start;
    -moz-align-items: flex-start;
    align-items: flex-start;
    position: relative;
    margin-top: 6px;
    border: 1px solid #e3e3e3;
    z-index: 5;
    
    }
    .avatar-md {
    height: 4.5rem;
    width: 4.5rem;
    margin-bottom: 3px;
    }

    *, :after, :before {
    box-sizing: border-box; 
    }

    img[Attributes Style] {
    border-top-width: 0px;
    border-right-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    }
    .bloque{
        display: inline-block;
    }
    .svelte-1ss3gv2 {
    list-style: none;
    margin: 0!important;
    padding: 0 10px!important;
    display: grid;
    grid-gap: 6px;
    grid-template-columns: repeat(auto-fill,minmax(250px,1fr));
    font-size: 12px; 
    }

    .cuerpo{
        height: 100vh;
        width: 100%;
        background-color: #ecebea; 
        overflow: hidden
        
          
    }
    #home{
        margin-left: 30px;
    }


</style> 
<body>
    <section>
    <?php include '../menu_superior.php' ?>
    <!-- <div id="ini_base">
    <button id="ini_" class="btn btn-warning">Incio</button>    
    </div> -->
    
    </section>
    <div class="row cuerpo g-0">
    <div class="grid-container" id="home">
    <!--<div class="grid-item" id="btn_liq_mantenimiento" ><p><img src="../../imagenes/.png" class="img_" alt=""></p><p>MANTENIMIENTO</p></div>    
        <div class="grid-item" id="btn_crtl_incidencias" ><p><img src="../../imagenes/.png" class="img_" alt=""></p><p>INCIDENCIAS</p></div> 
        <div class="grid-item" id="btn_misinsi" ><p><img src="../../imagenes/mis_inci.png" class="img_" alt=""></p><p>MIS INCIDENCIAS</p></div>
        <div class="grid-item" id="btn_insi"><p><img src="../../imagenes/incidencia.png" class="img_" alt=""></p><p>NUEVA INCIDENCIA</p></div> -->

      <div class="grid-item ">
        <div class="carbon-example flex-wrapper action-menu-entry svelte-1ss3gv2"> 
            <div class="grid-container_box">
            <img src="../../imagenes/mis_inci.png" class="avatar-md iconosga "> 
            <h4 class="mt-3" style="font-size: 14px;">Liquidaci??n Mantenimiento</h4> 
            </div> 
        </div> 
      </div>

      <div class="grid-item ">
        <div class="carbon-example flex-wrapper action-menu-entry svelte-1ss3gv2"> 
            <div class="grid-container_box">
            <img src="../../imagenes/incidencia.png" class="avatar-md iconosga "> 
            <h4 class="mt-3" style="font-size: 14px;">Reporte incidencias</h4> 
            </div> 
        </div> 
      </div>

      <div class=""></div>
      <div class=""></div>
      <div class=""></div>
      <div class=""></div>

    </div>
    </div>
   <div class="contenedor mt-4"> 
   <div class="sele">
        <select name="status_R" id="status_R" class ="selector"> 
            <option value="">Selecicone una opci??n</option>
            <option value="Inicio">Inicio</option>
            <option value="Proceso">Proceso</option>
            <option value="Finalizado">Finalizado</option>
        </select>
    </div>  
    <br> 
    <table id="table_proceso" class="table table-striped">
       <thead class="bg-primary">
           <tr>
               <th >Fecha/registro</th>
               <th >Descripci??n</th>
               <th >Foto</th>              
               <th >Estado</th>
               
           </tr>
         
       </thead>
       <tbody id="lista_insi"></tbody>
       
    </table>
    <table id="table_inicio" class="table table-striped">
       <thead class="bg-primary">
           <tr>
               <th >Departamento / ruta</th>
               <th>Fecha de reporte</th>
               <th>Descripci??n</th>
               <th>Captura/pantalla</th>
               <th>Acciones</th>
           </tr>
         
       </thead>
       <tbody id="lista_inicio"></tbody>
       
    </table>  
    </div>
    <section id="perfil_Admin" >
    <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100 nb-auto">
        <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
            <h1 class="font-weight-bold mb-4">INCIDENCIAS</h1>
            <div id="fecha_ini_tem"></div>
            <form class="nb-5" id="form_inci" enctype="multipart/form-data" >
               <div class="mb-4">                   
                    <input type="hidden" class="form-control" name="id_usuario" id="id_usuario">                       
                </div> 
                <div class="mb-4">
                    <label for="departamento" class="form-label font-weight-bold">Departamento</label>
                    <select  class="form-control" id="depar" required name="depar">
                                            <option value="1">Gerencia</option>
                                            <option value="2">Contabilidad</option>
                                            <option value="3">Soporte</option>
                                            <option value="4">Anasafi</option> 
                                            <option value="4">Camarero</option>
                    </select>                      
                </div>
                <div class="mb-4 ocl">
                    <label for="fecha_ini" class="form-label font-weight-bold">Fecha de reporte</label>
                    <input type="text" class="form-control" name="fecha_ini" id="fecha_ini" >                       
                </div> 
                <div class="mb-4">
                     <textarea name="descrip" id="descrip" class="form-control " rows="10" cols="40">  <!--edito  -->
                    </textarea>                     
                </div>                               
                <div class="mb-4">
                    <label for="contra" class="form-label font-weight-bold">Tomar fotografia</label>
                    <input type="file" class="form-control" name="foto_in" id="foto_in">
                </div>
                <div class="mb-4 ocl">
                    <label for="status" class="form-label font-weight-bold">Status</label>
                    <select  class="form-control" id="status" required name="status">
                                            <option value="Inicio">Inicio</option>
                                            <option value="Proceso">Proceso</option>
                                            <option value="finalizado">Finalizado</option>                                              

                    </select>                      
                </div> 
                <img src="" alt="">
                <button type="submit" id="envio_inci"  class="btn btn-primary w-100">Enviar inicidencia</button>
            </form>
            
        </div>
    </div> 
    </section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">IMAGEN DE LA INCIDENCIA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>  
<!-- Modal editar incidencia-->  
<div class="modal fade" id="modal_inciEdit" tabindex="-1" aria-labelledby="modal_inciEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_inciEditLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    
</body>
</html>
<script src="../../ckfinder/ckfinder.js"></script>
<script src="../../js/para_insi.js"></script>
<script src="../../js/jquery.richtext.js"></script> 
<script>
//    CKEDITOR.replace( 'descrip' );
//    CKEDITOR.replace( 'descrip2' );
    window.onload = function(){
     editor = CKEDITOR.replace( 'descrip' );
     CKFinder.setupCKEditor(editor,'https://www.hostalterra.com.ec/gestion/ckeditor.php/ckfinder');    
         }              
            
</script> 
<script>
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth() + 1;
    day = date.getDate();
    document.getElementById("fecha_ini_tem").innerHTML =year + "-" + month + "-" + day;
    
</script> 

 