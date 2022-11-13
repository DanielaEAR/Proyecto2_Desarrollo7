<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <link rel="stylesheet" type="text/css" href="../css/estiloA.css">
    <title>Edición de Actividades</title>
</head>
<body>
    <!-- Integración de la clases -->
<?php
    require_once('../class/TipoActividad.php');
    require_once('../class/Actividad.php');
    $id = $_GET['id'];
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
            <form class="registro" name="registro" action="recibirEditar.php" method="POST">
            <?php
                $obj_buscAct = new Actividad();
                $buscAct = $obj_buscAct->consultarUnaAct($id);
                $nfilasA = count($buscAct);
                
                if($nfilasA > 0){
                    foreach($buscAct as $resultAc){
                        print("<input type='hidden' name='id' value='".$id."'>");
                        print("<input type='text' name='titulo'  value='".$resultAc['titulo']."'><br><br>");
                        print("<input type='date' name='fecha'  value='".$resultAc['fecha']."'><br><br>");
                        print("<input type='time' name='hora' value='".$resultAc['hora']."'> <br> <br>");
                        print("<input type='text' name='ubicacion' value='".$resultAc['ubicacion']."'><br><br>");
                        print("<input type='text' name='email' value='".$resultAc['email']."'><br><br><hr>");
                        print("<b><p>Desea repetir todo el dia:</p></b>");
                        if($resultAc['repetirAct'] == "23:59:00"){
                            print("<input id=res type='radio' id='si' name='rs' value='si' checked>SI<br>");
                            print("<input id=res type='radio' id='no' name='rs' value='no'>NO<br><br>");
                        }else{
                            print("<input id=res type='radio' id='si' name='rs' value='si'>SI<br>");
                            print("<input id=res type='radio' id='no' name='rs' value='no' checked>NO<br><br>");
                        }
                        print("<input id='h' type='time' name='horaR' value='".$resultAc['repetirAct']."'> <br> <br>");
                        $tipo = $resultAc['nombreAct'];
            
                    } 
                }           
            ?>
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
                                if($resultado['nombreAct'] == $tipo){
                                    print("<OPTION selected value='".$resultado['id_tipoAct']."'>".$resultado['nombreAct']."</OPTION><br>");
                                }else{
                                    print("<OPTION value='".$resultado['id_tipoAct']."'>".$resultado['nombreAct']."</OPTION><br>");
                                }
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
                <input class="btn" type="submit" value="ACTUALIZAR"><br><br>
            </form>
        </div>
    </div>
</div>
<br><br><br><br>
</body>
</html>