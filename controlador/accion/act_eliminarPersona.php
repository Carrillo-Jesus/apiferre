<?php
    
    session_start();
    
    require_once (__DIR__.'/../mdb/mdbPersona.php');
    $idpersona = $_POST['id'];
    
    $persona=eliminarPersona($idpersona);
    echo($persona);
    return $persona;

   