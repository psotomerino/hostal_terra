<?php 
    require_once 'template/header.php';
   
?>
<script src="ckfinder/ckfinder.js"></script>
        <form id="form_editor">
            <textarea name="texto_" id="texto_1" rows="10" cols="80">    
                
                 
            </textarea>
            <script>
                window.onload = function(){
                    editor = CKEDITOR.replace( 'texto_1' );
                    CKFinder.setupCKEditor(editor,'https://www.hostalterra.com.ec/gestion/ckeditor.php/ckfinder');
                }
                
            </script>
            <button type="submit" class="btn btn-success" id="btn_ck">ENVIAR INFORMACIÓN </button>
            
        </form>

        