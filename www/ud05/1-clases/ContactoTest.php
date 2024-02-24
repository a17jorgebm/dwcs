<?php
namespace ud05;

use Contacto;

require 'Contacto.php';

$contacto=new Contacto('pepe','villuela',382748930);
$contacto2=new Contacto('ramon','garcía',295748392);
$contacto3=new Contacto('eva','alonso',385749300);

echo "<h3>Contacto 1</h3>";
echo "<h5>Con get-----</h5>";
echo "<p>Nombre: {$contacto->getNombre()}</p>";
echo "<p>Apellidos: {$contacto->getApellidos()}</p>";
echo "<p>Numero de teléfono: {$contacto->getNumeroTelefono()}</p>";
echo "<h5>Con muestraInformacion()-----</h5>";
$contacto->muestraInformacion();
echo "<br>";

echo "<h3>Contacto 2</h3>";
echo "<h5>Con get-----</h5>";
echo "<p>Nombre: {$contacto2->getNombre()}</p>";
echo "<p>Apellidos: {$contacto2->getApellidos()}</p>";
echo "<p>Numero de teléfono: {$contacto2->getNumeroTelefono()}</p>";
echo "<h5>Con muestraInformacion()-----</h5>";
$contacto2->muestraInformacion();
echo "<br>";

echo "<h3>Contacto 3</h3>";
echo "<h5>Con get-----</h5>";
echo "<p>Nombre: {$contacto3->getNombre()}</p>";
echo "<p>Apellidos: {$contacto3->getApellidos()}</p>";
echo "<p>Numero de teléfono: {$contacto3->getNumeroTelefono()}</p>";
echo "<h5>Con muestraInformacion()-----</h5>";
$contacto3->muestraInformacion();
echo "<br>";

echo "<h3>Destrucción de los objectos</h3>";
$contacto=null;
$contacto2=null;
$contacto3=null;

