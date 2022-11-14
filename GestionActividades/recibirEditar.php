<?php
require_once('../Interfaz/ConsumirApis.php');


    if($_REQUEST['rs'] == "si"){
        $valorRes = "23:59";
    }else{
        $valorRes = $_REQUEST['horaR'];
    }   
    
    if(array_key_exists('titulo', $_POST)  && array_key_exists('fecha', $_POST) &&
        array_key_exists('hora', $_POST)  && array_key_exists('ubicacion', $_POST) &&
        array_key_exists('email', $_POST) && array_key_exists('tiposA', $_POST) && $_REQUEST['tiposA'] != 0){
            
            $data_array =  array(
                "id" => $_REQUEST['id'],
                "titulo" => $_REQUEST['titulo'],
                "fecha"  => $_REQUEST['fecha'],
                "hora"   => $_REQUEST['hora'],
                "ubicacion"   => $_REQUEST['ubicacion'],
                "email"   => $_REQUEST['email'],
                "repetirAct"   => $valorRes,
                "nombreAct"   => $_REQUEST['tiposA']
            );

        $obj_editarAct = new ConsumirApi();
        $editarActividad = $obj_editarAct->editarActividades(json_encode($data_array));

        if($editarActividad > 0){
        //Se ingresó correctamente
            print("<script> alert('Se Actualizó correctamente'); </script>");
            //Reedirecciona hacia la página principal de gestión de actividades
            print("<script type='text/javascript'> window.location.href = 'ProyectPrincipal.php'; </script>");
        }else{
            //No se ingresó correctamente
            print("<script> alert('Revisar Campos'); </script>");
            print("<script type='text/javascript'> window.location.href = 'Editar.php'; </script>");
        }
    }else{
        print("<script> alert('Error en la actualización de campos, inténtelo de nuevo (Verificar el tipo de Actividad)'); </script>");
        print("<script type='text/javascript'> window.location.href = 'ProyectPrincipal.php' </script>");
    }

?>