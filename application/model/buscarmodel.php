<?php

class BuscarModel
{

    public static function getCentro()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Centros";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }
    
    public static function getActividad()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Actividades";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function getAlumno()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Alumnos";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }  

   

}

