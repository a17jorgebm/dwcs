<?php
require_once ('Persona.php');
class Administrador extends Persona{
    public function __construct($nombre,$apellidos){
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
    }
    public function getNombre() : String{
        return $this->nombre;
    }
    public function getApellidos() : String{
        return $this->apellidos;
    }

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellidos($apellidos){
        $this->apellidos=$apellidos;
    }

    public function accion(){
        echo "<br>Nombre: {$this->nombre}<br>";
        echo "Apellidos: {$this->apellidos}<br>";
        echo "Soy un Administrador<br>";
    }
}
