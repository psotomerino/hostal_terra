jQuery(document).ready(function(){
    
    $('#menu_movil').hide();
    $('#fila_1').hide();
    
    $(document).on('click','#btn_movil', function(){  
        $('#fila_1').show();
        $('#fila_0').hide();
    });
    
    $(document).on('click','#btn_cerrar_', function(){  
        $('#fila_1').hide();
        $('#fila_0').show();
       
    }); 
//******FIN DE TODO *******    
});