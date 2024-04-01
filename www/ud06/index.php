<?php

require 'vendor/autoload.php';
require_once 'functions.php';
require_once 'ClientesController.php';
require_once 'HotelesController.php';

Flight::register('dbTarea','PDO',array('mysql:host=db;dbname=pruebas','root','test'));

//clientes
Flight::route('GET /clientes',['ClientesController','getClientes']);
Flight::route('GET /clientes/@id:[0-9]+',['ClientesController','getCliente']);
Flight::route('POST /clientes/nuevoCliente',['ClientesController','nuevoCliente']);
Flight::route('DELETE /clientes/eliminarCliente',['ClientesController','borrarCliente']);
Flight::route("PUT /clientes/actualizarCliente",['ClientesController','actualizarCliente']);


//hoteles
Flight::route('GET /hoteles',['HotelesController','getHoteles']);
Flight::route('GET /hoteles/@id:[0-9]+',['HotelesController','getHotel']);
Flight::route('POST /hoteles/nuevoHotel',['HotelesController','nuevoHotel']);
Flight::route('DELETE /hoteles/eliminarHotel',['HotelesController','borrarHotel']);
Flight::route("PUT /hoteles/actualizarHotel",['HotelesController','actualizarHotel']);

Flight::start();
