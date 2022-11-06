<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <!--Importante--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar</title>
</head>
<body>
    
<?php
include('config.php');
date_default_timezone_set("America/Bogota");
$fecha = date("d/m/Y");

header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
$filename = "ReporteExcel_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");


$DataEncuenta = ("SELECT 
                p.id, p.pregunta,
                r.respuesta,
                r.codigo, r.observacion, r.created
            FROM preguntas as p INNER JOIN respuestas_encuesta AS r
            ON  p.id = r.id_pregunta  AND p.estatus='1' ORDER BY r.id DESC");
$Data = mysqli_query($con, $DataEncuenta);

?>


<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #D0CDCD;">
    <th>#</th>
    <th>PREGUNTA</th>
    <th>RESPUESTA</th>
    <th>CODIGO</th>
    <th>FECHA</th>
    </tr>
</thead>
<?php
$i =1;
    while ($dataRow = mysqli_fetch_array($Data)) { ?>
    <tbody>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $dataRow['pregunta']; ?></td>
            <td><?php echo $dataRow['respuesta']; ?></td>
            <td><?php echo $dataRow['codigo'] ; ?></td>
            <td><?php echo $dataRow['created'] ; ?></td>
        </tr>
    </tbody>
    
<?php } ?>
</table>

</body>
</html>