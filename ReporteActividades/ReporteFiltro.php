<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/estiloA.css">
    <title>Reporte de Actividades</title>
</head>
<body>
<?php
    require_once('../Interfaz/ConsumirApis.php');
    $valorRes = 0;
?>
        <!-- Menu de la aplicacion -->
    <nav>
        <ul>
            <li><a href="../Inicio.php">Inicio</a></li>
            <li><a href="../GestionActividades/ProyectPrincipal.php">Mis Actividades</a></li>
            <li><a href="ReporteFiltro.php">Reportes</a></li>
        </ul>
    </nav>
    <br>
    <h2 class="titulos">Mis Reportes</h2><br>
    <div class="contenedor-filtro">
        <form name="Formfiltro" method="post" action="ReporteFiltro.php">
        <p>Filtrar por
            <SELECT name="tiposA">
                <OPTION value="0" SELECTED>Tipo
                <?php
                    $consumApiTipoAc= new ConsumirApi();
                    $tipoA = $consumApiTipoAc->leerTipoA();
                    $nfilas=count($tipoA);

                    if($nfilas > 0){
                        foreach($tipoA as $resultado){
                            foreach($resultado as $resultadoB){
                                print("<OPTION value='".$resultadoB['id_tipoAct']."'>".$resultadoB['nombreAct']."<br>");
                            }      
                        }             
                ?>
            </SELECT>
                <?php
                    }else{
                        print("No hay Tipo de Actividades Disponibles <br>");
                    }
                ?>
        de Actividad o por 
        <SELECT name="campos">
            <OPTION value="DAY" SELECTED>Día
            <OPTION value="WEEKOFYEAR">Semana
            <OPTION value="MONTH">Mes
            <OPTION value="YEAR">Año
        </SELECT>
        -
        <input type="number" name="fechaValor" value="0"> 
        <input name="ConsultarFiltro" value="Filtrar Datos" type="submit"/>
        <input name="ConsultarTodos" value="Ver Todos" type="submit"/>
        </p>
    </Form>
    </div>
    <br/>
    <?php
        $obj_filtrarAct = new ConsumirApi();
        $reporte = $obj_filtrarAct->leerActividadesTodasR();
        
        if(array_key_exists('ConsultarTodos', $_POST)){
            $obj_filtrarAct = new ConsumirApi();
            $reporte = $obj_filtrarAct->leerActividadesTodasR();
        }
        if(array_key_exists('ConsultarFiltro', $_POST)){
            $obj_filtrarAct = new ConsumirApi();
            $reporte = $obj_filtrarAct-> leerActividadesReporte($_REQUEST['campos'], $_REQUEST['fechaValor'], $_REQUEST['tiposA']);
        }

        $nfilas=count($reporte);
        if($nfilas == 0){
            print("<script> alert('Valor de Fecha/Tipo Incorrecto'); </script>");
            print("<script type='text/javascript'> window.location.href = 'ReporteFiltro.php'; </script>");
        }else{

    ?>
    <br>
    <TABLE class="table">
        <TR class='tr'>
            <TH class='tr-id'>Titulo</TH>
            <TH class='tr-id'>Fecha</TH>
            <TH class='tr-id'>Hora</TH>
            <TH class='tr-id'>Ubicación</TH>
            <TH class='tr-id'>Email</TH>
            <TH class='tr-id'>Repetir Actividad</TH>
            <TH class='tr-id'>Tipo de Actividad</TH>
        </TR>
        <?php

            if($nfilas > 0){
                foreach($reporte as $resultadoHeader){
                    foreach($resultadoHeader as $resultado){
                        print("<TR class='tablaTr'>\n");
                        print("<TD class='tablaTh'>".$resultado['titulo']."</TD>\n");
                        print("<TD class='tablaTh'>".$resultado['fecha']."</TD>\n");
                        print("<TD class='tablaTh'>".$resultado['hora']."</TD>\n");
                        print("<TD class='tablaTh'>".$resultado['ubicacion']."</TD>\n");
                        print("<TD class='tablaTh'>".$resultado['email']."</TD>\n");
                        print("<TD class='tablaTh'>".$resultado['repetirAct']."</TD>\n");
                        print("<TD class='tablaTh'>".$resultado['nombreAct']."</TD>\n");
                        print("</TR>\n");
                    }
                }        
            }else{
                print("No hay Tipo de Actividades el Día de Hoy <br>");
            }
        }
        ?>
    </TABLE>
    <br><br><br><br>
</body>
</html>

