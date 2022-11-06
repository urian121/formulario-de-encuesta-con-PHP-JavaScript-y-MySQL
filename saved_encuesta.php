<?php
include('config.php');

        /*
        echo '<pre>';
                print_r($_POST);
        echo '</pre><br>'; 
        */
foreach ($_POST['respuesta'] as $idPreg => $respPreg) {
        $InsertEncuesta = ("INSERT INTO respuestas_encuesta(
                id_pregunta,
                respuesta,
                codigo,
                observacion,
                created
        )
        VALUES(
                '".$idPreg."',
                '".$respPreg."',
                '".$_POST['codigo']."',
                '".$_POST['observacion']."',
                NOW()
        )");
        $resultadoInsert = mysqli_query($con, $InsertEncuesta);
     //print_r($InsertEncuesta);   
     //print_r($resultadoInsert);    
}
echo json_encode(array("respuesta" => $resultadoInsert));


?>
