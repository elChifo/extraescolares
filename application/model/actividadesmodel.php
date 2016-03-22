<?php

class ActividadesModel
{    
    public static function getActividad()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Actividades ORDER BY nombreActividad ASC";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function getIdActividad($id) {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        if($id == 0){
            return false;
        }
        $ssql = "SELECT * FROM Actividades WHERE idActividad = :id";
        $query = $conn->prepare($ssql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();

    }

    public static function getCentro()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Centros";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    } 

    public static function insertar($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;

        if(empty($datos['nombreActividad'])) {
            Session::add('feedback_negative', "No he recibido el Nombre de la Actividad");
            $errores_validacion = true;
        }
        if(empty($datos['monitor'])) {
            Session::add('feedback_negative', "No he recibido el Nombre del Monitor");
            $errores_validacion = true;
        }
        if(empty($datos['descripcion'])) {
            Session::add('feedback_negative', "No he recibido la Descripción");
            $errores_validacion = true;
        }
        if(empty($datos['idCentro'])) {
            Session::add('feedback_negative', "No he recibido el Centro");
            $errores_validacion = true;
        }

        if($errores_validacion) {
            return false;
        }
        else {
            $params = array(
                'nombreActividad' => $_POST["nombreActividad"],
                'monitor' => $_POST["monitor"],
                'descripcion' => $_POST["descripcion"],
                'idCentro' => $_POST["idCentro"]
            );

            $ssql = "INSERT INTO Actividades (nombreActividad, monitor, descripcion, idCentro)
                    VALUES (:nombreActividad, :monitor, :descripcion, :idCentro)";

            $query = $conn->prepare($ssql);
            $query->execute($params);
            $cuenta = $query->rowCount();

            if($cuenta == 1) {
                return $conn->lastInsertId();
            }
            return false;
        }
    }


    public static function editar($datos){

        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;

        if(empty($datos['idActividad'])){
            Session::add('feedback_negative', 'No he recibido la Actividad');
            $errores_validacion = true;
        }

        if(empty($datos['nombreActividad'])){
            Session::add('feedback_negative', "No he recibido el Nombre de la Actividad");
            $errores_validacion = true;
        }

        if(empty($datos['monitor'])){
            Session::add('feedback_negative', "No he recibido el Nombre del Monitor");
            $errores_validacion = true;
        }

        if(empty($datos['descripcion'])){
            Session::add('feedback_negative', "No he recibido la Descripción");
            $errores_validacion = true;
        }

        if(empty($datos['idCentro'])){
            Session::add('feedback_negative', "No he recibido el Centro");
            $errores_validacion = true;
        }

    
        if($errores_validacion) {
            return false;
        } 
        else {
            $ssql = "UPDATE Actividades SET nombreActividad=:nombreActividad, monitor=:monitor, 
             descripcion=:descripcion, idCentro=:idCentro WHERE idActividad=:id";
            $query = $conn->prepare($ssql);

            $parameters = array(
                ':nombreActividad' => $datos["nombreActividad"],
                ':monitor' => $datos["monitor"],
                ':descripcion' => $datos["descripcion"],
                ':idCentro' => $datos["idCentro"],
                ':id'     => $datos["idActividad"]
            );
            $query->execute($parameters);
            $count = $query->rowCount();
            if($count == 1){
                Session::add('feedback_positive', 'Editado con éxito, gracias!!!');
                return true;
            }
            Session::add('feedback_positive', 'Actualizadas 0 casillas');
            return false;
        }
    }











}
