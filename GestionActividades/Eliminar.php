<?php
require_once('../Interfaz/ConsumirApis.php');

        //$idActividad = $_GET['id'];
       // $idActividad = array('id'=>$_GET['id']);
       $idActividad =  array(
                            "id" => $_GET['id']
                        );
        $obj_eliminarAct = new ConsumirApi();
        $eliminar = $obj_eliminarAct->eliminarActividades(json_encode($idActividad));
        
        if($eliminar > 0){
        //Se ingresó correctamente
            print("<script> alert('La actividad se eliminó con éxito:D'); </script>");
            //Reedirecciona hacia la página principal de gestión de actividades
            print("<script type='text/javascript'> window.location.href = 'ProyectPrincipal.php'; </script>");
        }else{
            //No se ingresó correctamente
            print("<script> alert('No se pudo eliminar la actividad'); </script>");
            print("<script type='text/javascript'> window.location.href = 'ProyectPrincipal.php'; </script>");
        }
?>