<?php

class Tienda{

    public $idtienda;
    public $nombre;
    public $categoria;
    public $idpersona;

    public function __construct($idtienda, $nombre, $categoria, $idpersona)
    {
        $this->idtienda=$idtienda;
        $this->nombre=$nombre;
        $this->categoria=$categoria;
        $this->idpersona=$idpersona;
    }


    public function getIdtienda()
    {
        return $this->idtienda;
    }

    public function setIdtienda($idtienda)
    {
        $this->idtienda = $idtienda;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
            $this->categoria = $categoria;

            return $this;
    }

    public function getIdpersona()
    {
            return $this->idpersona;
    }

    public function setIdpersona($idpersona)
    {
            $this->idpersona = $idpersona;

            return $this;
    }

}