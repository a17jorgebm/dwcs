<?php

define('__base_datos__','donacion');

function novaConexion(){
    try{
        $con=new PDO('mysql:host=db;dbname='.__base_datos__,'root','test');
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $con;
    }catch(PDOException $e){
        if ($e->getCode()==1049){
            if (creacionBd()){
                novaConexion();
            }
        }
        die();
    }
}

function creacionBd(){
    try {
        $con=new PDO('mysql:host=db','root','test');
        $sql="create database if not exists donacion; ";
        $sql.="use donacion; ";
        $sql.="create table if not exists donantes(
                id int primary key auto_increment not null,
                nombre varchar(250) not null,
                apellidos varchar(250) not null,
                edad int not null,
                grupo_sanguineo enum('O-','O+','A-','A+','B-','B+','AB-','AB+') not null,
                cp int CHECK(cp between 10000 and 99999) not null,
                tlf int CHECK(tlf between 100000000 and 999999999) not null
                );

                create table if not exists donaciones(
                    donante int not null,
                    fecha_donacion date,
                    fecha_proxima_donacion date,
                    PRIMARY KEY (donante,fecha_donacion),
                    FOREIGN KEY (donante) REFERENCES donantes(id) ON DELETE CASCADE ON UPDATE CASCADE
                );
                
                create table if not exists administradores(
                    nombre varchar(50) not null primary key,
                    contrasena varchar(200) not null
                );";
        $con->exec($sql);
        return true;
    }catch (PDOException $e){
        return false;
    }
}