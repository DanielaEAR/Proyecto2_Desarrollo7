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

$conex = new Conexion();
$db = $conex->obtenerConexion();

$actividadeTodaPrinc= new Actividad($db);

// query tipo de actividades
$id = isset($_GET['idAct']) ? $_GET['idAct'] : die();

$stmt = $actividadeTodaPrinc->consultarUnaAct($id);
$num = $stmt->rowCount();
// verificar si hay mas de 0 registros encontrados

if($num>0){
    // arreglo de tipo de actividad
    $actividadeTodaPrinc_arr=array();
    $actividadeTodaPrinc_arr["actividades"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    extract($row);
    $actividadeTodaPrinc_item=array(
    "titulo" => $titulo,
    "fecha" => $fecha,
    "hora" => $hora,
    "ubicacion" => $ubicacion,
    "email" => $email,
    "repetirAct" => $repetirAct,
    "nombreAct" => $nombreAct
    );
    array_push($actividadeTodaPrinc_arr["actividades"], $actividadeTodaPrinc_item);
    }
    // asignar codigo de respuesta - 200 OK
    http_response_code(200);
    // mostrar productos en formato json
    echo json_encode($actividadeTodaPrinc_arr);
}else{
    // asignar codigo de respuesta - 404 No encontrado
    http_response_code(404);
    // informarle al usuario que no se encontraron productos
    echo json_encode(
    array("message" => "No Hay Actividades que consultar.")
    );
}

?>