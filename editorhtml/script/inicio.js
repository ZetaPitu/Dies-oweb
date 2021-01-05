// debajo de la configuración predeterminada enumerada 
AOS.init({
    // Configuración global:
    disable: 'movil', // acepta los siguientes valores: 'teléfono', 'tableta', 'móvil', booleano, expresión o función on
    startEvent: 'DOMContentLoaded', // nombre del evento enviado en el documento, que AOS debe inicializar en
    initClassName: 'aos-init',// clase aplicada después de la inicialización
    animatedClassName: 'aos-animate',  // clase aplicada en la animación
    useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
    disableMutationObserver: false, // disables automatic mutations' detections (advanced)
    debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
    throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


    // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
    offset: 120, // offset (in px) from the original trigger point
    delay: 0, // values from 0 to 3000, with step 50ms
    duration: 2000, // values from 0 to 3000, with step 50ms
    easing: 'ease', // default easing for AOS animations
    once: false, // whether animation should happen only once - while scrolling down
    mirror: false, // whether elements should animate out while scrolling past them
    anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
    
});


function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function cerrarmodal(){
    $("#crearweb").click();
    alert("No ha puesto url o es muy corta");
}
$(document).ready(function () {
    var estado = false;
      $("#crearweb").unbind();

    $("#buscar").click(function () {


    });
    $("#ver").click(function () {
        if (estado) return;
        estado = true;

        var dominio = document.getElementById("dominio1").value;
        if (dominio.length < 2) {
            alert("web demasiado corta");
            estado = false;
            return;
        }
        var extension = document.getElementById("extension").value;
        var dir = "https://" + dominio + "." + extension;
        estado = false;
        open(dir);

    });
    $("#crearwebfinal").click(function () {

  
    });
    var estado1 = false;
    $("#crear").click(function () {
        
        if (estado1) return;
        estado1 = true;
     
        document.getElementById("info").innerHTML="https://" + document.getElementById("dominio1").value + "." + document.getElementById("extension").value;
        var dominio = document.getElementById("dominio1").value;
        var extension = document.getElementById("extension").value;
        var http = "php/dns.php";
        var sitioweb=dominio + "." + extension;
        if (dominio.length < 2) { 
            alert("Web demasiado corta");
            estado1 = false;
            return;
        } 
        if (dominio === "www") {
            alert("dominio www.ziw.es ya existe");
            estado1 = false;
            return;
        }
       
        // alert(extension);
        //  alert(dominio);

       
        $.get(http,
            {
                sitioweb: sitioweb,
                id: "5"
            },
            function (data, status) {

                if (data.length >6) {
                    alert(data);
        } else {

                    $("#crear1").click();
                } 
                estado1 = false;

            });

    });
    $("#editarweb").click(function () {
        var dominio = document.getElementById("dominio1").value;
        var extension = document.getElementById("extension").value;
        var sitioweb = dominio + "." + extension;
        http = "https://" + sitioweb + "/editor.php";
        open(http);
    });
});
function comprobar(string, filtro = 'abcdefghijklmnopqrstuvwxyz1234567890') {//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
  

   for (var i = 0; i < string.length; i++)
        if (filtro.indexOf(string.charAt(i)) !== -1)
            out += string.charAt(i);
    return out;
}
var estado2 = false;
function validarform(form) {
     var nombre=form.elements.nombre.value;
     var email = form.elements.email.value;
     var contra = form.elements.contra.value;
    var  contra1 = form.elements.contra1.value;
    var  dominio = document.getElementById("dominio1").value;
    var  extension = document.getElementById("extension").value;
    var sitioweb = dominio + "." + extension;
    var http = "php/dns.php";

    if (contra.length < 8) {
        alert("Contraseña muy corta \n Minimo 8 caracteres");
        return false;

    }

    if (contra !== contra1) {
        alert("Las contraseñas no coinciden");
        return false;
    }
    if (estado2) return false;
    estado2 = true;
    $.get(http,
        {  
            nombre: nombre,
            email: email,
            sitioweb: sitioweb,
            contra: contra,
            dominio: dominio,
            extension: extension,
            id: "7"
        },
        function (data, status) {

            if (data.length > 6) {
                alert(data);
                //alert("Error: Solo se puede tener una web por cada email");
            } else {
                document.getElementById('ver').style = "display:inline-block;";
                document.getElementById('editarweb').style = "display:inline-block;";
                document.getElementById('crear').style = "display:none";
                setCookie("dominio", sitioweb, 3000);
                setCookie("contra", contra,3000);
                alert("Sitio web creado correctamente");
            }
            estado2 = false;

            return false;
        });

    return false;
}