<?php

require 'flight/Flight.php';


date_default_timezone_set('Europe/Madrid');

Flight::register('dbTarea','PDO',array('mysql:host=db;dbname=classicmodels','root','test'));

//customers
Flight::route('GET /clientes',['ClientesController','getClientes']);
Flight::route('GET /clientes/@id:[0-9]+',['ClientesController','getCliente']);
Flight::route('POST /clientes',['ClientesController','nuevoCliente']);
Flight::route('DELETE /clientes',['ClientesController','borrarCliente']);
Flight::route("PUT /clientes",['ClientesController','actualizarCliente']);

Flight::start();
