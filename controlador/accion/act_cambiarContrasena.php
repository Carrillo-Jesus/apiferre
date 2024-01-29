<?php
require_once (__DIR__.'/../mdb/mdbPersona.php');
    $idpersona = $_POST['id'];
    $password = $_POST['password'];
    $password= password_hash($password,PASSWORD_DEFAULT);
    $resultado=CambiarClave($idpersona,$password);

    echo($resultado);
