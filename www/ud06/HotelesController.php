<?php

class HotelesController{
    public static function getHoteles(){
        $db=Flight::dbTarea();
        $consulta=$db->prepare("select * from hoteles");
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $datos=$consulta->fetchAll();
        return Flight::json($datos);
    }

    public static function getHotel($id){
        $db=Flight::dbTarea();
        $consulta=$db->prepare('select * from hoteles where id=:id');
        $consulta->execute(array('id'=>$id));
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $datos=$consulta->fetchAll();
        return Flight::json($datos);
    }

    public static function nuevoHotel(){
        $nombre=Flight::request()->data->hotel ?? null;
        $direccion=Flight::request()->data->direccion ?? null;
        $email=Flight::request()->data->email ?? null;
        $telefono=Flight::request()->data->telefono ?? null;

        if(!camposObligatoriosCompletados(array($nombre,$direccion,$email,$telefono))){
            return mensajeErrorParametrosInvalidos("Parametros insuficientes");
        }

        if(!is_null($email) && !emailValido($email)){
            return mensajeErrorParametrosInvalidos("Email inválido");
        }

        $db=Flight::dbTarea();
        $consulta=$db->prepare("insert into hoteles(hotel,direccion,telefono,email) 
            values(:nombre,:direccion,:telefono,:email)");

        $consulta->execute(array(
            "nombre"=>$nombre,
            "direccion"=>$direccion,
            "telefono"=>$telefono,
            "email"=>$email
        ));

        if(!$consulta->rowCount()>0){
            return Flight::halt(500,json_encode(array("success"=>false,"message"=>"Ha ocurrido un error inesperado")));
        }

        return Flight::json(array("success"=>true,"message"=>"Se ha añadido el nuevo hotel a la base de datos"));
    }

    public static function borrarHotel(){
        $idHotel=Flight::request()->data->id ?? null;

        if(is_null($idHotel) || !is_numeric($idHotel)){
            return mensajeErrorParametrosInvalidos('Se debe proporcionar un id de hotel válido');
        }

        $db=Flight::dbTarea();
        $consulta=$db->prepare("delete from hoteles where id=:id");

        $consulta->execute(array(
            "id"=>$idHotel
        ));

        if(!$consulta->rowCount()>0){
            return Flight::json(array("success"=>false,"message"=>"No se ha encontrado el hotel indicado"));
        }

        return Flight::json(array("success"=>true,"message"=>"Se ha borrado el hotel con id $idHotel"));
    }

    public static function actualizarHotel(){
        $idHotel=Flight::request()->data->id ?? null;

        if(is_null($idHotel) || !is_numeric($idHotel)){
            return mensajeErrorParametrosInvalidos('Se debe proporcionar un id de hotel válido');
        }

        $consultaCheckHotel=Flight::dbTarea()->prepare("select * from hoteles where id=:id");
        $consultaCheckHotel->execute(array("id"=>$idHotel));
        if(count($consultaCheckHotel->fetchAll())<1){
            return Flight::halt(404,"Hotel con id $idHotel no encontrado");
        }

        $direccion=Flight::request()->data->direccion ?? null;
        $telefono=Flight::request()->data->telefono ?? null;
        $email=Flight::request()->data->email ?? null;

        //comprobaciones y contruir la consulta
        if(is_null($direccion) && is_null($email) && is_null($telefono)){
            return mensajeErrorParametrosInvalidos("Parámetros insuficientes, sin valores a modificar");
        }

        //de esta manera se pueden actualizar uno o mas campos de los solicitados en el ejercicio
        $camposActualizadosString=[]; //strings de cada campo para la consulta
        $valoresCamposActualizados=[]; //valor de cada campo para la consulta
        if(!is_null($direccion)){
            if(empty($direccion)) return mensajeErrorParametrosInvalidos("La direccion no puede estar vacía");
            $camposActualizadosString[]="direccion=?";
            $valoresCamposActualizados[]=$direccion;
        }

        if(!is_null($email)){
            if(empty($email)) return mensajeErrorParametrosInvalidos("El email no puede estar vacío");
            if(!emailValido($email)) return mensajeErrorParametrosInvalidos("Email inválido");
            $camposActualizadosString[]="email=?";
            $valoresCamposActualizados[]=$email;
        }

        if(!is_null($telefono)){
            if(empty($telefono)) return mensajeErrorParametrosInvalidos("El telefono no puede estar vacío");
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

        $sentenciaUpdate="update hoteles set $stringUpdateCampos where id=?";

        $consulta=Flight::dbTarea()->prepare($sentenciaUpdate);

        //añado el id al final de los parametros de sustitucion
        $consulta->execute(array_merge($valoresCamposActualizados,array($idHotel)));

        return Flight::json(array("success"=>true,"message"=>"Hotel modificado correctamente"));
    }
}