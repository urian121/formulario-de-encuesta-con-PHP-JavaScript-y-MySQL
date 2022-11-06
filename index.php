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
<body class="loader">


<div id="mainForm">

    <div id="megadiv2">
        <table id="header">
            <tbody>
                <tr>
                    <td rowspan="4" style="text-align:center"><img src="assets/imgs/logo.png" class="logo" alt="log Web Developer"></td>
                    <td rowspan="3" class="text-center text-bold">CASOS DE PRUEBA</td>
                    <td><small><strong>CÓDIGO:</strong> <span id="codigo"><?php echo rand(); ?></span></small></td>
                </tr>
                <tr>
                    <td><small><strong>VERSIÓN:</strong> <?php echo '1'; ?></small></td>
                </tr>
                <tr>
                    <td><small><strong>VIGENCIA:</strong> <?php echo date('Y-m-d'); ?></small></td>
                </tr>
                <tr>
                    <td class="text-center text-bold">GESTIÓN TECNOLÓGICA</td>
                    <td><small><strong>TIPO:</strong> <?php echo 'Publico'; ?></small></td>
                </tr>
            </tbody>
        </table>

        
        <?php
        include('config.php');  //Incluyendo mi conexion
        $sqlPreguntas = ("SELECT * FROM preguntas WHERE estatus='1'"); //Consultando todas las preguntas
        $query = mysqli_query($con, $sqlPreguntas);

        $arrayRespuestas = array(
                "SI" => "SI",
                "NO" => "NO",
                "Tal_vez" => "T"
            );
        ?>
        <!--Almacenando el total de preguntas, para luego consultarlas desde JavaScript,
        pues la necesito para animar la barra de progreso--->
        <p id="totalPreguntasBD" data-totalPreg="<?php echo mysqli_num_rows($query); ?>"></p>

        <br><br>
        <h4 class="text-center">Encuesta Dinámica con PHP - JavaScript Y MySQ <hr></h1>
        <form id="formFormatoGS" onsubmit="saveformFormatoGS();return(false);">
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
                    <tr id="pregunta_<?php echo $dataRow['id']; ?>">
                        <td><?php echo $dataRow['id']; ?></td>
                        <td><?php echo strtoupper($dataRow['pregunta']); ?></td>
                        <td width="170"> 
                        <p class="conteFlex">
                            <?php
                                foreach ($arrayRespuestas as $clave => $valor){ ?>
                                    <span class="class_<?php echo $dataRow['id']; ?>" id="spanId_<?php echo $dataRow['id']. '_'.$clave; ?>" onclick="respuesta('<?php echo $dataRow['id']; ?>','<?php echo $clave; ?>')">
                                        <input type="radio" name="respuesta[<?php echo $dataRow['id']; ?>]" id="idResp_<?php echo $dataRow['id'].$clave; ?>" value="<?php echo $clave; ?>">
                                        <label for="idResp_<?php echo $dataRow['id'].$clave; ?>">
                                            <?php echo ($valor); ?>
                                        </label>
                                    </span>
                            <?php } ?>
                        </p>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
                <div class="form-group">
                <label for="observacion">Observaciones</label>
                <textarea name="observacion" class="form-control" rows="3">No hay observación</textarea>
                </div>
            <div id="mensaje"></div>
            <button type="submit" class="btn btn-primary" id="btnSend">DEBES RESPONDER TODAS LAS PREGUNTAS</button>
        </form>
        
        
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                0%
            </div>
        </div>
        
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="assets/js/encuesta.js"></script>
</body>
</html>