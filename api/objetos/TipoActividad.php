<?php

class TipoActividad{

    private $_db;

    public function __construct($db){
    // conexion de base de datos
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