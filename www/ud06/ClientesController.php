<?php

require_once 'functions.php';

class ClientesController{
    public static function getClientes(){
        $db=Flight::dbTarea();
        $consulta=$db->prepare("select * from clientes");
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $datos=$consulta->fetchAll();
        return Flight::json($datos);
    }

    public static function getCliente($id){
        $db=Flight::dbTarea();
        $consulta=$db->prepare('select * from clientes where id=:id');
        $consulta->execute(array('id'=>$id));
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $datos=$consulta->fetchAll();
        return Flight::json($datos);
    }

    public static function nuevoCliente(){
        $nombre=Flight::request()->data->nombre ?? null;
        $apellidos=Flight::request()->data->apellidos ?? null;
        $edad=Flight::request()->data->edad ?? null;
        $email=Flight::request()->data->email ?? null;
        $telefono=Flight::request()->data->telefono ?? null;

        if(!camposObligatoriosCompletados(array($nombre,$apellidos))){
            return mensajeErrorParametrosInvalidos("Parametros insuficientes");
        }

        if(!is_null($email) && !emailValido($email)){
            return mensajeErrorParametrosInvalidos("Email inválido");
        }

        if(!is_null($edad) && !is_numeric($edad)){
            return mensajeErrorParametrosInvalidos("Edad inválida");
        }

        $db=Flight::dbTarea();
        $consulta=$db->prepare("insert into clientes(nombre,apellidos,edad,email,telefono) 
            values(:nombre,:apellidos,:edad,:email,:telefono)");

        $consulta->execute(array(
            "nombre"=>$nombre,
            "apellidos"=>$apellidos,
            "edad"=>$edad,
            "email"=>$email,
            "telefono"=>$telefono
        ));

        if(!$consulta->rowCount()>0){
            return Flight::halt(500,json_encode(array("success"=>false,"message"=>"Ha ocurrido un error inesperado")));
        }

        return Flight::json(array("success"=>true,"message"=>"Se ha añadido el nuevo cliente a la base de datos"));
    }

    public static function borrarCliente(){
        $idCliente=Flight::request()->data->id ?? null;

        if(is_null($idCliente) || !is_numeric($idCliente)){
            return mensajeErrorParametrosInvalidos('Se debe proporcionar un id de cliente válido');
        }

        $db=Flight::dbTarea();
        $consulta=$db->prepare("delete from clientes where id=:id");

        $consulta->execute(array(
            "id"=>$idCliente
        ));

        if(!$consulta->rowCount()>0){
            return Flight::json(array("success"=>false,"message"=>"No se ha encontrado el cliente indicado"));
        }

        return Flight::json(array("success"=>true,"message"=>"Se ha borrado el cliente con id $idCliente"));
    }

    public static function actualizarCliente(){
        $idCliente=Flight::request()->data->id ?? null;

        if(is_null($idCliente) || !is_numeric($idCliente)){
            return mensajeErrorParametrosInvalidos('Se debe proporcionar un id de cliente válido');
        }

        $consultaCheckCliente=Flight::dbTarea()->prepare("select * from clientes where id=:id");
        $consultaCheckCliente->execute(array("id"=>$idCliente));
        if(count($consultaCheckCliente->fetchAll())<1){
            return Flight::halt(404,"Cliente con id $idCliente no encontrado");
        }

        $apellidos=Flight::request()->data->apellidos ?? null;
        $edad=Flight::request()->data->edad ?? null;
        $email=Flight::request()->data->email ?? null;
        $telefono=Flight::request()->data->telefono ?? null;

        //comprobaciones y contruir la consulta
        if(is_null($apellidos) && is_null($edad) && is_null($email) && is_null($telefono)){
            return mensajeErrorParametrosInvalidos("Parámetros insuficientes, sin valores a modificar");
        }

        //de esta manera se pueden actualizar uno o mas campos de los solicitados en el ejercicio
        $camposActualizadosString=[]; //strings de cada campo para la consulta
        $valoresCamposActualizados=[]; //valor de cada campo para la consulta
        if(!is_null($apellidos)){
            if(empty($apellidos)) return mensajeErrorParametrosInvalidos("El apellido no puede estar vacío");
            $camposActualizadosString[]="apellidos=?";
            $valoresCamposActualizados[]=$apellidos;
        }

        if(!is_null($email)){
            if(!emailValido($email)) return mensajeErrorParametrosInvalidos("Email inválido");
            $camposActualizadosString[]="email=?";
            $valoresCamposActualizados[]=$email;
        }

        if(!is_null($edad)){
            if(!is_numeric($edad)) return mensajeErrorParametrosInvalidos("Edad inválida");
            $camposActualizadosString[]="edad=?";
            $valoresCamposActualizados[]=$edad;
        }

        if(!is_null($telefono)){
            $camposActualizadosString[]="telefono=?";
            $valoresCamposActualizados[]=$telefono;
        }

        $stringUpdateCampos="";
        for($i=0;$i<count($camposActualizadosString);$i++){
            $stringUpdateCampos.=$camposActualizadosString[$i];
            if($i!=(count($camposActualizadosString)-1)){
                $stringUpdateCampos.=',';
            }
        }

        $sentenciaUpdate="update clientes set $stringUpdateCampos where id=?";

        $consulta=Flight::dbTarea()->prepare($sentenciaUpdate);

        //añado el id al final de los parametros de sustitucion
        $consulta->execute(array_merge($valoresCamposActualizados,array($idCliente)));

        return Flight::json(array("success"=>true,"message"=>"Cliente modificado correctamente"));
    }
}