<?php
include('funcions.php');
session_start();

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $nombre=(isset($_POST['nome'])) ? limparCampo($_POST['nome']) : null;
    $contrasena=(isset($_POST['password'])) ? limparCampo($_POST['password']) : null;

    if (!comprobarCamposObligatorios(array($nombre,$contrasena))){
        header('Location: login.php?mensaje=0');
    }

    $con=getConexion();
    try {
        $sql='select nombre,password,apellidos,edad,provincia from usuarios 
            where nombre=:nombre limit 1';
        $preparao=$con->prepare($sql);
        $preparao->setFetchMode(PDO::FETCH_OBJ);
        $preparao->execute(['nombre'=>$nombre]);
        if ($preparao->rowCount()>0){
            $usuario=$preparao->fetchAll();
            if (password_verify($contrasena,$usuario[0]->password)){
                $_SESSION['nombre']=$usuario[0]->nombre;
                $_SESSION['apellidos']=$usuario[0]->apellidos;
                $_SESSION['edad']=$usuario[0]->edad;
                $_SESSION['provincia']=$usuario[0]->provincia;
                header('Location: index.php');
            }else{
                unset($_SESSION['nombre']);
                unset($_SESSION['apellidos']);
                unset($_SESSION['edad']);
                unset($_SESSION['provincia']);
                header('Location: login.php?mensaje=1');
            }
        }else{
            header('Location: login.php?mensaje=1');
        }
    }catch (PDOException $e){
        header('Location: login.php?mensaje=2');
    }
}else{
    http_response_code(404);
    echo('Error 404 - Pagina no encontrada');
}