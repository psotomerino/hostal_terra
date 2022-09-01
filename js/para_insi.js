jQuery(document).ready(function(){  
    
    //alert ('para insidencias funciona bien ');
    //$('#descrip').ckeditor();
    $('#perfil_Admin').hide();
    var id_usu =$('#id_usu_').text();
    var nombres = $('#nombres_').text();
    var fecha_ini =$('#fecha_ini_tem').text();
    $('#id_usuario').val(id_usu);
    $('#nombre_usuario').val(nombres);
    $('#fecha_ini').val(fecha_ini);
    $('.contenedor').hide();
    $('#table_inicio').hide();
    $('#table_proceso').hide();
    
    let dep = $('#Ddepartamento').text();
    /*alert (dep);
    if (dep == ""){
        $('#table_anasafi').hide();
    }else{
        $('#table_insi').hide();
        $('#table_anasafi').show();
    }*/
    
$(document).on('click','#ini_',function(){
    $('.contenedor').hide();
    $('#perfil_Admin').hide();
    $('#home').show(); 
    
});     
$(document).on('click','#btn_misinsi',function(){
    //lista_insidencias();
    $('.contenedor').show();
    $('#perfil_Admin').hide();
    $('#home').hide();  
      
    
});    
$(document).on('click','#btn_insi',function(){
    $('.contenedor').hide();
    $('#perfil_Admin').show();  
    $('#home').hide();  
   
    
});
//********* Cargar crud segun status**********
$('#status_R').on('change', function(){
    var status_R = $('#status_R').val();
    console.log (status_R);
    crud_inci(status_R);    
})

$(document).on('click','#btn_enruta',function(){
    let elemento = $(this)[0].parentElement.parentElement;
    let id_de_inci = $(elemento).attr('elmentoid');
    //alert (id_de_usuario);
    $('#staticBackdrop').modal('show');
    $('#id_inci').val(id_de_inci);
    let descrip = $('#this_descrip').text();
    $('#descrip_').text(descrip);
    /*$('#aside_left').hide();
    $('#cuerpo').show();*/     
});
    
$(document).on('click','#envio_inci',function (e){    
     e.preventDefault(); 
    //alert ('se detuvo el envio');
    var R_form = $("#form_inci");
    for ( instance in CKEDITOR.instances )
    CKEDITOR.instances[instance].updateElement();
    var datos = new FormData($("#form_inci")[0]);                
        $.ajax({
        url: '../../backend/inserta_insi.php',
        type: 'POST',
        data: datos,
        contentType: false,
        processData: false,
            
        /*beforeSend: function(){
        document.getElementById("loading_full").style.display="block";
        document.getElementById("loading_full").innerHTML="<img id='img_lo' src='../../imagenes/loding_1.gif' width='300' height='300'>"; 
        }, */ 
        success: function(datos)
            {
            alert(datos);
            /*document.getElementById("loading_full").style.display="none";      
            alert (datos);*/
            //lista_usuarios(); 
            R_form[0].reset();
            //$('.contenedor').hide();            
            $('#perfil_Admin').hide(); 
            $('#home').show();      
            lista_insidencias();
            }

        });
});
//********* CRUD INSIDENCIAS**********

//**CRUD INCIDENCIAS SEGUN STATUS */
function crud_inci(status_R){   
    
    var status_S = status_R;
    $.ajax({
      url: '../../backend/crud_insidencias_status.php',
      data: {'status_S': status_S},
      type: 'POST',
      /*beforeSend: function(){
                    document.getElementById("loading_full").style.display="block";
                    document.getElementById("loading_full").innerHTML="<img id='img_lo' src='../../imagenes/loding_1.gif' width='300' height='300'>"; 
                }, */  
      
    })
    .done(function(listas_insidencias){
    //document.getElementById("loading_full").style.display="none";   
    //alert (listas_usuarios);   
    var i = 1;  
    var listas = JSON.parse(listas_insidencias); 
    if(listas == ""){
        alert ("No existe registro para esta petición");  
        $('#lista_inicio').html(""); 
        $('#lista_insi').html("");
     }       
    var template='';
    var template_1='';
    listas.forEach(lista =>{
            var mi_estatus  = lista.status;
            if (mi_estatus == "Inicio"){
                $('#table_inicio').show();
                $('#table_proceso').hide();
                template_1+= `
                <tr elmentoid="${lista.id_usuariops}">                    
                    <td>${lista.depart}</td>
                    <td>${lista.fecha_ini}</td>
                    <td id="this_descrip">${lista.descrip}</td>
                    <td class="ima_" data-bs-toggle="modal" data-bs-target="#exampleModal"><img  src="../../backend/img_insi/${lista.foto_in}" id="img_in" alt="" onerror="this.src='../../imagenes/sin_imagen.jpg'";></td>
                </tr>`;
                $('#lista_inicio').html(template_1);
            }else 
            {                 
                if(mi_estatus == "Proceso"){
                $('#table_inicio').hide();
                $('#table_proceso').show();
                template+= `
                <tr elmentoid="${lista.id_usuariops}">
                    <td>${lista.fecha_ini}</td>
                    <td id="this_descrip">${lista.descrip}</td>
                    <td class="ima_" data-bs-toggle="modal" data-bs-target="#exampleModal"><img  src="../../backend/img_insi/${lista.foto_in}" id="img_in" alt="" onerror="this.src='../../imagenes/sin_imagen.jpg'";></td>
                    <td>${lista.status}</td>                    
                   
                    
                </tr>`;
                $('#lista_insi').html(template);
                }
            }   
          });

    })
    .fail(function(){
      alert('Hubo un errror al cargar las insidencias');
    }); 


}
//***** ACTUALIZA RUTEO ***** 
$(document).on('click','#envio_ruta_',function (e){    
    e.preventDefault(); 
    //alert ('se detuvo el envio de ruta');
    var R_form_ruta = $("#form_ruteo");
    for ( instance in CKEDITOR.instances )
    CKEDITOR.instances[instance].updateElement();
    var datos = new FormData($("#form_ruteo")[0]);                
        $.ajax({
        url: '../../backend/ruteo.php',
        type: 'POST',
        data: datos,
        contentType: false,
        processData: false,
        /*beforeSend: function(){
        document.getElementById("loading_full").style.display="block";
        document.getElementById("loading_full").innerHTML="<img id='img_lo' src='../../imagenes/loding_1.gif' width='300' height='300'>"; 
        }, */ 
        success: function(datos)
            {
            alert(datos);
            /*document.getElementById("loading_full").style.display="none";      
            alert (datos);*/
            $('#staticBackdrop').modal('hide');
            lista_insidencias();
            
            }

        }); 

}) 
$(document).on('click','#img_in',function(){
    // var foto_inci = $('.ima_').html();
    src= $(this).attr('src');    
    //alert (src);  
    $('.modal-body').html("<img src=" + src +" class='modal-imag'>" );  
}); 
   

   
//******FIN DE TODO *******    
});
