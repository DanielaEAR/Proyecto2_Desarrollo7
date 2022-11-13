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
    public function editarActividades(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/Proyectos/Proy2/api/objetos/Actividad/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);

        $valores = json_decode($resultado, true);

        return $valores;
        curl_close($ch);
    }
    public function eliminarActividades(){//falta
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/Proyectos/Proy2/api/objetos/Actividad/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);

        $valores = json_decode($resultado, true);

        return $valores;
        curl_close($ch);
    }
    public function crearActividades(){//falta
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/Proyectos/Proy2/api/objetos/Actividad/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);

        $valores = json_decode($resultado, true);

        return $valores;
        curl_close($ch);
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