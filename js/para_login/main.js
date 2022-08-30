jQuery(document).on('submit','#formlg',function (event){
    event.preventDefault();
    //alert ('deteiene el evento del login.php') ;
  jQuery.ajax({
        url: 'backend/para_login/sesion_ini.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
            $('.botonlg').val('Validando');
            
        }
    })
    .done (function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
            
            if(respuesta.tipo == 'Admin'){
                location.href = 'main_app/admin/';
                
            }  else if(respuesta.tipo == 'Camarero' ){
                location.href = 'main_app/camarero/'; 
                
            } else if(respuesta.tipo == 'Soporte' ){
                console.log (respuesta);
                location.href = 'main_app/soporte/'; 
                
            }else if(respuesta.tipo == 'Anasafi' ){
                location.href = 'main_app/anasafi/';
                
            }/*else if(respuesta.tipo == 'curricular' ){
                location.href = 'main_app/curriculares/';                
            }
            
        }else{
            $('.error').slideDown('slow');
           setTimeout(function(){
                 $('.error').slideUp('slow');
           },3000);
           $('.botonlg').val('Iniciar Sesión');
           alert ('fallo al iniciar sesion'); */ 
        }
    })
    .fail (function(resp){
        console.log(resp.responseText);
    })
    .always(function(){
        console.log("complete");
    });
  
//FIN DE TODO    
});