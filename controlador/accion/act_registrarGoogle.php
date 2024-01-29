<?php
require_once('act_googleLogin.php');
require_once(__DIR__."/../mdb/mdbPersona.php");
require_once(__DIR__."/../../modelo/entidad/Persona.php");

session_start();

$persona=consultarPersonaCorreo($email);

if(!$persona){
    $user=new Persona(NULL, $name, NULL, $email, NULL, NULL,NULL,NULL);
    registrarPersonaConGoogle($user);
    $persona=consultarPersonaCorreo($email);
}
$_SESSION['ID_USUARIO'] = $persona->getIdpersona();
$_SESSION['NOMBRE_USUARIO'] = $persona->getNombre();
$_SESSION['IMAGEN'] = $persona->getImagen();

header('Location: ../../vista/registrotienda/index.php');
?>