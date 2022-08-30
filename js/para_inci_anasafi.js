jQuery(document).ready(function(){
    $('.contenedor_Ana').hide();    
    crud_inci();
    $(document).on('click','#btn_inci',function(){
        
        //lista_insidencias();
        $('.contenedor_Ana').show();        
        $('#home').hide();         
        
    }); 
    $(document).on('click','#ini_',function(){
        $('.contenedor_Ana').hide();      
        $('#home').show(); 
        
    });

//** CRUD INCIDENCIAS */    
function crud_inci(){     
    var status_S = "Proceso";
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
    var template='';
    var template_1='';
    listas.forEach(lista =>{
            var mi_estatus  = lista.status;
            if (mi_estatus == "Proceso"){
                $('#table_inicio').show();
                $('#table_proceso').hide();
                template_1+= `
                <tr elmentoid="${lista.id_inci}">                    
                    <td>${lista.depart}</td>
                    <td>${lista.fecha_ini}</td>
                    <td id="fecha_ruta">${lista.fecha_ruta}</td>
                    <td id="this_descrip_">${lista.descrip_ruta}</td>
                    <td><img  src="../../backend/img_insi/${lista.foto_in}" id="img_in" alt="" onerror="this.src='../../imagenes/sin_imagen.jpg'";></td>
                    <td>${lista.status}</td>
                    <td><button type="button" id="btn_respu" class="btn btn-primary" data-bs-toggle="" data-bs-target="#staticBackdrop">Respuesta</button> </td>                   
                </tr>`;
                $('#lista_proce').html(template_1);
            }
            });

    })
    .fail(function(){
      alert('Hubo un errror al cargar las insidencias');
    });    

}
//** BOTON DE RESPUESTA */
$(document).on('click','#btn_respu',function(){
    
    let elemento = $(this)[0].parentElement.parentElement;
    let id_de_inci = $(elemento).attr('elmentoid');
    //alert (id_de_inci);
    $('#staticBackdrop').modal('show');
    $('#id_inci').val(id_de_inci);
    var descript = $('#this_descrip_').text();
    //alert (descript);
    $('#descrip_').text(descript);
        
});
//***** ACTUALIZA RUTEO ***** 
$(document).on('click','#envio_respu',function (e){    
    e.preventDefault(); 
    //alert ('se detuvo el envio de ruta');
    var R_form_ruta = $("#form_respuesta");
    for ( instance in CKEDITOR.instances )
    CKEDITOR.instances[instance].updateElement();
    var datos = new FormData($("#form_respuesta")[0]);                
        $.ajax({
        url: '../../backend/respuesta.php',
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
            location.reload();
            //crud_inci();            
            }

        }); 

}) 


/** FIN DE TODO */    
});