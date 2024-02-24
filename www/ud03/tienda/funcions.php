<?php
define('__db__','tienda');
function getConexion(){
    try{
        $con = new PDO('mysql:host=db;dbname='.__db__,'root','test');
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $con;
    }catch (PDOException $e){
        if ($e->getCode()==1049){
            if(crearBd()) return getConexion(); //si no existe la base de datos se crea
        }
        die();
    }

}

function crearUsuario(){
    $con=getConexion();
    $mensaje=[];

    try{
        $nombre=limparCampo($_POST['nome']);
        $password=limparCampo($_POST['password']);
        $apellidos=limparCampo($_POST['apellidos']);
        $edad=limparCampo($_POST['edad']);
        $provincia=limparCampo($_POST['provincia']);

        if(empty($nombre) || empty($password) || empty($apellidos) || empty($provincia) || empty($edad)){
            $mensaje[]=array('error'=>"Faltan campos por cubrir, no se ha podido crear el usuario");
            return $mensaje;
        }

        $password=password_hash($password,PASSWORD_DEFAULT);

        $sql="insert into usuarios(nombre,password,apellidos,edad,provincia) values(:nombre,:password,:apellidos,:edad,:provincia)";
        $ejecucion=$con->prepare($sql);
        $ejecucion->execute(array('nombre'=>$nombre,'password'=>$password,'apellidos'=>$apellidos,'edad'=>$edad,'provincia'=>$provincia));

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
                    password varchar(60),
                    apellidos varchar(50),
                    edad int,
                    provincia varchar(50)
            );
        ";

        $sqlTablaProductos="
            create table if not exists ".__db__.".productos(
                id int primary key auto_increment not null,
                nombre varchar(50) not null,
                descripcion varchar(100) not null,
                precio float not null,
                unidades float not null
            );
        ";

        //cambiase a tabla de productos e añadese unha nova tabla para poder insertar varias fotos
        $sqlFotos="
            create table if not exists ".__db__.".productos_fotos(
                id int primary key auto_increment not null,
                producto_id int not null,
                foto blob not null,
                foreign key(producto_id) references productos(id) on update cascade on delete cascade
            );
        ";

        $con->exec($sqlBD);
        $con->exec($sqlTabla);
        $con->exec($sqlTablaProductos);
        $con->exec($sqlFotos);
        return true;

    }catch (PDOException $e){
        return false;
    }

}

function limparCampo($campo){
    return htmlspecialchars(stripslashes(trim($campo)));
}

function comprobarCamposObligatorios(Array $campos){
    foreach ($campos as $campo){
        if (is_null($campo)) return false;
        if (empty($campo)) return false;
    }
    return true;
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

function visitas(){
    if (session_status()==PHP_SESSION_NONE){
        session_start();
    }
    if (isset($_SESSION['visitas'])){
        return ++$_SESSION['visitas'];
    }else{
        return $_SESSION['visitas']=1;
    }
}


##IDIOMAS------------
define('IDIOMAS_DISPONIBLES',[
    1=>'Castellano',
    2=>'Inglés',
    3=>'Gallego',
    4=>'Francés'
]);
define('TRADUCCIONES',[
    1=>'Bienvenido a mi página!',
    2=>'Welcome to my page!',
    3=>'Benvido a miña páxina!',
    4=>'Bienvenue sur ma page!'
]);
define('IDIOMA_DEFECTO',1);
function getIdioma(){
    if (isset($_COOKIE['idioma'])){
        return $_COOKIE['idioma'];
    }
    return IDIOMA_DEFECTO;
}

function setIdioma($idiomaId){
    if (array_key_exists($idiomaId,IDIOMAS_DISPONIBLES)){
        setcookie('idioma',$idiomaId,time()+60*60*24);
    }else{
        setcookie('idioma',IDIOMA_DEFECTO,time()+60*60*24);
    }
}

#FICHEIROS
define('MENSAJES_PRODUCTO',[
    0=>'Se ha creado el producto correctamente',
    1=>'Debe subir al menos una foto del producto',
    2=>'Ninguna de las fotos puede superar los 50MB',
    3=>'Ha ocurrido un error al subir los archivos'
]);
define('DIR_BASE_FILES','uploads/');
define('DIR_TEXTO','texto/');
define('DIR_IMG','imagen/');
define('DIR_PDF','pdf/');
define('DIR_OTROS','otros/');
function comprobarTamanho($tamanho){
    return (($tamanho/1024)/1024)<=50;
}

function saberExtension($nome){
    return pathinfo($nome,PATHINFO_EXTENSION);
}

function directorioGuardado($name){
    $extension=saberExtension($name);
    $directorio='';
    switch ($extension){
        case 'txt':
            $directorio=DIR_BASE_FILES.DIR_TEXTO;
            break;
        case 'png':
        case 'jpg':
        case 'jpeg':
        case 'gif':
            $directorio=DIR_BASE_FILES.DIR_IMG;
            break;
        case 'pdf':
            $directorio=DIR_BASE_FILES.DIR_PDF;
            break;
        default:
            $directorio=DIR_BASE_FILES.DIR_OTROS;
    }
    return $directorio;
}

//tarea 4 login
function comprobarLogin(){
    session_start();
    if (!isset($_SESSION['nombre'])){
        header('Location: login.php');
    }
}