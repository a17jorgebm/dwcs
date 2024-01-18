<?php
define('__db__','tienda');
function getConexion(){
    try{
        $con = new PDO('mysql:host=db;dbname='.__db__,'root','test');
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $con;
    }catch (PDOException $e){
        if ($e->getCode()==1049){
            if(crearBd()) getConexion(); //si no existe la base de datos se crea
        }
        die();
    }

}

function crearUsuario(){
    $con=getConexion();
    $mensaje=[];

    try{
        $nombre=limparCampo($_POST['nome']);
        $apellidos=limparCampo($_POST['apellidos']);
        $edad=limparCampo($_POST['edad']);
        $provincia=limparCampo($_POST['provincia']);

        if(empty($nombre) || empty($apellidos) || empty($provincia) || empty($edad)){
            $mensaje[]=array('error'=>"Faltan campos por cubrir, no se ha podido crear el usuario");
            return $mensaje;
        }

        $sql="insert into usuarios(nombre,apellidos,edad,provincia) values(:nombre,:apellidos,:edad,:provincia)";
        $ejecucion=$con->prepare($sql);
        $ejecucion->execute(array('nombre'=>$nombre,'apellidos'=>$apellidos,'edad'=>$edad,'provincia'=>$provincia));

        $mensaje[]=array('success'=>"Se ha creado el usuario correctamente");


    }catch (PDOException $e){
        $mensaje[]=array('error'=>"Ha ocurrido un error al crear el usuario". $e->getMessage());
    }

    return $mensaje;
}

function pillarUsuarios(){
    $con = getConexion();

    try{
        $sql="select * from usuarios";
        $ejecucion=$con->prepare($sql);
        $ejecucion->setFetchMode(PDO::FETCH_ASSOC);
        $ejecucion->execute();
        return $ejecucion;
    }catch (PDOException $e){
        die();
    }
}

function getDatosUsuario($id){
    $con=getConexion();
    try{
        $sql='select id,nombre,apellidos,edad,provincia from usuarios where id=:id';
        $smtp=$con->prepare($sql);
        $smtp->setFetchMode(PDO::FETCH_ASSOC);
        $smtp->execute(array('id'=>$id));
        $datos=$smtp->fetchAll();
        return isset($datos[0]) ? $datos[0] : null;
    }catch (PDOException $e){
        return null;
    }
}

function editarUsuario(){
    $con=getConexion();
    $mensaje=[];
    try{
        $id=intval(isset($_POST['id']) ? limparCampo($_POST['id']) : null);
        $nombre=isset($_POST['nome']) ? limparCampo($_POST['nome']) : null;
        $apellidos=isset($_POST['apellidos']) ? limparCampo($_POST['apellidos']) : null;
        $edad=isset($_POST['edad']) ? limparCampo($_POST['edad']) : null;
        $provincia=isset($_POST['provincia']) ? limparCampo($_POST['provincia']) : null;

        if (is_null($nombre) || is_null($apellidos) || is_null($edad) || is_null($provincia)){
            $mensaje[]=array('error'=>'No se han completado todos los campos');
            return $mensaje;
        }

        $sql="update usuarios set nombre=:nombre,apellidos=:apellidos,edad=:edad,provincia=:provincia where id=:id";
        $smtp=$con->prepare($sql);
        $smtp->bindValue('nombre',$nombre);
        $smtp->bindValue('apellidos',$apellidos);
        $smtp->bindValue('edad',$edad,PDO::PARAM_INT);
        $smtp->bindValue('provincia',$provincia);
        $smtp->bindValue('id',$id,PDO::PARAM_INT);
        $smtp->execute();

        $mensaje[]=array('success'=>'Se ha editado el usuario correctamente');
        return $mensaje;

    }catch (PDOException $e){
        $mensaje[]=array('error'=>'Ha ocurrido un error al editar los datos de usuario');
        return $mensaje;
    }
}

function eliminarUsuario(){
    $con = getConexion();
    $mensajes=[];
    try{
        $usuario=isset($_GET['user'])?$_GET['user']:null;
        if (is_null($usuario)){
            $mensajes[]=array('error'=>'No se ha indicado el usuario a eliminar');
            return $mensajes;
        }

        $sql='delete from usuarios where id=:userId';
        $smtp=$con->prepare($sql);
        $smtp->execute(array('userId'=>$usuario));
        if ($smtp->rowCount()==1){
            $mensajes[]=array('success'=>'El usuario ha sido eliminado');
        }
        else{
            $mensajes[]=array('error'=>'El usuario no existe');
        }

    }catch (PDOException $e){
        $mensajes['error']=['error'=>"No se ha podido eliminar el usuario"];
    }

    return $mensajes;
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
        return false;
    }

    return true;
}

function limparCampo($campo){
    return htmlspecialchars(stripslashes(trim($campo)));
}

function imprimeMensajes($mensajes){
    foreach ($mensajes as $arrayMensaje){
        foreach ($arrayMensaje as $tipo=>$mensaje){
            if ($tipo=='error'){
                echo "<p style='background: red'>$mensaje</p>";
            }
            if ($tipo=='success'){
                echo "<p style='background: green'>$mensaje</p>";
            }
        }
    }
}