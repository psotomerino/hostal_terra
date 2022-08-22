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

</style> 
<body>
    <section>
    <?php include '../menu_superior.php' ?>
    <div id="ini_base">
    <button id="ini_" class="btn btn-warning">Incio</button>    
    </div>
    
    </section>
    <div class="grid-container g-0" id="home">
      <div class="grid-item" id="btn_misinsi" ><p><img src="../../imagenes/mis_inci.png" class="img_" alt=""></p><p>MIS INCIDENCIA</p></div>
      <div class="grid-item" id="btn_insi"><p><img src="../../imagenes/incidencia.png" class="img_" alt=""></p><p>NUEVA INCIDENCIA</p></div>
      <div class=""></div>
      <div class=""></div>
      <div class=""></div>
      <div class=""></div>
      <div class=""></div>
      <div class=""></div>

    </div>

   <div class="contenedor mt-4"> 
   <div>
    <select name="status_R" id="status_R">
        <option value="Inicio">Inicio</option>
        <option value="Inicio">Proceso</option>
        <option value="Inicio">Finalizado</option>
    </select>
    </div>   
    <table id="table_insi" class="table table-bordered table-hover table-striped">
       <thead class="thead-light">
           <tr>
               <th >Ord.</th>
               <th >Usuario</th>
               <th >Dept./Origen</th>
               <th >Fecha/registro</th>
               <th >Descripción</th>
               <th >Foto</th>              
               <th >Ruta</th>
               <th >Gestion</th>
           </tr>
         
       </thead>
       <tbody id="lista_insi"></tbody>
       
    </table>
    <table id="table_anasafi" class="table table-bordered table-hover table-striped">
       <thead class="thead-light">
           <tr>
               <th >Ord.</th>
               <th >Usuario</th>
               <th >Departamento / ruta</th>
    
           </tr>
         
       </thead>
       <tbody id="lista_anasafi"></tbody>
       
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
                    <textarea name="descrip" id="descrip" class="form-control " rows="10" cols="40"> 
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
                
                <button type="submit" id="envio_inci"  class="btn btn-primary w-100">Enviar inicidencia</button>
            </form>
            
        </div>
    </div> 
    </section>
    
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Ruteo de incidencias</h5>
<!--            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
          </div>
          <div class="modal-body">
          <form class="nb-5" id="form_ruteo" enctype="multipart/form-data">
            <div class="mb-4">                   
                    <input type="text" class="form-control" name="id_inci" id="id_inci">                       
            </div> 
            <div class="mb-4">
                    <label for="fecha_ini_ruta" class="form-label font-weight-bold">Fecha /ruta</label>
                    <input type="text" class="form-control" name="fecha_ini_ruta" id="fecha_ini_ruta" >                       
            </div> 
            <div class="mb-4">
                <p class="alert alert-success" id="descrip_"></p>
            </div>
            <div class="mb-4">
                    <textarea name="descrip2" id="descrip2" class="form-control " rows="10" cols="40"> 
                    </textarea>                     
            </div>
            <div class="mb-4">
                    <label for="depar_ruta" class="form-label font-weight-bold">enrutar a:</label>
                    <select  class="form-control" id="depar_ruta" required name="depar_ruta">
                                            <option value="Gerencia">Gerencia</option>
                                            <option value="Contabilidad">Contabilidad</option>
                                            <option value="Soporte">Soporte</option>
                                            <option value="Anasafi">Anasafi</option>                                             
                    </select>                      
            </div> 
            <div class="mb-4">
                    <label for="prioridad" class="form-label font-weight-bold">Prioridad</label>
                    <select  class="form-control" id="prioridad" required name="prioridad">
                                            <option value="baja">Baja</option>
                                            <option value="media">Media</option>
                                            <option value="alta">Alta</option>
                                                                                       
                    </select>                      
            </div>
            <div class="mb-4 ">
                    <label for="status_ruta" class="form-label font-weight-bold">Status</label>
                    <select  class="form-control" id="status_ruta" required name="status_ruta">
                                            <option value="Proceso">Proceso</option>
                    </select>                      
            </div>
            <button type="submit" id="envio_ruta_"  class="btn btn-success w-100">Generar ruta</button>
          </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
        </div>
      </div>
    </div>
</body>
</html>
<script src="../../js/para_insi.js"></script>
<script src="../../js/jquery.richtext.js"></script> 
<script>
   CKEDITOR.replace( 'descrip' );
   CKEDITOR.replace( 'descrip2' );
</script> 
<script>
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth() + 1;
    day = date.getDate();
    document.getElementById("fecha_ini_tem").innerHTML =year + "-" + month + "-" + day;
    document.getElementById("fecha_ini_ruta").value =year + "-" + month + "-" + day;
</script> 

 