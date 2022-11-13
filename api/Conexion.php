<?php
//require_once('config.php');
    
class Conexion{
    // especificar las credenciales de base de datos
    private $host = "localhost";
    private $db_name = "agendaestudiantil";
    private $username = "root";
    private $password = "";
    protected $_db;

    public function obtenerConexion(){
        $this->_db = null;
        try{
            $this->_db = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name
                                 , $this->username, $this->password);
            $this->_db->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Error de conexion a base de datos: " . $exception->getMessage();
        }
        return $this->_db;
    }


}
?>
