<?php

Class ConsumirApi{


    public function leerTipoA(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/Proyectos/Proy2/api/objetos/TipoActividad/leerTipoA.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);

        $valores = json_decode($resultado, true);

        return $valores;
        curl_close($ch);
    }
    public function leerActividadesActuales(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/Proyectos/Proy2/api/objetos/Actividad/leerActivActual.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);

        $valores = json_decode($resultado, true);

        return $valores;
        curl_close($ch);
    }
    public function leerActividadesPrincipales(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/Proyectos/Proy2/api/objetos/Actividad/leerActivPrincipal.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);

        $valores = json_decode($resultado, true);

        return $valores;
        curl_close($ch);
    }
    public function leerEditarActividades($id){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/Proyectos/Proy2/api/objetos/Actividad/leerEditarActiv.php?idAct=".$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);

        $valores = json_decode($resultado, true);

        return $valores;
        curl_close($ch);
    }
    public function editarActividades($data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        if ($data){
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_URL, "http://localhost/Proyectos/Proy2/api/objetos/Actividad/actualizarActividad.php");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'APIKEY: 111111111111111111111',
            'Content-Type: application/json',
            ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
         // EXECUTE:
         $resultado = curl_exec($ch);
         if(!$resultado){
            die("Connection Failure");
        }
         curl_close($ch);

         return $resultado;
    }
    public function eliminarActividades($id){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/Proyectos/Proy2/api/objetos/Actividad/eliminarActividad.php");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // EXECUTE:
        $resultado = curl_exec($ch);

        if(!$resultado){
            die("Connection Failure");
        }
        curl_close($ch);

        return $resultado;
    }
    public function crearActividades($data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        if ($data){
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }   
        curl_setopt($ch, CURLOPT_URL, "http://localhost/Proyectos/Proy2/api/objetos/Actividad/crearActividad.php");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'APIKEY: 111111111111111111111',
            'Content-Type: application/json',
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $resultado = curl_exec($ch);

        if(!$resultado){
            die("Connection Failure");
        }
         curl_close($ch);

         return $resultado;
    }
    public function leerActividadesTodasR(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/Proyectos/Proy2/api/objetos/Actividad/leerActivTodasR.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);

        $valores = json_decode($resultado, true);

        return $valores;
        curl_close($ch);
    }
    public function leerActividadesReporte($campos, $fechaValor, $tiposA){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/Proyectos/Proy2/api/objetos/Actividad/leerActivReporte.php?campos=".$campos."&fechaValor=".$fechaValor."&tiposA=".$tiposA);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);

        $valores = json_decode($resultado, true);

        return $valores;
        curl_close($ch);
    }

}

?>