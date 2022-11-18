<?php

//encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// incluir archivos de conexion y objetos
include_once '../../Conexion.php';
include_once '../TipoActividad.php';
// inicializar base de datos y objeto producto
$conex = new Conexion();
$db = $conex->obtenerConexion();
// inicializar objeto
$tipoAct = new TipoActividad($db);

// query tipo de actividades
$stmt = $tipoAct->consultar_tiposAct();
$num = $stmt->rowCount();
// verificar si hay mas de 0 registros encontrados

if($num>0){
    // arreglo de tipo de actividad
    $tipoActividad_arr=array();
    $tipoActividad_arr["tipo"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $tipoactividad_item=array(
            "id_tipoAct" => $id_tipoAct,
            "nombreAct" => $nombreAct
        );
        array_push($tipoActividad_arr["tipo"], $tipoactividad_item);

    }
    // asignar codigo de respuesta - 200 OK
    http_response_code(200);
    // mostrar productos en formato json
    echo json_encode($tipoActividad_arr);
}else{
    // asignar codigo de respuesta - 404 No encontrado
    http_response_code(404);
    // informarle al usuario que no se encontraron productos
    echo json_encode(
    array("message" => "Error al consultar los Tipos de Actividades.")
    );
}

?>