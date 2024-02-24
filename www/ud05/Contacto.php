<?php

namespace ud05;
class Contacto
{
    private string $nombre;
    private string $apellidos;
    private int $numeroTelefono;

    public function __construct(string $nombre,string $apellidos,int $numeroTelefono){
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->numeroTelefono=$numeroTelefono;
    }

    public function __destruct(){
        echo "<p>Se esta destruyendo el objeto contacto con nombre: {$this->nombre}</p>";
    }

    public function muestraInformacion():void{
        echo "<p>Nombre: {$this->nombre}</p>";
        echo "<p>Apellidos: {$this->apellidos}</p>";
        echo "<p>Numero de telefono: {$this->numeroTelefono}</p>";
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function getNumeroTelefono(): int
    {
        return $this->numeroTelefono;
    }

    public function setNumeroTelefono(int $numeroTelefono): void
    {
        $this->numeroTelefono = $numeroTelefono;
    }
    
    
}