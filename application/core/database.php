<?php
class Database
{
    private static $instancia = null;
    private $db = null;

    private function __construct(){
        $options = array(
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        try{
            $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
        } 
        catch(PDOException $e) {
            exit("No tenemos accesible la Base de Datos");
        }
    }

    public static function getInstance(){
        if(is_null(self::$instancia)){
            self::$instancia = new Database();
        }
        return self::$instancia;
    }

    public function getDatabase(){
        return $this->db;
    }

    public static function consulta($ssql, $parms, $return = true)
    {
        // creamos la conexión
        $conn = Database::getInstance()->getDatabase();
        // preparamos la consulta
        $prepare = $conn->prepare($ssql);
        // ejecutamos la consulta
        $prepare->execute($parms);
        if ($return) {
            $count = $prepare->rowCount();
            return Database::comprobarConsulta($count);
        } else {
            return $prepare->fetchAll();
        }

    }
}