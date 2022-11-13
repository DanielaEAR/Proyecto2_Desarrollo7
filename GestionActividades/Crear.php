<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="../css/estiloA.css">
    <title>Creacion de Actividades</title>
</head>
<body>
    <!-- Integración de la clases -->
<?php
    require_once('../class/TipoActividad.php');
    $valorRes = 0;
?>
    <!-- Menu de la aplicacion -->
    <nav>
        <ul>
        <li><a href="../Inicio.php">Inicio</a></li>
        <li><a href="ProyectPrincipal.php">Mis Actividades</a></li>
        <li><a href="../ReporteActividades/ReporteFiltro.php">Reportes</a></li>
        </ul>
    </nav>

 <!-- Formulario de las actividades -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <h1>Agenda de Actividades</h1>
            
            <form class="registro" name="registro" action="recibirCrear.php" method="POST">
               <!-- <input type="hidden" name="id"> -->
                <input type="text" name="titulo"  placeholder="Título de la Actividad"><br><br>
                <input type="date" name="fecha"  placeholder="Fecha"><br><br>
                <input type='time' name='hora' value="00:00:00" placeholder="Hora"> <br> <br>
                <input type="text" name="ubicacion" placeholder="Ubicación"><br><br>
                <input type="text" name="email"  placeholder="Email"><br><br>
                <hr>
                <!-- radio button para repetir la actividad -->
                <b><p>Desea repetir todo el dia:</p></b>
                    <!-- seleccion Si -->
                    <input type="radio" id="si" name="rs" value="si">SI<br>
                    <!-- seleccion NO -->
                    <input type="radio" id="no" name="rs" value="no">NO<br><br>
                    <!-- fecha 24 horas -->     
                    <input type='time' name='horaR' value="23:53:00"> <br> <br>
                <hr>
                <!-- Select para elegir el tipo de actividad -->
                <b><p>Tipo de Actividad</p></b>
                <SELECT name="tiposA">
                    <OPTION value="0" SELECTED>Tipo
                    <?php
                        $obj_tipoA = new TipoActividad();
                        $tipoA = $obj_tipoA->consultar_tiposAct();
                        $nfilas=count($tipoA);

                        if($nfilas > 0){
                            foreach($tipoA as $resultado){
                                print("<OPTION value='".$resultado['id_tipoAct']."'>".$resultado['nombreAct']."<br>");
                            }             
                    ?>
                </SELECT><br><br>
                    <?php
                        }else{
                            print("No hay Tipo de Actividades Disponibles <br>");
                        }
                    ?>
                <br><br>
                <!-- Validar que los campos no estén vacíos -->
                <input class="btn" type="submit" value="AGREGAR"><br><br>
            </form>
        </div>
    </div>
</div>
<br><br><br><br>
</body>
</html>