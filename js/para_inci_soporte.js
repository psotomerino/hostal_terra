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


/** FIN DE TODO */    
})