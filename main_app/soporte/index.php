<link rel="stylesheet" href="../../css/site.css">
<link rel="stylesheet" href="../../css/para_index_admin.css">
<?php

    session_start();
    if(!isset($_SESSION['usuario'])){
        header('location: https://www.hostalterra.com.ec/gestion/');
        exit();
    }

    //include '../../templates/cortina.php';
    include '../../template/header.php';    

?>
<script src="../../ckeditor/ckeditor.js"></script> 
<h3>SOY SOPORTE</h3>
