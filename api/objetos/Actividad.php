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
    }//falta aquí
    public function registrarAct($titulo, $fecha, $hora, $ubicacion, $email, $repetir, $tipoAct){
        $instruccion = "CALL registratAct('".$titulo."','".$fecha."','".$hora."','".$ubicacion."','".$email."','".$repetir."','".$tipoAct."')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta;

        if(!$resultado){
            print("<script> alert('Fallo al consultar las actividades'); </script>");
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }//falta aquí
    public function editarAct($id, $titulo, $fecha, $hora, $ubicacion, $email, $repetir, $tipoAct){
        $instruccion = "CALL editartAct(".$id.",'".$titulo."','".$fecha."','".$hora."','".$ubicacion."','".$email."','".$repetir."','".$tipoAct."')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta;

        if(!$resultado){
            print("<script> alert('Fallo al consultar las actividades'); </script>");
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }//falta aquí
    public function eliminarAct($idAct){
        $instruccion = "CALL eliminartAct(".$idAct.")";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta;

        if(!$resultado){
            print("<script> alert('Fallo al consultar las actividades'); </script>");
        }else{
            return $resultado;
            $resultado->close();
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