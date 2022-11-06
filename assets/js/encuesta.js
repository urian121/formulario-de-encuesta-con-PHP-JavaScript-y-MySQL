
/*Apenas termine de cargar el documento entra aqui*/    
window.addEventListener('load', (event) => {
    let miBody = document.body;
       miBody.classList.remove('loader');
       accionBtn(sustraerEntero=0);

});




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
      let totalPBD = document.querySelector('#totalPreguntasBD');
      //console.log(totalPBD);
      let totalPreguntas = Number(totalPBD.dataset.totalpreg);
      //console.log(totalPreguntas);

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
    let spanCodigo = document.querySelector('#codigo').textContent;
    let codigo = Number(spanCodigo);

    $.ajax({
        url: 'saved_encuesta.php',
        type: 'POST',
        data: formFormatoGS +'&codigo='+codigo,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            if(data.respuesta){
                alert('Felicitaciones, encuesta llenada correctamente.');
                location.href ="index.php";
            }

        }
    }); 
}