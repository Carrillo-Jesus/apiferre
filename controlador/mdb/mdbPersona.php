<?php
require_once(__DIR__."/../../modelo/dao/PersonaDAO.php");

function registrarPersona(Persona $persona){
    
    $dao=new PersonaDAO();

    $persona = $dao->registrarPersona($persona);

    return $persona;
}

function autenticarPersona($correo, $password){
    
    $dao = new PersonaDAO();

    $persona = $dao->autenticarPersona($correo, $password);

    return $persona;
}


function verPersonas(){
    $dao=new PersonaDAO();

    $personas = $dao->verPersonas();

    return $personas;
} 

function eliminarPersona($idpersonas){
    $dao=new PersonaDAO();
    $dao->eliminarPersona($idpersonas);
}

function verPersonaPorId($idpersonas){
    $dao=new PersonaDAO();
    $persona = $dao->verPersonaPorId($idpersonas);
    return $persona;
}

function editarPersona($persona){
    $dao=new PersonaDAO();
    $persona = $dao->editarPersona($persona);
    return $persona;
}

function registrarPersonaConGoogle($persona){
    $dao=new PersonaDAO();
    $persona = $dao->registrarPersonaConGoogle($persona);
}

function consultarPersonaCorreo($email){

    $dao=new PersonaDAO();
    $persona = $dao->consultarPersonaCorreo($email);
    return $persona;

}

function actualizarFotoPerfil($nombre_imagen, $usuario){

    $dao=new PersonaDAO();
    $persona = $dao->actualizarFotoPerfil($nombre_imagen, $usuario);
    return $persona;

}

function CambiarClave($idpersona,$password){
    $dao=new PersonaDAO();
    $persona = $dao->CambiarClave($idpersona,$password);
    return $persona;
}
