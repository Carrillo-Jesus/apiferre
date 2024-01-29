<?php
    
    require_once (__DIR__.'/../mdb/mdbTienda.php');
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    
    $resultado=editartienda($nombre, $id);

    echo($resultado);
