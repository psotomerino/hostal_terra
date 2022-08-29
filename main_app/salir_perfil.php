<?php
    include '../../template/header.php'; 
    session_start();
    $_SESSION=[];
    session_destroy();
    //echo ('su session ha finalizado');
    //header('location: https://yogunap.jireh.edu.ec/main_app/admin/#');
    header('location: https://www.hostalterra.com.ec/gestion/');
    

?>

