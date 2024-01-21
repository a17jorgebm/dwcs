<?php
require 'funcions.php';

//comprobamos que existen ficheros
$ficheros=($_FILES['fotos']['tmp_name'][0]!='') ? $_FILES['fotos'] : null;
if (is_null($ficheros)){
    header('Location: nuevoProducto.php?msg=1');
}

//comprobamos que ningún fichero se pase del tamaño
for ($i=0;$i<count($ficheros['size']);$i++){
    $size=$ficheros['size'][$i];
    if (!comprobarTamanho($size)){
        header('Location: nuevoProducto.php?msg=2');
    }
}

//non fago comprobación dos demais campos xa que non vexo que sexa o obxetivo do exercicio
$nombre=$_POST['nome'];
$descripcion=$_POST['descripcion'];
$precio=$_POST['precio'];
$unidades=$_POST['unidades'];

$con=getConexion();
try{
    $con->beginTransaction();

    //insertamos o producto
    $sql="insert into productos(nombre,descripcion,precio,unidades) values (:nombre,:descripcion,:precio,:unidades)";
    $preparado=$con->prepare($sql);
    $preparado->bindParam('nombre',$nombre);
    $preparado->bindParam('descripcion',$descripcion);
    $preparado->bindParam('precio',$precio,PDO::PARAM_INT);
    $preparado->bindParam('unidades',$unidades,PDO::PARAM_INT);
    $preparado->execute();

    $idProducto=$con->lastInsertId();

    //metemos as fotos
    $sql="insert into productos_fotos(producto_id,foto) values(:producto,:foto)";
    for ($i=0;$i<count($ficheros['name']);$i++){
        $blob=file_get_contents($ficheros['tmp_name'][$i]);
        $preparadoFotos=$con->prepare($sql);
        $preparadoFotos->bindParam('producto',$idProducto);
        $preparadoFotos->bindParam('foto',$blob);
        $preparadoFotos->execute();
    }

    //gardanse no servidor
    for ($i=0;$i<count($ficheros['name']);$i++){
        $directorio=directorioGuardado($ficheros['name'][$i]);
        if (!move_uploaded_file($ficheros['tmp_name'][$i],$directorio.basename($ficheros['name'][$i]))){
            throw new Exception();
        };
    }

    $con->commit();

    header('Location: nuevoProducto.php?msg=0');
}catch (Exception $e){
    $con->rollBack();
    header('Location: nuevoProducto.php?msg=3');
}



