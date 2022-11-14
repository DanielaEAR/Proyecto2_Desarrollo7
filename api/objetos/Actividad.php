<?php

class Actividad {
    // conexion de base de datos y tabla tipoactividad
    private $_db;

    // atributos de la clase
    private $id_actividad;
    private $fecha;
    private $hora;
    private $ubicacion;
    private $email;
    private $repetirAct;
    private $tipoAct;

    public function __construct($db){
   
        $this->_db = $db;
       
    }
    public function  mostrar_actividades(){
        $instruccion = "CALL mostrarActividades()";
        $stmt = $this->_db->prepare($instruccion);
        $stmt->execute();

        if(!$stmt){
            print("<script> alert('Fallo al consultar las actividades del día de hoy'); </script>");
        }else{
            return $stmt;
            $stmt->close();
            $this->_db->close();
        }
    }
    public function consultarTodasAct(){
        $instruccion = "CALL consultar_todas()";
        $stmt = $this->_db->prepare($instruccion);
        $stmt->execute();

        if(!$stmt){
            print("<script> alert('Fallo al consultar las actividades'); </script>");
        }else{
            return $stmt;
            $stmt->close();
            $this->_db->close();
        }
    }
    public function consultarTodo(){
        $instruccion = "CALL mostrar_todo_act()";
        $stmt = $this->_db->prepare($instruccion);
        $stmt->execute();

        if(!$stmt){
            print("<script> alert('Fallo al consultar las actividades'); </script>");
        }else{
            return $stmt;
            $stmt->close();
            $this->_db->close();
        }
    }
    public function consultarUnaAct($id){
        $instruccion = "CALL consultar_una_act(?)";
        $stmt = $this->_db->prepare($instruccion);

        // bind values
        $stmt->bindParam(1, $id);

        $stmt->execute();

        if(!$stmt){
            print("<script> alert('Fallo al consultar las actividades'); </script>");
        }else{
            return $stmt;
            $stmt->close();
            $this->_db->close();
        }
    }
    public function registrarAct($titulo, $fecha, $hora, $ubicacion, $email, $repetir, $tipoAct){

        $instruccion = "CALL registratAct(?,?,?,?,?,?,?)";
        $stmt = $this->_db->prepare($instruccion);

        // bind values
        $stmt->bindParam(1, $titulo);
        $stmt->bindParam(2, $fecha);
        $stmt->bindParam(3, $hora);
        $stmt->bindParam(4, $ubicacion);
        $stmt->bindParam(5, $email);
        $stmt->bindParam(6, $repetir);
        $stmt->bindParam(7, $tipoAct);

        $stmt->execute();

        if(!$stmt){
            print("<script> alert('Fallo al consultar la actividade'); </script>");
        }else{
            return $stmt;
            $stmt->close();
            $this->_db->close();
        }
    }
    public function editarAct($id, $titulo, $fecha, $hora, $ubicacion, $email, $repetir, $tipoAct){

        $instruccion = "CALL editartAct(?,?,?,?,?,?,?,?)";
        $stmt = $this->_db->prepare($instruccion);

        // bind values
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $titulo);
        $stmt->bindParam(3, $fecha);
        $stmt->bindParam(4, $hora);
        $stmt->bindParam(5, $ubicacion);
        $stmt->bindParam(6, $email);
        $stmt->bindParam(7, $repetir);
        $stmt->bindParam(8, $tipoAct);

        $stmt->execute();

        if(!$stmt){
            print("<script> alert('Fallo al consultar las actividades'); </script>");
        }else{
            return $stmt;
            $stmt->close();
            $this->_db->close();
        }
    }
    public function eliminarAct($idAct){
        $instruccion = "CALL eliminartAct(?)";
        $stmt = $this->_db->prepare($instruccion);

        // bind values
        $stmt->bindParam(1, $idAct);

        $stmt->execute();

        if(!$stmt){
            print("<script> alert('Fallo al consultar las actividades'); </script>");
        }else{
            return $stmt;
            $stmt->close();
            $this->_db->close();
        }
    }
    public function  mostrar_reporte($condiCampo, $valorF, $valorT){
        $instruccion = "CALL mostrarReportes(?,?,?);";
        $stmt = $this->_db->prepare($instruccion);

        // bind values
        $stmt->bindParam(1, $condiCampo);
        $stmt->bindParam(2, $valorF);
        $stmt->bindParam(3, $valorT);

        $stmt->execute();

        if(!$stmt){
            print("<script> alert('Fallo al consultar las actividades'); </script>");
        }else{
            return $stmt;
            $stmt->close();
            $this->_db->close();
        }
    }
}

?>