<?php
require_once (__DIR__.'/../mdb/mdbPersona.php');
session_start();

$usuario=$_SESSION['ID_USUARIO'];
$nombre_imagen=$_FILES['imagen']['name'];
$carpetadestino='../../vista/img/perfil/';

$resultado=actualizarFotoPerfil($nombre_imagen, $usuario);

move_uploaded_file($_FILES['imagen']['tmp_name'],$carpetadestino.$nombre_imagen);
$_SESSION['IMAGEN'] = $nombre_imagen;
echo($resultado);

?>