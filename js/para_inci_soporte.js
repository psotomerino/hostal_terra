jQuery(document).ready(function(){
    $('.contenedor').hide();

    $(document).on('click','#btn_inci',function(){
        //lista_insidencias();
        $('.contenedor').show();        
        $('#home').hide();         
        
    }); 
    $(document).on('click','#ini_',function(){
        $('.contenedor').hide();      
        $('#home').show(); 
        
    });
    $('#status_R').on('change', function(){
        var status_R = $('#status_R').val();
        //alert (status_R);
        crud_inci(status_R);    
    })

//** CRUD INCIDENCIAS */    
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
        $('#lista_insi').html("<td></td> "); 
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
                    <td><img style="width: 150px;" src="../../backend/img_insi/${lista.foto_in}" id="img_in" alt="No se envió ninguna imagen para esta incidencia"></td>
                    <td>${lista.status}</td>
                    <td id="ocl"><button type="button" id="btn_enruta" class="btn btn-primary" data-bs-toggle="" data-bs-target="#staticBackdrop">Enrutar</button> </td>                   
                </tr>`;
                $('#lista_inicio').html(template_1);
            }
            });

    })
    .fail(function(){
      alert('Hubo un errror al cargar las insidencias');
    });    

}

/** FIN DE TODO */    
})