<?php

Class Consumir{


    public function leerTipoA(){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/Proyectos/Proy2/api/objetos/TipoActividad/leerTipoA.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);

        $valores = json_decode($resultado, true);

        return $valores;
    }

}

?>