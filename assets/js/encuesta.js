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
    let classIdPregunta = $(".class_"+idPregunta).removeClass('checkenRepuesta'); //quitar la clase 'checkenRepuesta' a todos los elemento
    let spanIdPregunta  = $("#spanId_"+idPregunta+'_'+idRespuesta).addClass('checkenRepuesta'); //Agregar la clase checkenRepuesta al elemento seleccionado

    
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
