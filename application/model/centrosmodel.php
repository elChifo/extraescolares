<?php

class CentrosModel
{
    public static function getCentro()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Centros";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function getIdCentro($id) {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        if($id == 0){
            return false;
        }
        $ssql = "SELECT * FROM Centros WHERE idCentro = :id";
        $query = $conn->prepare($ssql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();

    }

    public static function insertar($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;

        if(empty($datos['nombreCentro'])) {
            Session::add('feedback_negative', "No he recibido el Nombre del Centro");
            $errores_validacion = true;
        }
        if(empty($datos['domicilioCentro'])) {
            Session::add('feedback_negative', "No he recibido el Domicilio del Centro");
            $errores_validacion = true;
        }
        if(empty($datos['telefonoCentro'])) {
            Session::add('feedback_negative', "No he recibido el Teléfono del Centro");
            $errores_validacion = true;
        }
        if(empty($datos['contactoCentro'])) {
            Session::add('feedback_negative', "No he recibido el Contacto del Centro");
            $errores_validacion = true;
        }
        
        if($errores_validacion) {
            return false;
        }
        else {
            $params = array(
                'nombreCentro' => $_POST["nombreCentro"],
                'domicilioCentro' => $_POST["domicilioCentro"],
                'telefonoCentro' => $_POST["telefonoCentro"],
                'contactoCentro' => $_POST["contactoCentro"]
            );

            $ssql = "INSERT INTO Centros (nombreCentro, domicilioCentro, telefonoCentro, contactoCentro)
                    VALUES (:nombreCentro, :domicilioCentro, :telefonoCentro, :contactoCentro)";

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

        if(empty($datos['idCentro'])){
            Session::add('feedback_negative', 'No he recibido el Centro');
            $errores_validacion = true;
        }

        if(empty($datos['nombreCentro'])){
            Session::add('feedback_negative', "No he recibido el Nombre del Centro");
            $errores_validacion = true;
        }

        if(empty($datos['domicilioCentro'])){
            Session::add('feedback_negative', "No he recibido el Domicilio del Centro");
            $errores_validacion = true;
        }

        if(empty($datos['telefonoCentro'])){
            Session::add('feedback_negative', "No he recibido el Teléfono del Centro");
            $errores_validacion = true;
        }

        if(empty($datos['contactoCentro'])){
            Session::add('feedback_negative', "No he recibido el Contacto del Centro");
            $errores_validacion = true;
        }

    
        if($errores_validacion) {
            return false;
        } 
        else {
            $ssql = "UPDATE Centros SET nombreCentro=:nombreCentro, domicilioCentro=:domicilioCentro, 
             telefonoCentro=:telefonoCentro, contactoCentro=:contactoCentro WHERE idCentro=:id";
            $query = $conn->prepare($ssql);

            $parameters = array(
                ':nombreCentro' => $datos["nombreCentro"],
                ':domicilioCentro' => $datos["domicilioCentro"],
                ':telefonoCentro' => $datos["telefonoCentro"],
                ':contactoCentro' => $datos["contactoCentro"],
                ':id'     => $datos["idCentro"]
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

	