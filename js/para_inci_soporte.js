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
        alert (status_R);
        crud_inci(status_R);    
    })


/** FIN DE TODO */    
})