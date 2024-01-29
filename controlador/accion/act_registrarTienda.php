<?php
require_once(__DIR__."/../mdb/mdbTienda.php");
session_start();
$categoria = $_POST['categoria'];
$nombre = $_POST['nombre'];
$id=$_SESSION['ID_USUARIO'];
$tienda= new Tienda(NULL,$nombre,$categoria,$id);
$resultado = registrarTinda($tienda);
echo($resultado);