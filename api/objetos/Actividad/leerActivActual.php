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
$actividadResu = new Actividad($db);

// query tipo de actividades
$stmt = $actividadResu->mostrar_actividades();
$num = $stmt->rowCount();
// verificar si hay mas de 0 registros encontrados

if($num>0){
    // arreglo de tipo de actividad
    $actividadResu_arr=array();
    $actividadResu_arr["actividad"]=array();
    // obtiene todo el contenido de la tabla
    // fetch() es mas rapido que fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extraer fila
    // esto creara de $row['nombre'] a
    // solamente $nombre
    extract($row);
    $actividad_item=array(
    "titulo" => $titulo,
    "fecha" => $fecha,
    "hora" => $hora,
    "ubicacion" => $ubicacion,
    "email" => $email,
    "repetirAct" => $repetirAct,
    "nombreAct" => $nombreAct
    );
    array_push($actividadResu_arr["actividad"], $actividad_item);
    }
    // asignar codigo de respuesta - 200 OK
    http_response_code(200);
    // mostrar productos en formato json
    echo json_encode($actividadResu_arr);
}else{
    // asignar codigo de respuesta - 404 No encontrado
    http_response_code(404);
    // informarle al usuario que no se encontraron productos
    echo json_encode(
    array("message" => "No Hay Actividades para el día de hoy.")
    );
}

?>