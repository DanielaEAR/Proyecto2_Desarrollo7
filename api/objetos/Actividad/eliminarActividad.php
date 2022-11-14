<?php
// encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../Conexion.php';
include_once '../Actividad.php';

$conex = new Conexion();
$db = $conex->obtenerConexion();
// inicializar objeto
$eliminarActividad = new Actividad($db);

// obtener los datos

$idAct = json_decode(file_get_contents("php://input"));

// asignar valores de propiedad a la actividad
$stmt = $eliminarActividad -> eliminarAct($idAct->id);

if($stmt){
    // asignar codigo de respuesta - 201 creado
    http_response_code(201);
    // informar al usuario
    echo json_encode(array("message" => "La actividad ha sido eliminada."));
}else{
    // asignar codigo de respuesta - 503 servicio no disponible
    http_response_code(503);
    // informar al usuario
    echo json_encode(array("message" => "No se puede eliminar la actividad."));
}

?>