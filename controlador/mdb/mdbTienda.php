<?php
require_once(__DIR__."/../../modelo/dao/TiendaDAO.php");

function registrarTinda($tienda){
    
    $dao=new TiendaDAO();

    $result = $dao->registrarTinda($tienda);

    return $result;
}
function vertiendas(){

     
    $dao=new TiendaDAO();

    $result = $dao->vertiendas();

    return $result;
}

function eliminarTienda($idtienda){

    $dao=new TiendaDAO();

    $dao->eliminarTienda($idtienda);

}

function editartienda($nombre, $id){

    $dao=new TiendaDAO();

    $tienda = $dao->editartienda($nombre, $id);

    return $tienda;

}