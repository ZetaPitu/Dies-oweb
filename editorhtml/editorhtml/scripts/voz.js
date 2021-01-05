var recognition;
var recognizing = false;
var resultado="";
try {
    var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    recognition = new SpeechRecognition();
}
catch (e) {
    console.error(e);
    $('.no-browser-support').show();
    $('.app').hide();
}
function Escuchar() {

    recognition.lang = "es-VE";
    recognition.continuous = true;
    recognition.interimResults = true;
}
    recognition.onstart = function () {
        recognizing = true;
        alert("empezando a escuchar");
    }
    recognition.onresult = function (event) {
        resultado1 = '';

        for (var i = event.resultIndex; i < event.results.length; i++) {
            if (event.results[i].isFinal) {
                resultado1 = event.results[i][0].transcript;
                      if (resultado1 === "cerrar") alert("Cabron");
                resultado += resultado1;

                alert(resultado);

           }
        }

        //texto
    }
    recognition.onerror = function (event) {
    }
    recognition.onend = function () {


        alert(resultado);
        console.log("terminó de escuchar, llegó a su fin");

    }


function procesar() {

    if (recognizing === false) {
        Escuchar();
        recognition.start();
        recognizing = true;
     //   document.getElementById("procesar").innerHTML = "Detener";
    } else {
        recognition.stop();
        recognizing = false;
    //    document.getElementById("procesar").innerHTML = "Escuchar";
    }
}
//procesar();

function LeerTexto(message) {
    var speech = new SpeechSynthesisUtterance();

    // Set the text and voice attributes.
    speech.text = message;
    speech.volume = 1;
    speech.rate = 1;
    speech.pitch = 1;

    window.speechSynthesis.speak(speech);
}