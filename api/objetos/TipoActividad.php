<?php

class TipoActividad{

    // conexion de base de datos y tabla tipoactividad
    private $_db;

    // atributos de la clase
    private $id_tipoAct;
    private $nombreAct;

    public function __construct($db){
   
        $this->_db = $db;
       
    }
    public function consultar_tiposAct(){
        $instruccion = "CALL listarTiposAct()";
        $stmt = $this->_db->prepare($instruccion);
        $stmt->execute();

        if(!$stmt){
            echo "Fallo al consultar los tipos de actividades";
        }else{
            return $stmt;
            $stmt->close();
            $this->_db->close();
        }
    }

}

?>