<?php
define('__db__','tienda');
function getConexion(){
    try{
        $con = new PDO('mysql:host=db;dbname='.__db__,'root','test');
        return $con;
    }catch (PDOException $e){
        if ($e->getCode()==1049){
            if(crearBd()) getConexion(); //si no existe la base de datos se crea
        }
        die();
    }

}

function pillarUsuarios(){
    $con = getConexion();

    try{
        $select = "select * from usuarios where id=:id;";
        $prepare = $con->prepare($select);
        $prepare->execute(array('id'=>1));


        $prepare->setFetchMode(PDO::FETCH_ASSOC);
        $usuarios=$prepare->fetchAll();
        var_dump($usuarios);
        die();
//        $prepare->setFetchMode(PDO::FETCH_ASSOC);
//        while ($usuario = $prepare->fetch()){
//            echo "--------------------------";
//            echo $usuario['nombre'].' ';
//            echo $usuario['apellidos'].' ';
//            echo $usuario['edad'].' ';
//            echo $usuario['provincia'].' ';
//        }
    }catch (PDOException $e){
        echo "pasou algo: ".$e->getMessage();
    }
}

function insertaUsuarios(){
    $con=getConexion();

    try{
        $con->beginTransaction();
        for ($i=0;$i<100;$i++){
            $inserts="
                insert into usuarios(nombre, apellidos, edad, provincia)
                values(:nombre,:apellidos,:edad,:provincia);
            ";
            $preparao= $con->prepare($inserts);
            $rand="paco";
            $rand1=1;
            $preparao->bindParam(':nombre',$rand,PDO::PARAM_STR);
            $preparao->bindParam(':apellidos',$rand,PDO::PARAM_STR);
            $preparao->bindParam(':edad',$rand1,PDO::PARAM_INT);
            $preparao->bindParam(':provincia',$rand,PDO::PARAM_STR);

            $preparao->execute();
        }

        $con->commit();
        echo "Usuario insertados: 100";

    }catch (PDOException $e){
        $con->rollBack();
        echo "uf: ".$e->getMessage();
    }
}

function crearBd(){

//    @$con = new mysqli('db','root','test');
//
//    if($con->connect_errno){
//        echo "Eror en mysqli: ".$con->connect_error;
//        die();
//    }
//
//    $sqlBd = "
//        create database if not exists tienda;
//    ";
//
//    $con->select_db('tienda');
//    $sqlTabla="
//                create table if not exists usuarios(
//                id int auto_increment primary key,
//                nombre varchar(50),
//                apellidos varchar(50),
//                edad int,
//                provincia varchar(50)
//            );
//    ";
//    if ($con->query($sqlBd)){
//        echo "BD Creada correctamente";
//    }
//    else{
//        echo "Mal creada:".$con->error;
//        die();
//    }
//
//    if ($con->query($sqlTabla)){
//        echo "Tabla Creada correctamente";
//    }
//    else{
//        echo "Mal creada:".$con->error;
//        die();
//    }
//
//    $con->close();



    $servidor='db';
    $user='root';
    $pass='test';

    try{
        $con=new PDO("mysql:host=$servidor",$user,$pass);
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sqlBD="
            create database if not exists ".__db__.";
        ";

        $sqlTabla="
            create table if not exists ".__db__.".usuarios(
                	id int auto_increment primary key,
                    nombre varchar(50),
                    apellidos varchar(50),
                    edad int,
                    provincia varchar(50)
            );
        ";

        $con->exec($sqlBD);

        $con->exec($sqlTabla);
    }catch (PDOException $e){
        echo "error: ".$e->getMessage();
        die();
    }

    return true;
}