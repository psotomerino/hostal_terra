<?php
    include 'template/header.php';
    /*include '../templates/footer.html';
    include '../../global/conexion.php';*/
    session_start();
    if(isset($_SESSION['usuario'])){
		if($_SESSION['usuario']['tipo_usuario']== "Admin"){
			header('Location: main_app/admin/');            
		}else if($_SESSION['usuario']['tipo_usuario']== "Camarero"){
			header('Location: main_app/camarero/');            
		}else if($_SESSION['usuario']['tipo_usuario']== "Soporte"){
			header('Location: main_app/soporte/');
		}else if($_SESSION['usuario']['tipo_usuario']== "Anasafi"){
			header('Location: main_app/anasafi/');
		}/*else if($_SESSION['usuario']['tipo_usuario']== "curricular"){
			header('Location: /main_app/curriculares/');
		}*/
	}
    //header('location: ../../login/login.php');

?> 
    <link rel="stylesheet" href="css/para_index.css">     
    <style>
        .txt_{
            color: azure;
            text-decoration: none;
        }
    
    </style>
    <body class="bg-dark">
    <section>
        <div class="row g-0">
        <div class="col-lg-7">          
        </div>
              
        </div>
        <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100 nb-auto">
             <div class= "px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100">
                 <img src="imagenes/LogoHostales.png" alt="" class="img-fluid w-25">    
             </div>
             <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
                 <h1 class="font-weight-bold mb-4">BIENVENIDO</h1>
                 <form class="nb-5" id="formlg" >
                      <div class="mb-4">
                        <label for="usu" class="form-label font-weight-bold">Usuario</label>
                        <input type="text" class="form-control bg-dark-x border-0"  placeholder="Ingresa tu usuario" id="usu" name="usuariolg">                       
                      </div>
                      <div class="mb-4">
                        <label for="contra" class="form-label font-weight-bold">Contraseña</label>
                        <input type="password" class="form-control bg-dark-x border-0" placeholder="Ingresa tu contraseña" id="contra" name="passlg">
                      </div>
                      <button type="submit" id="IngresoLog"  class="btn btn-primary w-100">Iniciar Sesión</button>
                </form>
                <a href="https://hostalterra.com/" class="txt_" >Ir a la pagina principal </a>
             </div>
        </div>
    </section>
  </body>
</html>
<script src="js/para_login/main.js"></script>  