<?php

class ReservasController{
    public static function getReservas(){
        $db=Flight::dbTarea();
        //podría hacer un join con las otras tablas y mostrar todos los datos pero no me pareció lo mas adecuado
        $consulta=$db->prepare("select * from reservas");
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $datos=$consulta->fetchAll();
        return Flight::json($datos);
    }

    public static function getReserva($id){
        $db=Flight::dbTarea();
        //podría hacer un join con las otras tablas y mostrar todos los datos pero no me pareció lo mas adecuado
        $consulta=$db->prepare('select * from reservas where id=:id');
        $consulta->execute(array('id'=>$id));
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $datos=$consulta->fetchAll();
        return Flight::json($datos);
    }

    public static function nuevaReserva(){
        $idCliente=Flight::request()->data->idCliente ?? null;
        $idHotel=Flight::request()->data->idHotel ?? null;
        $fechaReserva=new DateTime();
        $fechaEntrada=Flight::request()->data->fechaEntrada ?? null;
        $fechaSalida=Flight::request()->data->fechaSalida ?? null;

        if(!camposObligatoriosCompletados(array($idCliente,$idHotel,$fechaEntrada))){
            return mensajeErrorParametrosInvalidos("Parametros insuficientes");
        }
        
        //se comprueba el cliente
        if(is_null($idCliente) || !is_numeric($idCliente)){
            return mensajeErrorParametrosInvalidos('Se debe proporcionar un id de cliente válido');
        }
        $consultaCheckCliente=Flight::dbTarea()->prepare("select * from clientes where id=:id");
        $consultaCheckCliente->execute(array("id"=>$idCliente));
        if(count($consultaCheckCliente->fetchAll())<1){
            return Flight::halt(404,"Cliente con id $idCliente no encontrado");
        }
        //se comprueba el hotel
        if(is_null($idHotel) || !is_numeric($idHotel)){
            return mensajeErrorParametrosInvalidos('Se debe proporcionar un id de hotel válido');
        }
        $consultaCheckHotel=Flight::dbTarea()->prepare("select * from hoteles where id=:id");
        $consultaCheckHotel->execute(array("id"=>$idHotel));
        if(count($consultaCheckHotel->fetchAll())<1){
            return Flight::halt(404,"Hotel con id $idHotel no encontrado");
        }

        $objetoFechaEntrada=DateTime::createFromFormat('Y-m-d',$fechaEntrada);
        if(!$objetoFechaEntrada){
            return mensajeErrorParametrosInvalidos('La fecha de entrada no tiene un formato válido(Y-m-d)');
        }
        //2. se comprueba que la fecha de salida no es menor que la de entrada
        if($fechaSalida!=null){
            $objetoFechaSalida=DateTime::createFromFormat('Y-m-d',$fechaSalida);
            if(!$objetoFechaSalida){
                return mensajeErrorParametrosInvalidos('La fecha de salida no tiene un formato válido(Y-m-d)');
            }

            if($objetoFechaEntrada>$objetoFechaSalida){
                return mensajeErrorParametrosInvalidos('La fecha de salida no puede ser anterior a la de entrada');
            }
        }


        $db=Flight::dbTarea();
        $consulta=$db->prepare("insert into reservas(id_cliente,id_hotel,fecha_reserva,fecha_entrada,fecha_salida) 
            values(:cliente,:hotel,:fecha_reserva,:fecha_entrada,:fecha_salida)");

        $consulta->execute(array(
            "cliente"=>$idCliente,
            "hotel"=>$idHotel,
            "fecha_reserva"=>$fechaReserva->format('Y-m-d'),
            "fecha_entrada"=>$fechaEntrada,
            "fecha_salida"=>$fechaSalida
        ));

        if(!$consulta->rowCount()>0){
            return Flight::halt(500,json_encode(array("success"=>false,"message"=>"Ha ocurrido un error inesperado")));
        }

        return Flight::json(array("success"=>true,"message"=>"Nueva reserva creada correctamente"));
    }

    public static function borrarReserva(){
        $idReserva=Flight::request()->data->id ?? null;

        if(is_null($idReserva) || !is_numeric($idReserva)){
            return mensajeErrorParametrosInvalidos('Se debe proporcionar un id de reserva válido');
        }

        $db=Flight::dbTarea();
        $consulta=$db->prepare("delete from reservas where id=:id");

        $consulta->execute(array(
            "id"=>$idReserva
        ));

        if(!$consulta->rowCount()>0){
            return Flight::json(array("success"=>false,"message"=>"No se ha encontrado la reserva indicada"));
        }

        return Flight::json(array("success"=>true,"message"=>"Se ha borrado la reserva con id $idReserva"));
    }


    public static function actualizarReserva(){
        $idReserva=Flight::request()->data->id ?? null;

        if(is_null($idReserva) || !is_numeric($idReserva)){
            return mensajeErrorParametrosInvalidos('Se debe proporcionar un id de reserva válido');
        }

        $consultaCheckReserva=Flight::dbTarea()->prepare("select * from reservas where id=:id");
        $consultaCheckReserva->execute(array("id"=>$idReserva));
        if(count($consultaCheckReserva->fetchAll())<1){
            return Flight::halt(404,"Reserva con id $idReserva no encontrada");
        }

        $fechaEntrada=Flight::request()->data->fechaEntrada ?? null;
        $fechaSalida=Flight::request()->data->fechaSalida ?? null;

        //en este caso pido ambos campos, ya que me parece más lógico que se vuelvan a meter ambas fechas y ademas se reduce la complejidad
        if(!camposObligatoriosCompletados(array($fechaEntrada,$fechaSalida))){
            return mensajeErrorParametrosInvalidos("Parámetros insuficientes, se debe indicar la fecha de entrada y salida");
        }

        $objetoFechaEntrada=DateTime::createFromFormat('Y-m-d',$fechaEntrada);
        if(!$objetoFechaEntrada){
            return mensajeErrorParametrosInvalidos('La fecha de entrada no tiene un formato válido(Y-m-d)');
        }
        //2. se comprueba que la fecha de salida no es menor que la de entrada
        if($fechaSalida!=null){
            $objetoFechaSalida=DateTime::createFromFormat('Y-m-d',$fechaSalida);
            if(!$objetoFechaSalida){
                return mensajeErrorParametrosInvalidos('La fecha de salida no tiene un formato válido(Y-m-d)');
            }

            if($objetoFechaEntrada>$objetoFechaSalida){
                return mensajeErrorParametrosInvalidos('La fecha de salida no puede ser anterior a la de entrada');
            }
        }
    
        $sentenciaUpdate="update reservas set fecha_entrada=:entrada,fecha_salida=:salida where id=:id";

        $consulta=Flight::dbTarea()->prepare($sentenciaUpdate);

        $consulta->execute([
            "entrada"=>$fechaEntrada,
            "salida"=>$fechaSalida,
            "id"=>$idReserva
        ]);

        return Flight::json(array("success"=>true,"message"=>"Reserva modificada correctamente"));
    }
}