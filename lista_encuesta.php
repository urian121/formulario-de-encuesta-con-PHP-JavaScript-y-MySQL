<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" sizes="32x32" href="https://urianviera.com/img/icons/favicon-32x32.png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/encuesta.css">
<title>Encuesta con PHP - JavaScript Y MySQ</title>
</head>
<body>

<?php
    include('config.php');  //Incluyendo mi conexion
    $codigo = $_REQUEST['codigo'];

    $sqlPreguntas = ("SELECT 
                        p.id, p.pregunta,
                        r.respuesta,
                        r.codigo, r.observacion, r.created
                    FROM preguntas as p INNER JOIN respuestas_encuesta AS r ON  p.id = r.id_pregunta 
                    AND r.codigo='{$codigo}' AND p.estatus='1'"); 
    $query      = mysqli_query($con, $sqlPreguntas);
   
    $query1      = mysqli_query($con, $sqlPreguntas);
    $dataRow1    = mysqli_fetch_array($query1);

?>

<div id="mainForm">
<a href="descargarEncuesta.php" id="btnDescarga" download>
    Descargar Encuesta en xls
    <img src="assets/imgs/excel.png" alt="excel" style="width: 30px;">
</a>
    <div id="megadiv2">
        <table id="header">
            <tbody>
                <tr>
                    <td rowspan="4" style="text-align:center"><img src="assets/imgs/logo.png" class="logo" alt="log Web Developer"></td>
                    <td rowspan="3" class="text-center text-bold">CASOS DE PRUEBA</td>
                    <td><small><strong>CÓDIGO:</strong> <span id="codigo"><?php echo $dataRow1['codigo']; ?></span></small></td>
                </tr>
                <tr>
                    <td><small><strong>VERSIÓN:</strong> <?php echo '1'; ?></small></td>
                </tr>
                <tr>
                    <td><small><strong>VIGENCIA:</strong> <?php echo  date('Y-m-d', strtotime($dataRow1['created'])); ?></small></td>
                </tr>
                <tr>
                    <td class="text-center text-bold">GESTIÓN TECNOLÓGICA</td>
                    <td><small><strong>TIPO:</strong> <?php echo 'Publico'; ?></small></td>
                </tr>
            </tbody>
        </table>

        

        <br><br>
        <h4 class="text-center">Encuesta Dinámica con PHP - JavaScript Y MySQ <hr></h1>
        <table class="space padding-sm">
            <thead>
                <tr id="cabecera">    
                    <th>#</th>
                    <th>Pregunta </th>
                    <th style="font-size:12px">SI (SI) | NO (NO) TAL VEZ (T)</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                while ($dataRow = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $dataRow['id']; ?></td>
                    <td><?php echo strtoupper($dataRow['pregunta']); ?></td>
                    <td width="170"> 
                    <p class="conteFlex">
                      <strong><?php echo $dataRow['respuesta']; ?></strong>
                    </p>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="form-group">
            <label for="observacion">Observaciones</label>
            <textarea name="observacion" class="form-control" rows="3"><?php echo $dataRow1['observacion']; ?></textarea>
        </div>

    </div>
</div>

</body>
</html>