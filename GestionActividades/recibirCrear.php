<?php
require_once('../Interfaz/ConsumirApis.php');

    if($_REQUEST['rs'] == "si"){
        $valorRes = "23:53";
    }else{
        $valorRes = $_REQUEST['horaR'];
    }   

    if(array_key_exists('titulo', $_POST)  && array_key_exists('fecha', $_POST) &&
       array_key_exists('hora', $_POST)  && array_key_exists('ubicacion', $_POST) &&
       array_key_exists('email', $_POST) && array_key_exists('tiposA', $_POST)){
        
        $data_array =  array(
                  "titulo" => $_REQUEST['titulo'],
                  "fecha"  => $_REQUEST['fecha'],
                  "hora"   => $_REQUEST['hora'],
                  "ubicacion"   => $_REQUEST['ubicacion'],
                  "email"   => $_REQUEST['email'],
                  "repetirAct"   => $valorRes,
                  "nombreAct"   => $_REQUEST['tiposA']
                );

        $obj_act = new ConsumirApi();
/*         $registrarActividad = $obj_act->crearActividades($_REQUEST['titulo'], $_REQUEST['fecha'], $_REQUEST['hora'], $_REQUEST['ubicacion'], 
                                            $_REQUEST['email'], $valorRes, $_REQUEST['tiposA']); */
        $registrarActividad = $obj_act->crearActividades(json_encode($data_array));
        if($registrarActividad > 0){
        //Se ingresó correctamente
            print("<script> alert('Se ingresó correctamente'); </script>");
            //Reedirecciona hacia la página principal de gestión de actividades
            print("<script type='text/javascript'> window.location.href = 'ProyectPrincipal.php'; </script>");
        }else{
            //No se ingresó correctamente
            print("<script> alert('Revisar Campos'); </script>");
            print("<script type='text/javascript'> window.location.href = 'Crear.php'; </script>");
        }
    }
?>