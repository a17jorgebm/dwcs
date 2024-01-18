<?php

require('bd.php');

define('GRUPOS_SANGUINEOS',['O-','O+','A-','A+','B-','B+','AB-','AB+']);

function createDonante(){
    $con=getConexion();
    $mensaje=null;
    try {
        $nombre=getCampoFormularioLimpio('nombre');
        $apellidos=getCampoFormularioLimpio('apellidos');
        $edad= getCampoFormularioLimpio('edad');
        $grupo_sanguineo=getCampoFormularioLimpio('grupo_sanguineo');
        $cp= getCampoFormularioLimpio('cp');
        $tlf= getCampoFormularioLimpio('tlf');

        if (!checkCamposObligatorios(array($nombre,$apellidos,$edad,$grupo_sanguineo,$cp,$tlf))){
            return $mensaje=array('error'=>'No se han cubrido los campos necesarios');
        }

        if ($edad<18){
            return $mensaje=array('error'=>'El donante debe ser mayor de edad');
        }

        if (!in_array($grupo_sanguineo,GRUPOS_SANGUINEOS)){
            return $mensaje=array('error'=>'El grupo sanguineo indicado no es válido');
        }

        if ($cp<10000 || $cp > 99999){
            return $mensaje=array('error'=>'El codigo postal debe tener 5 digitos');
        }

        if (!preg_match('/^[0-9]{9}$/',$tlf)){
            return $mensaje=array('error'=>'El teléfono introducido no es válido');
        }

        $sql="insert into donantes(nombre,apellidos,edad,grupo_sanguineo,cp,tlf)
                values(:nombre,:apellidos,:edad,:grupo,:cp,:tlf)";

        $smtp=$con->prepare($sql);
        $smtp->bindParam('nombre',$nombre);
        $smtp->bindParam('apellidos',$apellidos);
        $smtp->bindParam('edad',$edad,PDO::PARAM_INT);
        $smtp->bindParam('grupo',$grupo_sanguineo);
        $smtp->bindParam('cp',$cp,PDO::PARAM_INT);
        $smtp->bindParam('tlf',$tlf,PDO::PARAM_INT);
        $smtp->execute();
        return $mensaje=array('success'=>'Se ha creado el usuario');
    }catch (PDOException $e){
        return $mensaje=array('error'=>'Ha ocurrido un error al crear el usuario.');
    }
}

function deleteDonante($id)
{
    $con=getConexion();
    $mensaje=null;
    $id=limparCampo($id);
    if (!is_numeric($id) || $id<1){
        return $mensaje=array('error'=>'El id indicado no es válido');
    }

    try{
        $sql='delete donante from donantes where id=:id';
        $consulta=$con->prepare($sql);
        $consulta->execute(array('id'=>$id));
        if ($consulta->rowCount()<1){
            return $mensaje=array('error'=>'El usuario indicado no existe');
        }
        return $mensaje=array('success'=>'Se ha borrado el usuario');
    }catch (PDOException $e){
        return $mensaje=array('error'=>'Ha ocurrido un error al intentar borrar el usuario');
    }
}