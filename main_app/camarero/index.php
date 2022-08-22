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
</style> 
<body>
    <section><?php include '../menu_superior.php' ?></section>
    <div class="col-lg-7"> </div>
    <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100 nb-auto">
        <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
            <h1 class="font-weight-bold mb-4">INCIDENCIAS</h1>
            <div id="fecha_ini_tem"></div>
            <form class="nb-5" id="form_inci" enctype="multipart/form-data" >
               <div class="mb-4">                   
                    <input type="hidden" class="form-control" name="id_usuario" id="id_usuario">                       
                </div> 
                <div class="mb-4 ">
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
<!--                <div class="mb-4">
                    <label for="usu" class="form-label font-weight-bold">Subir Archivo</label>
                    <input type="file" class="form-control"   accept="image/*" name="img_1">                       
                </div>-->
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
</body>
</html>
<script src="../../js/para_insi.js"></script>
<script src="../../js/jquery.richtext.js"></script> 
<script>
   CKEDITOR.replace( 'descrip' );
</script> 
<script>
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth() + 1;
    day = date.getDate();
    document.getElementById("fecha_ini_tem").innerHTML =year + "-" + month + "-" + day;
</script> 