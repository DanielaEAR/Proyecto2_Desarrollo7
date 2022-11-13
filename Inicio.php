<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estiloA.css">
    
    <title>Resumen De Actividades</title>
</head>
<body>
        <!-- Integración de la clases -->
<?php
    require_once('class/Actividad.php');
?>
        <!-- Menu de la aplicacion -->
    <nav>
        <ul>
            <li><a href="Inicio.php">Inicio</a></li>
            <li><a href="GestionActividades/ProyectPrincipal.php">Mis Actividades</a></li>
            <li><a href="ReporteActividades/ReporteFiltro.php">Reportes</a></li>
        </ul>
    </nav>
    <br>
    <h2 class="titulos">Resumen De Mis Actividades</h2><br>
    <?php
        $obj_resuAct = new Actividad();
        $resumAct = $obj_resuAct->mostrar_actividades();
        $nfilas=count($resumAct);

        if($nfilas > 0){
            foreach($resumAct as $resultado){
                print("<details>");
                print("<summary class='tituloAct'>".$resultado['titulo']."</summary><br>");
                print("<h4>Más detalles sobre la Actividad:</h4>");
                print("<p>Fecha: ".$resultado['fecha']."</p>");
                print("<p>Hora: ".$resultado['hora']."</p>");
                print("<p>Ubicación: ".$resultado['ubicacion']."</p>");
                print("<p>Email: ".$resultado['email']."</p>");
                print("<p>Repetir/No repetir: ".$resultado['repetirAct']."</p>");
                print("<p>Tipo de Actividad: ".$resultado['nombreAct']."</p>");
                print("</details>");
            }        
        }else{
            print("No hay Tipo de Actividades el Día de Hoy <br>");
        }
    ?>

</body>
<footer>
        <div class="foot"> 

        </div>
</footer>
</html>