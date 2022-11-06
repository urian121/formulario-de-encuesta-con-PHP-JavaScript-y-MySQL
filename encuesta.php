<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/mesa_ayuda/static/css/documentos/doc_carta.css">
        <title>Encuesta</title>
        <style>
body, textarea, input{
                color: #222;
                font: 13px/1 "Helvetica Neue",Arial,sans-serif;
            }
            #mainForm {
                width: 800px;
                max-width: 800px;
                margin: 50px auto;
                background-color: #fff;
                box-shadow: 0 0 7px #888;
                padding: 50px;
                border: 1px solid #929394;
                min-height: 900px;
            }
            .conteFlex{
                width: 100%;
                display: flex;
                justify-content: space-between;
            }
            .conteFlex span:hover{
                cursor: pointer;
                background-color: #555;
                color: #fff;
                font-weight:800;
            }
            .conteFlex label:hover{
                cursor: pointer;
            }
            .conteFlex span{
                background-color: #cecece;
                width: 4rem;
                height: 4rem;
                border-radius: 50%;
                display: block;
                justify-content: center;
                align-items: center;
                text-align: center;
                font-size: 15px;
                padding: 10px 0px;
            }
            input[type="radio"]{
                position: absolute;            
                display:none; 
                cursor: pointer;
                /* opacity: 0; */
            }
            .checkenRepuesta{
                color: #555;
                font-weight: 800;
                background-color: #8dc53c !important;
            }
            .progress-bar{
                background-color: #8dc53c !important;
                background-image: none;
            }
            .btn-primary{
                width: 100%;
                color: #fff;
                background-color: #218838;
                border-color: #1e7e34;
                margin-top:20px
            }
            .btn-primary:hover{
                opacity: 0.9;
                background-color: #218838 !important; 
            }
            .btn.disabled, .btn[disabled], fieldset[disabled] .btn {
                width: 100%;
                color: #333;
                background-color: silver !important;
                border-color: #ccc !important;
            }
            .loader{
               position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                z-index: 100000000;
                background: #cecece;
                opacity: 0.5; 
            }
            .form-group{
                margin-top: 15px !important;
            }
            .btn:hover, .btn:focus {
                background-color: #218838 !important;
                border-color: #218838 !important;
                text-decoration: none;
              }
           input[type=text]{
                padding: 5px;
            }
            input:focus {
                border: 1px solid #e0e0e0;
                outline: none !important;
            }
            #mensaje{
                display: none;
                color: black;
                background-color: #e0a800;
                border-color: #d39e00;
                padding: 15px;
                border-radius: 3px;
                font-size: 18px;
                text-align: center;
            }
       </style>
    </head>
    <body class="loader">

        <div id="mainForm">
            <div id="megadiv2">
                <table id="header">
                    <tbody>
                        <tr>
                            <td rowspan="4" style="text-align:center">
                                <img src="/mesa_ayuda/static/img/aecsa120.png" alt="">
                            </td>
                            <td rowspan="3" class="text-center text-bold">CASOS DE PRUEBA</td>
                            <td><small><strong>CÓDIGO:</strong> <?php echo $infoGS[0]['codigo']; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><strong>VERSIÓN:</strong> <?php echo $infoGS[0]['version']; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><strong>VIGENCIA:</strong> <?php echo date('Y-m-d'); ?></small></td>
                        </tr>
                        <tr>
                            <td class="text-center text-bold">GESTIÓN TECNOLÓGICA</td>
                            <td><small><strong>TIPO:</strong> <?php echo $infoGS[0]['tipo']; ?></small></td>
                        </tr>
                    </tbody>
                </table>

                <!--
                <table class="space padding-sm">
                    <tbody>
                        <tr>
                            <th align="center">Caso #</th>
                            <td align="center" data-code="<?php //echo $code; ?>" id="divCode"><?php //echo $code; ?>
                                <input type="text" id="idCaso" name="codigo" id="codigo" hidden="true" value="><?php //echo $code; ?>">
                            </td>            
                        </tr>
                    </tbody>
                </table>
                -->
                <?php
                $arrayRespuestas = array(
                        "C" => "C",
                        "E" => "E",
                        "NA" => "N.A"
                    );
                ?>
                
                <br><br>
                <form id="formFormatoGS" onsubmit="saveformFormatoGS();return(false);">
                    <section class="conteFlex">
                        <input type="text" name="usuario" id="usuario" placeholder="Usuario">
                        <input type="text" name="ip" id="ip" placeholder="Ip del usuario" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                        <input type="text" name="cargo" id="cargo" value="" placeholder="Cargo del usuario">
                    </section>
                    
                <table class="space padding-sm">
                    <thead>
                        <tr>    
                            <th align="center">#</th>
                            <th align="center">Pregunta</th>
                            <th align="center">Respuesta</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    /* Total de Preguntas */
                    $totalNumerosPreguntas = count($arrayDatos);
                      $html = '';
                        foreach($arrayDatos as $form){ ?>
                            <tr id="pregunta_<?php echo $form['id']; ?>">
                                <td><?php echo $form['id']; ?></td>
                                <td><?php echo strtoupper($form['preguntas']); ?></td>
                                <td width="140"> 
                                <p class="conteFlex">
                                    <?php
                                        foreach ($arrayRespuestas as $clave => $valor){ ?>
                                            <span class="class_<?php echo $form['id']; ?>" id="spanId_<?php echo $form['id']. '_'.$clave; ?>" onclick="respuesta('<?php echo $form['id']; ?>','<?php echo $clave; ?>')">
                                                <input type="radio" name="respuesta[<?php echo $form['id']; ?>]" id="idResp_<?php echo $form['id'].$clave; ?>" value="<?php echo $clave; ?>">
                                                <label for="idResp_<?php echo $form['id'].$clave; ?>">
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
                        <textarea name="observacion" class="form-control" rows="3"></textarea>
                      </div>
                    <div id="mensaje"></div>
                    <button type="submit" class="btn btn-primary" id="btnSend">DEBES RESPONDER TODAS LAS PREGUNTAS</button>
                </form>
                
                
                <div class="progress" style="margin-top:10px">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                      0%
                    </div>
                </div>
                
            </div>
        </div>

        <script> 
        /*Apenas termine de cargar el documento entra aqui*/    
        window.addEventListener('load', (event) => {
            let miBody = document.body;
               miBody.classList.remove('loader');
               accionBtn(sustraerEntero=0);
           
                desabilitarInputsDefault(); //Llamando función
           
            /**Buscar usuario */
            const inputUsuario = document.querySelector('#usuario');
                    inputUsuario.addEventListener("change", () => {
            const inputValorUsuario = inputUsuario.value;
                
                $.ajax({
                    url: 'index.php',
                    type: 'POST',
                    data: '&evento=Operativo&accion=buscarUserSoporte&inputValorUsuario='+inputValorUsuario,
                    dataType: 'json',
                    success: function (data) {
                        /*validando si hay resultados*/
                        if(data.respuesta.length >0){
                            document.querySelector('#cargo').value = (data.respuesta[0].nombre);
                        }else{
                            document.querySelector('#cargo').value = '';
                        }
                    }
                });
        
            });
    
        });

        function desabilitarInputsDefault(){
            const inputIP    = document.querySelector('#ip');
                  inputIP.readOnly = true; 
                  inputIP.style.background = '#f8f8f8';
                  inputIP.style.border = '1px solid #cecece';
              
            const inputCargo = document.querySelector('#cargo');
                  inputCargo.readOnly = true;
                  inputCargo.style.background = '#f8f8f8';
                  inputCargo.style.border = '1px solid #cecece';
        }
 

        function respuesta(idPregunta, idRespuesta){
            //console.log(idPregunta, idRespuesta)   
            let classIdPregunta = document.querySelector(".class_"+idPregunta).classList.remove('checkenRepuesta'); //Quitar la clase 'checkenRepuesta' a todos los elemento
            let spanIdPregunta = document.querySelector("#spanId_"+idPregunta+'_'+idRespuesta).classList.add('checkenRepuesta'); //Agregar la clase checkenRepuesta al elemento seleccionado
            //let classIdPregunta = $(".class_"+idPregunta).removeClass('checkenRepuesta'); //quitar la clase 'checkenRepuesta' a todos los elemento
            //let spanIdPregunta  = $("#spanId_"+idPregunta+'_'+idRespuesta).addClass('checkenRepuesta'); //Agregar la clase checkenRepuesta al elemento seleccionado
        
            
            let inputRadio = document.querySelector('#idResp_'+idPregunta+''+idRespuesta)
                inputRadio.checked = true; // Marco el input radio con el checked 

            /*Función para activar la barra de progreso de forma dinamica**/
            contadorChecken();
        }
   
        function contadorChecken(){
            let valoresCheck = [];
            $("input[type=radio]:checked").each(function(){
              valoresCheck.push(this.value);
              let totalChecken = (valoresCheck.length);
              let totalPreguntas = '<?php echo (int) $totalNumerosPreguntas; ?>';
              let porcentaje   = (totalChecken * 100) / totalPreguntas;
              //console.log(porcentaje);
              let porcentajeDecimale = Number(porcentaje.toFixed(3)); //Extraigo 3 decimales y formateo la cantidad a numerico
              //console.log(porcentajeDecimale);

              /*Selecciono solo un entero y lo transformo a numerico de tansolo 3 cifra, mira el console.log(sustraerEntero)**/
              let sustraerEntero = Number(porcentaje.toFixed(3).substring(0, 3)); /**/
              //console.log((sustraerEntero));

              /*Validando que el boton enviar este desabilitado si no ha respondido todas las preguntas*/
              accionBtn(sustraerEntero);

              let barraPro     = document.querySelector(".progress-bar");
                  barraPro.style.width = `${(porcentajeDecimale)}%`;
                  barraPro.textContent = `${(sustraerEntero)}%`;
            });
        }
   
        function accionBtn(sustraerEntero=0){
            let btnEnviar = document.querySelector('#btnSend'); //selecciono el boton enviar  
                btnEnviar.disabled = true;

                if(sustraerEntero =='100'){
                    btnEnviar.disabled = false;
                    btnEnviar.textContent ='Crear nuevo Registro';
                }else{
                    btnEnviar.disabled = true; 
             }
        }
    
        function saveformFormatoGS() {
            let formFormatoGS = $('#formFormatoGS').serialize();
        
            let user = document.querySelector('#usuario').value.length;
                if(user =='0'){
                    const divMsj     = document.querySelector('#mensaje'); 
                          divMsj.innerHTML = 'Debes asignar un usuario';
                           divMsj.style.display = 'block';
                    //Ocultar mensaje      
                    const myTimeout = setTimeout(() => {
                           divMsj.style.display = 'none';
                          }, "1500");

                    return;
                }
        
            $.ajax({
                url: 'index.php',
                type: 'POST',
                data: formFormatoGS + '&evento=Operativo&accion=insertformFormatoGS',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    if(data.respuesta=='1'){
                        alert('El formato fue diligenciado con exito');
                        window.close();
                    }
                }
            }); 
        }

    </script>
    <?php
        public function insertformFormatoGS(){
            $sqlCode = "SELECT MAX(id) as ultimoIdCode FROM resp_formato_segurida_informacion";
            $ultimoIdCode = $this->getQueryData($sqlCode);
    
            ($ultimoIdCode[0]['ultimoIdCode'] !='') ?  $ultimoIdCode = $ultimoIdCode[0]['ultimoIdCode'] : $ultimoIdCode =1;
    
                foreach ($_POST['respuesta'] as $idPreg => $respPreg) {
                    $consqlInsertRegistro = "
                                            INSERT INTO resp_formato_segurida_informacion(id_pregunta, respuesta, usuario, cargo, ip, nombre_equipo, usuario_soporte, codigo, observacion, cartera, created)
                                            VALUES ('".$idPreg."', '".$respPreg."', '".$_POST['usuario']."', '".$_POST['cargo']."', '".$_POST['ip']."', '".$_POST['nombre_equipo']."', '".$_SESSION['user']."', '".$ultimoIdCode."', '".$_POST['observacion']."', '".$_POST['cartera']."', NOW())";
                            $resp = $this->setQueryData($consqlInsertRegistro);
                }
            echo json_encode(array("respuesta" => $resp['afectados']));
        }
        ?>
    </body>
</html>
























<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!--Crear elemento-->
    <div id="parentElement">
        <span id="childElement">foo bar..*</span>
    </div>

    <br><br>
    <label for="pokemon"></label>
    <input placeholder="Ingrese algún texto" name="nombre" id="idPokemon" />
    <div id="respuesta"></div>
    <br><br>
    <label for="Nombre"></label>
    <input type="text" name="nombre">
    <p id="valores"> - - - -</p>
    <br><br>
    <input type="text" name="nombre" id="demoo">
    <p id="aqui"></p>

    <script>
        var newNode = document.createElement("p");  //creamos el nuevo elemento,  Crear el nodo a insertar
        const nuevoDIV = document.createTextNode('Hola.!'); //Creando texto
        const elementoN = newNode.appendChild(nuevoDIV); // Agregar contenido al elemento

        // Obtener una referencia al nodo padre
        var parentDiv = document.getElementById("childElement").parentNode; //seleccionando elemento padre
        console.log(parentDiv);
        var referenceNode = document.getElementById("childElement"); // Todo funciona correctamente
        console.log(referenceNode);
        const res = parentDiv.insertBefore(newNode, referenceNode);
        console.log(res);


        //Metodo Input con JavaScript
        const input = document.querySelector('input');
        const log = document.getElementById('valores');

        input.addEventListener('input', updateValue);

        function updateValue(e) {
            console.log('click a fuera');
            log.textContent = e.srcElement.value;
        }



        //Este es la funcion con el evento change, que me envia el valor pero despues de dar click fuera del input, 
        //quiero un evento en donde no tenga que dar click fuera del input para que recien se envíe.
        document.getElementById("idPokemon").addEventListener("change", () => {
            const idPokemon = document.getElementById("idPokemon").value;
            console.log('click a fuera ' + idPokemon);
            //document.querySelector('#respuesta')value.innerHTML = idPokemon;
        });


        //Para poder capturar cada cambio que se produce en el texto del input,
        // es necesario escuchar un evento más apropiado: "input":
        //HTMLElement: input event
        document.querySelector("#demoo").addEventListener("input", () => {
            console.log('Ha cambiado el contenido del input!');

        });



/*

var closeSpan = document.createElement("span");
closeSpan.setAttribute("class","sr-only");
closeSpan.textContent = "Close";

    SQLS;
    https://www.w3schools.com/sql/sql_distinct.asp
    https://www.ibm.com/docs/es/qmf/12.1.0?topic=queries-count
    https://www.ibm.com/docs/es/qmf/12.1.0?topic=queries-distinct
    SELECT DISTINCT Country FROM Customers;

    $sql = "SELECT MIN(id) as total FROM resp_formato_segurida_informacion";
        return $this->getQueryData($sql);

    SELECT MAX(id) FROM resp_formato_segurida_informacion;  
    SELECT min(id) FROM resp_formato_segurida_informacion; 
*/

    </script>
</body>

</html>

















