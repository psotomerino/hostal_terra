jQuery(document).ready(function(){
    $('.contenedor').hide();
    $('#perfil_Admin').hide();
    $('#table_proceso').hide();
    $('#table_inicio').hide();
    var id_usu =$('#id_usu_').text();
    $('#id_usuario').val(id_usu);
    
   

    $(document).on('click','#btn_inci',function(){
        //lista_insidencias();
        $('.contenedor').show();        
        $('#home').hide();         
        
    }); 
    $(document).on('click','#ini_',function(){
        $('.contenedor').hide();  
        $('#perfil_Admin').hide();    
        $('#home').show(); 
        
    });

    $(document).on('click','#btn_insi',function(){
        $('.contenedor').hide();
        $('#perfil_Admin').show();  
        $('#home').hide();  
       
        
    });

    $('#status_R').on('change', function(){
        var status_R = $('#status_R').val();       
        crud_inci(status_R);    
    });

// INSERTA NUEVA INCIDENCIA

$(document).on('click','#envio_inci_soporte',function (e){    
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
           $('.contenedor').hide();            
           $('#perfil_Admin').hide(); 
           $('#home').show();      
           //lista_insidencias();
           }

       });
});

//** CRUD INCIDENCIAS */   

function crud_inci(status_R){  
    //alert (status_R);
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
        $('#lista_insi').html("<td></td> "); 
     }       
    var template_1='';
    var template_2='';
    listas.forEach(lista =>{
            var mi_estatus  = lista.status;
            if (mi_estatus == "Inicio"){
                $('#table_inicio').show();
                $('#table_proceso').hide();
                template_1+= `
                <tr elmentoid="${lista.id_inci}">                    
                    <td>${lista.depart}</td>
                    <td>${lista.fecha_ini}</td>
                    <td id="this_descrip_">${lista.descrip}</td>
                    <td><img  src="../../backend/img_insi/${lista.foto_in}" id="img_in" alt="" onerror="this.src='../../imagenes/sin_imagen.jpg'";></td>
                    <td>${lista.status}</td>
                    <td><button type="button" id="btn_enruta" class="btn btn-primary" data-bs-toggle="" data-bs-target="#staticBackdrop">Enrutar</button> </td>                   
                </tr>`;
                $('#lista_inicio').html(template_1);
            }
            if (mi_estatus == "Proceso"){
                $('#table_inicio').hide();
                $('#table_proceso').show();
                template_2+= `
                <tr elmentoid="${lista.id_inci}">                    
                    <td>${lista.depart}</td>
                    <td>${lista.fecha_ini}</td>
                    <td id="this_descrip_">${lista.descrip}</td>
                    <td><img  src="../../backend/img_insi/${lista.foto_in}" id="img_in" alt="" onerror="this.src='../../imagenes/sin_imagen.jpg'";></td>
                    <td>${lista.status}</td>
                    <td><button type="button" id="btn_enruta" class="btn btn-primary" data-bs-toggle="" data-bs-target="#staticBackdrop">Enrutar</button> </td>                   
                </tr>`;
                $('#lista_proceso').html(template_2);
            }
            });

    })
    .fail(function(){
      alert('Hubo un errror al cargar las insidencias');
    });    

}
//** BOTON DE RUTA */
$(document).on('click','#btn_enruta',function(){
    
    let elemento = $(this)[0].parentElement.parentElement;
    let id_de_inci = $(elemento).attr('elmentoid');
    //alert (id_de_inci);
    $('#staticBackdrop').modal('show');
    $('#id_inci').val(id_de_inci);
    var descript = $('#this_descrip_').text();
    //alert (descript);
    $('#descrip_').text(descript);
    /*$('#aside_left').hide();
    $('#cuerpo').show();*/ 
        
});


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
            R_form_ruta[0].reset();
            //lista_insidencias();
            
            }

        }); 

}) 

/** FIN DE TODO */    
})