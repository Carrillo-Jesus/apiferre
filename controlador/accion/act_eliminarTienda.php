<?php
    
    session_start();
    
    require_once (__DIR__.'/../mdb/mdbTienda.php');
    $id = $_POST['id'];
    
    $tiendaa=eliminarTienda($id);
    echo($tienda);
    return $tienda;