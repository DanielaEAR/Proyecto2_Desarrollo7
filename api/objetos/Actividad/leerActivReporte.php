<?php

//encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// incluir archivos de conexion y objetos
include_once '../../Conexion.php';
include_once '../Actividad.php';
// inicializar base de datos y objeto producto
$conex = new Conexion();
$db = $conex->obtenerConexion();
// inicializar objeto
$actividadReport = new Actividad($db);

// query tipo de actividades
$campo = isset($_GET['campos']) ? $_GET['campos'] : die();
$fecha = isset($_GET['fechaValor']) ? $_GET['fechaValor'] : die();
$tipoA = isset($_GET['tiposA']) ? $_GET['tiposA'] : die();

$stmt = $actividadReport->mostrar_reporte($campo, $fecha, $tipoA);
$num = $stmt->rowCount();
// verificar si hay mas de 0 registros encontrados

if($num>0){
    // arreglo de tipo de actividad
    $actividadReport_arr=array();
    $actividadReport_arr["actividad"]=array();
    // obtiene todo el contenido de la tabla
    // fetch() es mas rapido que fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extraer fila
    // esto creara de $row['nombre'] a
    // solamente $nombre
    extract($row);
    $actividadReport_item=array(
    "titulo" => $titulo,
    "fecha" => $fecha,
    "hora" => $hora,
    "ubicacion" => $ubicacion,
    "email" => $email,
    "repetirAct" => $repetirAct,
    "nombreAct" => $nombreAct
    );
    array_push($actividadReport_arr["actividad"], $actividadReport_item);
    }
    // asignar codigo de respuesta - 200 OK
    http_response_code(200);
    // mostrar productos en formato json
    echo json_encode($actividadReport_arr);
}else{
    // asignar codigo de respuesta - 404 No encontrado
    http_response_code(404);
    // informarle al usuario que no se encontraron productos
    echo json_encode(
    array("message" => "No Hay Actividades.")
    );
}

?>