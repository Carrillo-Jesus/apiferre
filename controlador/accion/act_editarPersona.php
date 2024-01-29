<?php
    
    require_once (__DIR__.'/../mdb/mdbPersona.php');
    $idpersona = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    
    $persona = new Persona($idpersona, $nombre, $apellido, $correo, NULL, NULL,NULL,NULL);
    
    $resultado=editarPersona($persona);
    echo($resultado);

