<?php

class Usuario{
    private $nombre;
    private $password;
    private $apellidos;
    private $edad;
    private $provincia;

    /**
     * @param $nombre
     * @param $password
     * @param $apellidos
     * @param $edad
     * @param $provincia
     */
    public function __construct($nombre, $password, $apellidos, $edad, $provincia)
    {
        $this->nombre = $nombre;
        $this->password = $password;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
        $this->provincia = $provincia;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad): void
    {
        $this->edad = $edad;
    }

    public function getProvincia()
    {
        return $this->provincia;
    }

    public function setProvincia($provincia): void
    {
        $this->provincia = $provincia;
    }


}