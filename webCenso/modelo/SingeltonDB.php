<?php
class SingeltonDB {
    ##USANDO SINGELTON SE CREA LA INSTANCIA PARA LA BASE DE DATOS
    private static $instance;
    private $db;

    private function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_censo', 'root', '');
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new SingeltonDB();
        }
        return self::$instance;
    }

    public function getDB() {
        return $this->db;
    }
    ##Con este modelo Singleton, podemos crear instancias de la clase Modelo y acceder a su objeto PDO con el método getDB() de la siguiente manera:
    #$modelo = SingeltonDB::getInstance();
    #$stmt = $SingeltonDB->getDB();


}

?>