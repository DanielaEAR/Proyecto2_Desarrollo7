<?php

//encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// incluir archivos de conexion y objetos
include_once '../../Conexion.php';
include_once '../Actividad.php';
// inicializar base de datos y objeto producto
$conex = new Conexion();
$db = $conex->obtenerConexion();
// inicializar objeto
$actividadRepoTodo = new Actividad($db);

// query tipo de actividades
$stmt = $actividadRepoTodo->consultarTodo();
$num = $stmt->rowCount();
// verificar si hay mas de 0 registros encontrados

if($num>0){
    // arreglo de tipo de actividad
    $actividadRepoTodo_arr=array();
    $actividadRepoTodo_arr["actividades"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $actividadRepoTodo_item=array(
            "titulo" => $titulo,
            "fecha" => $fecha,
            "hora" => $hora,
            "ubicacion" => $ubicacion,
            "email" => $email,
            "repetirAct" => $repetirAct,
            "nombreAct" => $nombreAct
        );
        array_push($actividadRepoTodo_arr["actividades"], $actividadRepoTodo_item);
    }
    // asignar codigo de respuesta - 200 OK
    http_response_code(200);
    // mostrar productos en formato json
    echo json_encode($actividadRepoTodo_arr);
}else{
    // asignar codigo de respuesta - 404 No encontrado
    http_response_code(404);
    // informarle al usuario que no se encontraron productos
    echo json_encode(
    array("message" => "No Hay Actividades que consultar.")
    );
}

?>