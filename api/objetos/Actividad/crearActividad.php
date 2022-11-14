<?php
// encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../Conexion.php';
include_once '../Actividad.php';

$conex = new Conexion();
$db = $conex->obtenerConexion();
// inicializar objeto
$nuevaActividad = new Actividad($db);

// obtener los datos
$data = json_decode(file_get_contents("php://input"));
// asegurar que los datos no esten vacios
if(
    !empty($data->titulo) &&
    !empty($data->fecha) &&
    !empty($data->hora) &&
    !empty($data->ubicacion) &&
    !empty($data->email) &&
    !empty($data->repetirAct) &&
    !empty($data->nombreAct)  
){
// asignar valores de propiedad a la actividad
$stmt = $nuevaActividad -> registrarAct(
                                $data->titulo, $data->fecha, $data->hora, $data->ubicacion,
                                $data->email, $data->repetirAct, $data->nombreAct
                            );
    if($stmt){
        // asignar codigo de respuesta - 201 creado
        http_response_code(201);
        // informar al usuario
        echo json_encode(array("message" => "La actividad ha sido creada."));
    }
    // si no puede crear el producto, informar al usuario
    else{
        // asignar codigo de respuesta - 503 servicio no disponible
        http_response_code(503);
        // informar al usuario
        echo json_encode(array("message" => "No se puede crear la actividad."));
    }
}// informar al usuario que los datos estan incompletos
else{
    // asignar codigo de respuesta - 400 solicitud incorrecta
    http_response_code(400);
    // informar al usuario
    echo json_encode(array("message" => "No se puede crear la actividad. Los datos
    están incompletos."));
}


?>