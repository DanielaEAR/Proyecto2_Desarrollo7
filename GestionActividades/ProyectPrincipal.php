<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <link rel="stylesheet" type="text/css" href="../css/estiloA.css">
    <title>Agenda Estudiantil</title>
</head>
<body>
    <!-- Integración de la clases -->
<?php
    require_once('../class/Actividad.php');
?>   
    <!-- Menu de la aplicacion -->
    <nav>
        <ul>
        <li><a href="../Inicio.php">Inicio</a></li>
        <li><a href="ProyectPrincipal.php">Mis Actividades</a></li>
        <li><a href="../ReporteActividades/ReporteFiltro.php">Reportes</a></li>
        </ul>
    </nav>
<div class="col-md-8">
    <br>
    <h2 class="titulos">Mis Actividades</h2>
    <br><br>
    <form name="Formfiltro" method="post" action="Crear.php">
    <table class="table">
        <thead>
            <tr class='tr'>
                <th class='tr-id'>#</th>
                <th class='tr-ti'>Titulo</th>
            </tr>
        </thead>
        <tbody>  
        <?php
            $obj_todasAc = new Actividad();
            $todasAct = $obj_todasAc->consultarTodasAct();
            $nfilasT=count($todasAct);

            if($nfilasT > 0){
                foreach($todasAct as $resTodas){
                    print("<tr class='tablaTr'>");
                    print("<th class='tablaTh'>".$resTodas['id_actividad']."</th>");
                    print("<th class='tituMis'>".$resTodas['titulo']."</th>");
                    $idA = $resTodas['id_actividad'];
                    print("<th class='tablaTh'><a class='tabla-a' href='Editar.php?id=$idA'>Editar</a></th>");
                    print("<th class='tablaTh'><a class='tabla-a' href='Eliminar.php?id=$idA'>Eliminar</a></th>");
                    print("</tr>");
                } 
            }
        ?>
        </tbody>
    </table>
    <br><br><br>
    <div class="espacio">
        <div class="espacio-btn">
            <input class="btn" value="Crear Nueva" type="submit"/>
        </div>
    </div>
    </Form>
</div>

</body>
</html>