<?php

require_once 'functions.php';

class ClientesController{
    public static function getClientes(){
        $db=Flight::dbTarea();
        $consulta=$db->prepare("select * from customers");
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $datos=$consulta->fetchAll();
        return Flight::json($datos);
    }

    public static function getCliente($id){
        $db=Flight::dbTarea();
        $consulta=$db->prepare('select * from customers where customerNumber=:id');
        $consulta->execute(array('id'=>$id));
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $datos=$consulta->fetchAll();
        return Flight::json($datos);
    }

    public static function nuevoCliente(){
        $customerNumber=Flight::request()->data->customerNumber ?? null;
        $customerName=Flight::request()->data->customerName ?? null;
        $contactLastName=Flight::request()->data->contactLastName ?? null;
        $contactFirstName=Flight::request()->data->contactFirstName ?? null;
        $phone=Flight::request()->data->phone ?? null;
        $addressLine1=Flight::request()->data->addressLine1 ?? null;
        $addressLine2=Flight::request()->data->addressLine2 ?? null;
        $city=Flight::request()->data->city ?? null;
        $state=Flight::request()->data->state ?? null;
        $postalCode=Flight::request()->data->postalCode ?? null;
        $country=Flight::request()->data->country ?? null;
        $salesRepEmployeeNumber=Flight::request()->data->salesRepEmployeeNumber ?? null;
        $creditLimit=Flight::request()->data->creditLimit ?? null;

        if(!camposObligatoriosCompletados(array(
            $customerNumber,$customerName,$contactLastName,$contactFirstName,$phone,$addressLine1,$city,$country
            ))){
            return mensajeErrorParametrosInvalidos("Parametros insuficientes");
        }

        $db=Flight::dbTarea();
        $consulta=$db->prepare("insert into customers(customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) 
            values(:customerNumber, :customerName, :contactLastName, :contactFirstName, :phone, :addressLine1, :addressLine2, :city, :state, :postalCode, :country, :salesRepEmployeeNumber, :creditLimit)");

        try{
            $consulta->execute(array(
                "customerNumber"=>$customerNumber,
                "customerName"=>$customerName,
                "contactLastName"=>$contactLastName,
                "contactFirstName"=>$contactFirstName,
                "phone"=>$phone,
                "addressLine1"=>$addressLine1,
                "addressLine2"=>$addressLine2,
                "city"=>$city,
                "state"=>$state,
                "postalCode"=>$postalCode,
                "country"=>$country,
                "salesRepEmployeeNumber"=>$salesRepEmployeeNumber,
                "creditLimit"=>$creditLimit
            ));
        }catch(Exception $e){
            return Flight::halt(500,json_encode(array("success"=>false,"message"=>"Ha ocurrido un error inesperado")));
        }


        if(!$consulta->rowCount()>0){
            return Flight::halt(500,json_encode(array("success"=>false,"message"=>"Ha ocurrido un error inesperado")));
        }

        return Flight::json(array("success"=>true,"message"=>"Se ha añadido el nuevo cliente a la base de datos"));
    }

    public static function borrarCliente(){
        $customerNumber=Flight::request()->data->customerNumber ?? null;

        if(is_null($customerNumber) || !is_numeric($customerNumber)){
            return mensajeErrorParametrosInvalidos('Se debe proporcionar un id de cliente válido');
        }

        $db=Flight::dbTarea();
        $consulta=$db->prepare("delete from customers where customerNumber=:customerNumber");

        $consulta->execute(array(
            "customerNumber"=>$customerNumber
        ));

        if(!$consulta->rowCount()>0){
            return Flight::json(array("success"=>false,"message"=>"No se ha encontrado el cliente indicado"));
        }

        return Flight::json(array("success"=>true,"message"=>"Se ha borrado el cliente con id $customerNumber"));
    }

    public static function actualizarCliente(){
        $customerNumber=Flight::request()->data->customerNumber ?? null;

        if(is_null($customerNumber) || !is_numeric($customerNumber)){
            return mensajeErrorParametrosInvalidos('Se debe proporcionar un id de cliente válido');
        }

        $consultaCheckCliente=Flight::dbTarea()->prepare("select * from customers where customerNumber=:customerNumber");
        $consultaCheckCliente->execute(array("customerNumber"=>$customerNumber));
        if(count($consultaCheckCliente->fetchAll())<1){
            return Flight::halt(404,"Cliente con id $customerNumber no encontrado");
        }

        $phone=Flight::request()->data->phone ?? null;

        //comprobaciones y contruir la consulta
        if(is_null($phone)){
            return mensajeErrorParametrosInvalidos("Es obligatorio prorcionar un número de teléfono");
        }

        $consultaCheckCliente=Flight::dbTarea()->prepare("update customers set phone=:phone where customerNumber=:customerNumber");
        $consultaCheckCliente->execute(array("customerNumber"=>$customerNumber,"phone"=>$phone));

        return Flight::json(array("success"=>true,"message"=>"Se ha modificado el número de teléfono correctamente"));
    }
}