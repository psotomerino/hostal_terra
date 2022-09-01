<link rel="stylesheet" href="../../css/site.css">
<link rel="stylesheet" href="../../css/para_index_anasafi.css">
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
    .selector{
        padding: 3px;
        width: 50%;
        background-color: rgba(145, 228, 163, 0.534);
    }
    #table_inicio{
        width: 90%;
        margin-left: 10px;
        
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
<div class="contenedor_Ana mt-4">
    <table id="table_inicio" class="table table-striped">
       <thead class="bg-primary">
           <tr>
               <th >Depart.</th>
               <th>Fecha de reporte</th>
               <th>Fecha ruta</th>
               <th>Solicitud</th>
               <th>Captura/pantalla</th> 
               <th>Estado</th> 
               <th>Acciones</th>  
           </tr>
         
       </thead>
       <tbody id="lista_proce"></tbody>
       
    </table>   
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Respuesta a incidencias</h5>
        </div>
        <div class="modal-body">
        <form class="nb-5" id="form_respuesta" enctype="multipart/form-data">
          <div class="mb-4">                   
                  <input type="hidden" class="form-control" name="id_inci" id="id_inci">                       
          </div> 
          <div class="mb-4">
                  <label for="fecha_ini_respu" class="form-label font-weight-bold">Fecha /respuesta</label>
                  <input type="text" class="form-control" name="fecha_ini_respu" id="fecha_ini_respu" >                       
          </div> 
          <div class="mb-4">
              <p class="alert alert-success" id="descrip_"></p>
          </div>
          <div class="mb-4">
                  <textarea name="descrip3" id="descrip3" class="form-control " rows="10" cols="40"> 
                  </textarea>                     
          </div>
          <!-- <div class="mb-4">
                  <label for="depar_ruta" class="form-label font-weight-bold">enrutar a:</label>
                  <select  class="form-control" id="depar_ruta" required name="depar_ruta">
                                          <option value="Gerencia">Gerencia</option>
                                          <option value="Contabilidad">Contabilidad</option>
                                          <option value="Soporte">Soporte</option>
                                          <option value="Anasafi">Anasafi</option>                                             
                  </select>                      
          </div>  -->
          <div class="mb-4 ocl ">
                  <label for="status_ruta" class="form-label font-weight-bold">Status</label>
                  <select  class="form-control" id="status_respu" required name="status_respu">
                                          <option value="Con_respuesta">Con_respuesta</option>
                  </select>                      
          </div>
          <button type="submit" id="envio_respu"  class="btn btn-success w-100">Enviar Respuesta</button>
        </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="cerra_modal" data-bs-dismiss="modal">Cerrar</button>
      </div>
      </div>
    </div>
  </div>

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
</body>
</html>
<script src="../..//js/para_inci_anasafi.js"></script>
<script>
    window.onload = function(){
    editor_2 = CKEDITOR.replace( 'descrip3' );
    CKFinder.setupCKEditor(editor_2,'https://www.hostalterra.com.ec/gestion/ckeditor.php/ckfinder');
         }              
            
</script> 
<script>
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth() + 1;
    day = date.getDate();    
    document.getElementById("fecha_ini_respu").value =year + "-" + month + "-" + day;
</script> 