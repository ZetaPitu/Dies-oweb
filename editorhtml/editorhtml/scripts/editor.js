//
// jHtmlArea.fn.defaultOptions.css = "jHtmlArea.Editor.css";

//mieditor.toHtmlString() Contenido de editor;
//Globales
var informacion = "https://ziw.es/images/informacion.jpg";
var MUESTRA;
var COLOR = null;
var FONDOCOLOR = null;
var TEXTCOLOR = null;
var DOMINIO = getCookie('dominio');
var EXTDOMINIO = getCookie('extension');
var ESTADO = false;
var CAMBIOS = true;
var IMAGENSUBIDA = null;
var ULTIMOELEMENTOPULSADO = null;
var VIDEOQUEESTA = "nada";
var APLICARCOLOR = "fondo";
var ANCHOIMAGEN = 30;
var ANCHOVIDEO = 100;
var ULTIMO_BOTON = null;
var DURACIONCOKIES = 40000;
var CONTENIDOWEB;
var CONTENIDOHEAD = "";
var MODOREALDISENO = false;
Inicio();

function Inicio() {
    if (getCookie("dominio") === "") {
        var contra1 = prompt("Su dominio " + getCookie("dominio"), "prueba.ziw.es");
        document.cookie = "dominio=" + contra1;
        var cadenas = DOMINIO.split(".");
        document.cookie = cadenas[1] + "." + cadenas[2];
        var contra2 = prompt("Contraseña de " + getCookie("dominio"), "");
        document.cookie = "contra=" + contra2;
        window.location = "https://ziw.es/editorhtml/index.php";
    }
    if (getCookie("contra") === "") {
        var contra = prompt("Contraseña de " + getCookie("dominio"), "");
        setCookie("contra", contra, DURACIONCOKIES);
    }



}




function cerrarcookies() {

    setCookie("cookies", "0000000003492", DURACIONCOKIES);
    $("#cookies-ziw").css("display", "none");

}

$(document).ready(function () {
    $("body").ready(function () {
        var a = getCookie("cookies");
        if (a === '') $("#cookies-ziw").css("display", "block"); else $("#cookies-ziw").css("display", "none");
        a = getCookie("pagina");
        if (a === '') {
            sd = "#inicio";
            ULTIMO_BOTON = $(sd);
            $(sd).css("opacity", "0.3");
            setCookie("cookies", "0000000003492", DURACIONCOKIES);
        }
        else {
            sd = "#" + a;
            ULTIMO_BOTON = $(sd);
            $(sd).css("opacity", "0.3");
        }


    });
    $("body").mousedown(function (e) {
        /*1: izquierda, 2: medio/ruleta, 3: derecho
        if (e.which === 3) {
            alert("has hecho click derecho");
            return true;
        }
        if (e.which === 2) {
            alert("has ruedACENTRAL");
            return true;
        }
 }
        if (e.which === 1) {
            alert(e.region);
            return true;
        }
       */
    });

    $(".upload").on('click', function () {
        var url1 = '../php/ficheros.php?id=5&sitioweb=' + DOMINIO;
     //   alert(url1);
        var formData = new FormData();
        var files = $('#image')[0].files[0];
        formData.append('file', files);
        $.ajax({
            url: url1,
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response !== '0') {
                    if (response !== 'Error') $(".card-img-top").attr("src", response);
                    else alerta("<div style='text-align:center'> Contraseña incorrecta <br /> No tiene permiso para modificar en esta web Acceso denegado</div>");
                } else {
                   alerta('Formato de imagen incorrecto.'+response);
                }
            }
        });
        return false;
    });

    $("#test").on('keyup', function () {
    
        ActivarPublicar(false);
        

    });
    $("#test").on('click', function () {
         // alert("cambio");

    });
    $(".btn-info-menu").on('click', function () {
        
        switch ($(this).attr('data')) {

            case "vertexto":

                if ($(this).text() !== "Ver con formato") {
                    CONTENIDOHEAD = $("#mieditor").contents().find('head').html();
                    $("#mieditor").contents().find('head').html("");
                    $(this).text("Ver con formato");
                }
                else {
                    $(this).text("Ver sin formato");
                    $("#mieditor").contents().find('head').html(CONTENIDOHEAD);
                }


                break;
            case "activar":
                if (MODOREALDISENO) {
                    MODOREALDISENO = false;
                    $(this).text("Activar enlaces");
                }
                else {
                    MODOREALDISENO = true;
                    $(this).text("Desactivar enlaces");
                }

     

                break;




            default:
                break;
           

        }

    });
        
    Rellenar_Colores(20000, 15);

    $(".cuadritos-colores").on('click', function (event) {
        
        if (APLICARCOLOR === "texto") {
            $("#inputcolor").css('color', $(this).css('background-color'));
            TEXTCOLOR = $(this).css('background-color')
        }
        else {
            $("#inputcolor").css('background-color', $(this).css('background-color'));
            FONDOCOLOR = $(this).css('background-color');

        }
        $("#inputcolor1").val($(this).css('background-color'));


    });
   
    $("#inputcolor1").on('click', function (event) {
        if (APLICARCOLOR === "texto") {
            $("#inputcolor").css('color', event.val());
        }
        else {
            $("#inputcolor").css('background-color', event.val());
        }
    });
    $("#guardarcolor").on('click', function (event) {
        GuardarColor();
    });
    $("#inputcolortexto").on('click', function (event){
        if (APLICARCOLOR === "texto") {
            $("#inputcolortexto").val("Aplicar a texto");
            APLICARCOLOR = "fondo";
        }
        else {
            $("#inputcolortexto").val("Aplicar a fondo");
            APLICARCOLOR = "texto";
        }
    });  

    
});
function Rellenar_Colores(max,to) {
    
    for (x = 0; x < max ; x+=to) {
        
        color = x.toString(16);
        if (color.length === 3) {
            elem = $(document.createElement('div')).attr('class', 'cuadritos-colores').appendTo('#fon-colores');
            color = "#" + color+ "E";
            // if (color.length === 2) color = "#0" + color;
            //  if (color.length === 1) color = "#00" +  color;
            $(elem).css('background-color', color);
        }
        
    }


}
function Ver_WEB(web, a) {
    
    var num = Math.floor(Math.random() * 1000);
    var http = "https://" + DOMINIO + "/" + num + '--vista.original';
    open(http);


}
function Vista_Previa() {   
    if (ESTADO) return;
    ESTADO = true;
    var num = Math.floor(Math.random() * 1000);
    var http = "https://" + DOMINIO + "/--" + num + '--vistaprevia.prueba';
      //  MIEDITOR.updateTextArea();
    var asd1 = document.getElementById("mieditor");
    var asd = asd1.contentDocument.documentElement.innerHTML;
    $.post("../php/ficheros.php",
        {
            contenido:asd,
            id: "1",
            sitioweb: DOMINIO
        },
        function (data, status) {

            if (data === "0") {
                open(http);

            } else alerta(data);

            ESTADO = false;           
        });


 

}
setInterval(actualizareventos,2000);
function Cambiar_Tema(tema,event) {
  //  alert(event.innerText);
    if (getCookie('pagina') === tema) {
        alerta("El Tema " + tema + " ya esta activo");
    }
    else {
        setCookie("pagina", tema, 30000);
        LeerHtml(tema,event);
    }
}
function ModificarSeccion(tema) {
   // var num = Math.floor((Math.random() * (100000)));
    FONDOCOLOR = null;
    TEXTCOLOR = null;
    $("#inputcolor").html("Texto");
    if (tema === "menu") {
        $(ULTIMOELEMENTOPULSADO).removeClass("div-pulsado");
        $(ULTIMOELEMENTOPULSADO).removeClass("p-pulsado");
        ULTIMOELEMENTOPULSADO = $("#mieditor").contents().find('#menu');
        $("#colores-boton").click();
        return;

    }
    if (tema === "cabecera") {
        $(ULTIMOELEMENTOPULSADO).removeClass("div-pulsado");
        $(ULTIMOELEMENTOPULSADO).removeClass("p-pulsado");
        ULTIMOELEMENTOPULSADO = $("#mieditor").contents().find('#cabecera');
        $("#colores-boton").click();
        return;
    }
    if (tema === "cuerpo") {
        $(ULTIMOELEMENTOPULSADO).removeClass("div-pulsado");
        $(ULTIMOELEMENTOPULSADO).removeClass("p-pulsado");
        ULTIMOELEMENTOPULSADO = $("#mieditor").contents().find('#cuerpo');
        $("#colores-boton").click();
        return;

    }
    if (tema === "pie") {
        $(ULTIMOELEMENTOPULSADO).removeClass("div-pulsado");
        $(ULTIMOELEMENTOPULSADO).removeClass("p-pulsado");
        ULTIMOELEMENTOPULSADO = $("#mieditor").contents().find('#pie');
        $("#colores-boton").click();
        return;
    }
    if (tema === "ultimo") {
        if (ULTIMOELEMENTOPULSADO === null) {
            alerta("No hay nada seleccionado");
            return;
        }
        $("#inputcolor").html(ULTIMOELEMENTOPULSADO.innerHTML);
        $("#colores-boton").click();
        return;
    }
     alerta("Funciones en preparacion<br/> Funcion .. " +tema);
   // window.location = "https://ziw.es/editorhtml/editorhtml.php";
}
function Movil_o_PC(tema) {
    if (tema === "Pc") {
        $("#mieditor").css("height", "85vh");
        $("#mieditor").css("width", "99%");
        $("#mieditor").css("margin","0");

    }
    if (tema === 'Movil') {
        $("#mieditor").css("height", "80vh");
        $("#mieditor").css("width", "30%");
        $("#mieditor").css("min-width", "400px");

        $("#mieditor").css("margin", "4%");
 
    }
    if (tema === 'Tablet') {
        $("#mieditor").css("height", "400px");
        $("#mieditor").css("width", "60%");
        $("#mieditor").css("min-width", "600px");

        $("#mieditor").css("margin", "10%");

    }

}
function ActivarPublicar(asd) {
    asd ? MIEDITOR.updateTextArea(): MIEDITOR.updateHtmlArea();
    CAMBIOS = false;

}
function CambioHeader(asd, event) {
    asd = asd.replace(/<section id="zpitucuerpo">/gi, '');
    asd = asd.replace(/<\/section>/gi, '');
    asd = asd.replace(/class=""/gi, '');
    $("#mieditor").contents().find('#zpitucuerpo').html(asd);
    CAMBIOS = false;
    if (ULTIMO_BOTON !== null) {
        $(ULTIMO_BOTON).css("opacity", '1');
    }
    ULTIMO_BOTON = event;
    $(ULTIMO_BOTON).css("opacity", '0.3');

}
function CambioFooter(asd, event) {
    asd = asd.replace(/<section id="zpitucuerpo">/gi, '');
    asd = asd.replace(/<\/section>/gi, '');
    asd = asd.replace(/class=""/gi, '');
    $("#mieditor").contents().find('#zpitucuerpo').html(asd);
    CAMBIOS = false;
    if (ULTIMO_BOTON !== null) {
        $(ULTIMO_BOTON).css("opacity", '1');
    }
    ULTIMO_BOTON = event;
    $(ULTIMO_BOTON).css("opacity", '0.3');

}
function CambioCSS(asd, event) {
    asd = asd.replace(/<section id="zpitucuerpo">/gi, '');
    asd = asd.replace(/<\/section>/gi, '');
    asd = asd.replace(/class=""/gi, '');
    $("#mieditor").contents().find('#zpitucuerpo').html(asd);
    CAMBIOS = false;
    if (ULTIMO_BOTON !== null) {
        $(ULTIMO_BOTON).css("opacity", '1');
    }
    ULTIMO_BOTON = event;
    $(ULTIMO_BOTON).css("opacity", '0.3');

}
function CambioTema(asd, event) {
    asd = asd.replace(/<section id="zpitucuerpo">/gi, '');
    asd = asd.replace(/<\/section>/gi, '');
    asd = asd.replace(/class=""/gi, '');
    $("#mieditor").contents().find('#zpitucuerpo').html(asd);
    CAMBIOS = false;
    if (ULTIMO_BOTON !== null) {
        $(ULTIMO_BOTON).css("opacity", '1');
    }
    ULTIMO_BOTON = event;
    $(ULTIMO_BOTON).css("opacity", '0.3');

}

function actualizareventos() { 
   
    $("#mieditor").contents().find('body').off();
    $("#mieditor").contents().find('nav').off();
    $("#mieditor").contents().find('div').off();
    $("#mieditor").contents().find('img').off();
    $("#mieditor").contents().find('a').off();
    $("#mieditor").contents().find('p').off();
    $("#mieditor").contents().find('iframe').off();
    $("#mieditor").contents().find('span').off();
    $(".select").off();

    $(".select").on('click', function () {
        Selecionar_Elemento(this);
        CambioImagen(this);
    });
    $('#mieditor').contents().find('body').on("keyup", function () {
      
          ActivarPublicar(true);
    });

    $('#mieditor').contents().find('img').on("click", function () { 
        Selecionar_Elemento(this);
        if (!MODOREALDISENO) modificarimagen(this);
        return MODOREALDISENO;
    });

    $('#mieditor').contents().find('a').on("click", function () {
       //alerta("a");
       // $(".subpage")
        $("html").scrollTop(0);
        Selecionar_Elemento(this);
        return MODOREALDISENO;
        
    });
    $('#mieditor').contents().find('div::before').on("click", function () {
        this.setAttribute("style", "border: outset #000 3px");
        ULTIMOELEMENTOPULSADO = this;
        return false;
    });

    $('#mieditor').contents().find('div').on("mouseout", function () {
     //   this.setAttribute("style", "border:none");
        $("html").scrollTop(0);
        return false;
    });
    $('#mieditor').contents().find('div').on("click", function () {
        if ($(this).attr('class') === 'tapadera') {
            modificarVIDEOQUEESTA(this);
        }
        else {
            Selecionar_Elemento(this);
        }
        return false;
    });
    $('#mieditor').contents().find('p').on("click", function () {
        Selecionar_Elemento(this);
        return false;
    });
    $('#mieditor').contents().find('nav').on("click", function () {
        Selecionar_Elemento(this);
        return false;
    });



    $('#mieditor').contents().find('iframe').on("click", function () {
        Selecionar_Elemento(this);
        return true;
    });
    $('#mieditor').contents().find('span').on("click", function () {
        Selecionar_Elemento(this);
        return MODOREALDISENO;

    });
    $('#mieditor').contents().find('body').on("click", function () {
        Selecionar_Elemento(this);
        return false;

    });

  //  $("").mousedown(function (e)

}

function Selecionar_Elemento(elem) {
    if (ULTIMOELEMENTOPULSADO === elem) {
        $(elem).removeClass("div-pulsado");
        $(elem).removeClass("p-pulsado");
        ULTIMOELEMENTOPULSADO = "nada";

    }
    else {
    
    var asd ="p-pulsado";
    $(ULTIMOELEMENTOPULSADO).removeClass("div-pulsado");
    $(ULTIMOELEMENTOPULSADO).removeClass("p-pulsado");
    $(elem).removeClass("div-pulsado");
    $(elem).removeClass("p-pulsado");
        $(elem).addClass(asd);
    ULTIMOELEMENTOPULSADO = elem;
    }

}



function cerrarsesion() {
    document.cookie = "contra" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    document.cookie = "dominio" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    document.cookie = "pagina" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    var asd = getCookie("extension");
    document.cookie = "extension" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';

    window.location = "https://ziw.es/editorhtml/index.php#nuevasesion";
    
}

function LeerHtml(asd,event) {
   
  //  return;
    if (ESTADO) return;
    ESTADO = true;
 //   alert(event.innerHTML);
    $.post("../php/ficheros.php",
        {

            contenido:"/"+ asd+".html",
            id: "3",
            sitioweb: DOMINIO
        },
        function (data, status) {

            if (data === "ERROR") {
                alerta("Error al cambiar tema");
               // $("#publicar").attr("style", "visibility: visible");

            } else {
                alerta("Tema " + asd + " Activado");
                CambioTema(data,event);

              //  setTimeout(function () {window.location = "https://ziw.es/editorhtml/editorhtml.php";}, 3000);
            }
            ESTADO = false;
        });


}
function PublicarBorrador() {
    if (CAMBIOS) {
        alerta("No se ha hecho ningun cambio ");
        return;

    }
    if (ESTADO) return;
    ESTADO = true;
    MIEDITOR.updateTextArea();
    asd = $('#test').val();
    $.post("../php/ficheros.php",
        {

            contenido: asd,
            id: "3",
            sitioweb: DOMINIO
        },
        function (data, status) {

            if (data === "") {
                alerta("Borrador publicado correctamente");
                $("#publicar").attr("style", "visibility: visible");

            } else alerta(data, "Publicando");
            ESTADO = false;
            CAMBIOS = true;
        });


}
function Publicar() {
    if (CAMBIOS) {
        alerta("No se ha hecho ningun cambio ");
        return;

    }
    if (ESTADO) return;
    ESTADO = true;   
  //  MIEDITOR.updateTextArea();
   var head = $('#mieditor').contents().find('#zpituheader').html();
   var cont = $('#mieditor').contents().find('#zpitucuerpo').html();
   var foot = $('#mieditor').contents().find('#zpitufooter').html();
   var asd1 = document.getElementById("mieditor");
   var asd = asd1.contentDocument.documentElement.innerHTML;
   var pag = getCookie("pagina");
    $.post("../php/ficheros.php",
        {

            contenido: asd,
            contenido1: cont,
            header: head,
            footer:foot,
            pagina: pag,
            id: "6",
            sitioweb: DOMINIO
        },
        function (data, status) {
           
            if (data === "") {
                alerta("Borrador publicado correctamente");
                $("#publicar").attr("style", "visibility: visible");
                
            }else alerta(data,"Publicacion exitosa");
            ESTADO = false;
            CAMBIOS = true;
        });
 

}
function obtenerimagenes(img , asd) {

    if (ESTADO) return;
    ESTADO = true;
    IMAGENSUBIDA = img;
    $("#imagenesboton").click();
    $("#titulo-imagen").text("Imagenes guardadas");
    $("#contenido-imagen").html("Obteniendo imagenes del servidor");
    $("#boton-imagen").text("Cerrar");
    $.post("../php/ficheros.php",
        {

            dir: asd,
            id: "4",
            sitioweb: DOMINIO
        },
        function (data, status) {

            if (data === "") {
                alerta("Borrador publicado correctamente");
                $("#publicar").attr("style", "visibility: visible");

            } else {            
                
                
                $("#contenido-imagen").html(data);

               
             
            }
            
            ESTADO = false;
        });


} 
function CambioImagen(event) {

    $("#imagen-final").attr('src', event.getAttribute('src'));

}
function GuardarColor() {
    if (FONDOCOLOR !== null) $(ULTIMOELEMENTOPULSADO).css("background-color", FONDOCOLOR);
    if (TEXTCOLOR !== null) $(ULTIMOELEMENTOPULSADO).css("color", TEXTCOLOR);

    $("#cancelarcolor").click();
}
function SaliryGuardar() {
    var asd = $("#imagen-final").attr('src');
    var asd2 = $("#imagen-final").attr('style');
    asd1 = asd.replace("../", "https://ziw.es/");
    ActivarPublicar(true);
    try {
        IMAGENSUBIDA.setAttribute('src', asd1);
        IMAGENSUBIDA.setAttribute('style', asd2);

    }
    catch (e) {
        IMAGENSUBIDA.attr('src', asd1);
        IMAGENSUBIDA.attr('style', asd2);
    }
    $("#boton-imagen1").click();
}
function SaliryGuardarvideo() {
    var https = "https://www.youtube.com/watch?v=cOj8E1-hrks";

    
    var asd = $("#video-final").attr('src');
  //  alert(asd);
    $("#video-final").attr('src', "https://www.youtube.com/embed/");
    if (VIDEOQUEESTA === "nada") {
        
        MIEDITOR.youtube1(asd);
    }
    else {
        VIDEOQUEESTA.attr('src', asd);
        CambioTamanoVideoReal();
           VIDEOQUEESTA = "nada";
    }
    ActivarPublicar(true);
    $("#videoyoutube").val("");
    $("#boton-video").click();
}
function Cargarvideo() {
    var https = $("#videoyoutube").val();
    $("#videoyoutube").val("");
    var video = "https://www.youtube.com/embed/" + https.substr(https.length - 11, 11);
    $("#video-final").attr('src', video);

}
function MasTamano() {
    if (ANCHOIMAGEN > 99) return;
    ANCHOIMAGEN = ANCHOIMAGEN + 10;
    var asd = ANCHOIMAGEN.toString(10) + "%";
    $("#porcentaje").text(asd);
    $("#imagen-final").css('width',asd);  


}
function MenosTamano() {
    if (ANCHOIMAGEN < 19) return;
    ANCHOIMAGEN = ANCHOIMAGEN - 10;
    var asd = ANCHOIMAGEN.toString(10) + "%";
    $("#porcentaje").text(asd);
    $("#imagen-final").css('width',asd);

}
function MasTamano1() {
    if (ANCHOIMAGEN > 99) return;
    ANCHOIMAGEN = ANCHOIMAGEN + 1;
    var asd = ANCHOIMAGEN.toString(10) + "%";
    $("#porcentaje").text(asd);
    $("#imagen-final").css('width', asd);



}
function MenosTamano1() {
    if (ANCHOIMAGEN < 4) return;
    ANCHOIMAGEN = ANCHOIMAGEN - 1;
    var asd = ANCHOIMAGEN.toString(10) + "%";
    $("#porcentaje").text(asd);
    $("#imagen-final").css('width', asd);

}
function MenosTamano1video() {
    if (ANCHOVIDEO < 4) return;
    ANCHOVIDEO = ANCHOVIDEO - 1;    
    CambioTamano();  
  

}
function MenosTamanovideo() {
    if (ANCHOVIDEO < 19) return;
    ANCHOVIDEO = ANCHOVIDEO - 10;
    CambioTamano();

}
function MasTamano1video() {
    if (ANCHOVIDEO > 99) return;
    ANCHOVIDEO = ANCHOVIDEO + 1;
    CambioTamano();

}
function MasTamanovideo() {
    if (ANCHOVIDEO > 99) return;
    ANCHOVIDEO = ANCHOVIDEO + 10;
    CambioTamano();
}
function CambioTamanoVideoReal() {

    var asd = ANCHOVIDEO.toString(10) + "%";
    var asd1 = (ANCHOVIDEO * 9 / 16).toString(10) + "%";
    var asd2 = ((100-ANCHOVIDEO) /2).toString(10) + "%";
    VIDEOQUEESTA.parent().css('width', asd);
    VIDEOQUEESTA.parent().css('padding-bottom', asd1);
    VIDEOQUEESTA.parent().css('left', asd2);


}
function CambioTamano() {

    var asd = ANCHOVIDEO.toString(10) + "%";
    var asd1 = (ANCHOVIDEO * 9 / 16).toString(10) + "%";
    var asd2 = ((100 - ANCHOVIDEO) / 2).toString(10) + "%";
    $("#porcentaje1").text(Math.trunc(ANCHOVIDEO).toString(10) + "%");
    $("#video-iframe").css('width', asd);
    $("#video-iframe").css('padding-bottom', asd1);
    $("#video-iframe").css('left', asd2);


}
var ultimovideo = "";
function modificarvideo(num) {
    asd =num.toString(10); 
    ultimovideo = asd;
    asd1 = "#2" + num.toString(10);
    ANCHOVIDEO = 90;
    CambioTamano();
    $(".video-final").attr('id', "video-final");
    $(".video-final").attr("src", 'https://www.youtube.com/embed/00000000');
    $("#video-boton").click();
}
function modificarVIDEOQUEESTA(num) {
    VIDEOQUEESTA = $(num).parent().find('iframe');
    asd4 = parseInt(VIDEOQUEESTA.parent().css('width'));
    asd2 = parseInt(VIDEOQUEESTA.parent().parent().css('width'));
    ANCHOVIDEO = (asd4 / asd2) * 100;
  //  alert(ANCHOVIDEO);
  
    $("#porcentaje1").text(ANCHOVIDEO);
    asd=VIDEOQUEESTA.parent().css('width');
    
    CambioTamano();
    $(".video-final").attr('id', "video-final");
    $(".video-final").attr("src", VIDEOQUEESTA.attr('src'));
    $(".video-final").css('height', "100%");
    $("#video-boton").click();
}
function herramientas() {
    var asd = document.getElementById('herramientas');
    if ($(".ToolBar").css("display") === "block") {
        $(".ToolBar").css("display", "none");
        asd.innerHTML = "Ver barra";
    }

    else {
        $(".ToolBar").css("display", "block");
        asd.innerHTML = "Ocultar barra";
    }

   // document.getElementsByClassName('ToolBar')[0].style
}
function publicar() {

    if (ESTADO) return;
    ESTADO = true;
    $.post("../php/ficheros.php",
        {
            sitioweb:DOMINIO,
            id: "1"
        },
        function (data, status) {

            if (data !== "Error") {
                alerta("<p style='color:#f00' Publicacion correcta</p><br />" + data);
                $("#publicar").attr("style","visibility : hidden");
            } else alerta("<p style='color:#f00'Error:</p><p>No se pudo publicar<p>");
            ESTADO = false;

        });


} 
function obtenercabecera() {
    if (ESTADO) return;
    ESTADO = true;

    $.post("./php/ficheros.php",
        {
            sitioweb: DOMINIO,
            id: "3"
        },
        function (data, status) {

            if (data !== "Error") {
                alerta(data);
                $("#publicar").attr("style", "visibility : hidden");
            } else alerta("<p style='color:#f00'Error:</p><p>No se pudo publicar<p>");
            ESTADO = false;
        });


} 
function codificarEntidad(str) {
    var array = [];
    for (var i = str.length - 1; i >= 0; i--) {
        array.unshift(['&#', str[i].charCodeAt(), ';'].join(''));
    }
    return array.join('');
}
function descodificarEntidad(str) {
    return str.replace(/&#(\d+);/g, function (match, dec) {
        return String.fromCharCode(dec);
    });
}
//----Colores
$(function () {   
      
         
 
   
function startup() {
    MUESTRA = document.querySelector("#colores");
    MUESTRA.top= "300px";
    MUESTRA.value = "0";// COLOR;
    MUESTRA.addEventListener("input", actualizarPrimero, false);
    MUESTRA.addEventListener("change", actualizarTodo, false);
    MUESTRA.select();
}
function actualizarPrimero(event) {
    var p = document.querySelector("#colores");

    if (p) {
       p.style.color = + event.target.value;
        COLOR = p.style.color = event.target.value;
        $(".forecolor")[0].click();
       
    }
}
function actualizarTodo(event) {
    document.querySelectorAll("#colores").forEach(function (p) {
        COLOR = p.style.color = event.target.value;
      
        $(".forecolor")[0].click();

    });
}



    setTimeout(InicioEditor, 1000);
  
    function InicioEditor() { 
        try {
            $("#test").htmlarea();
          //  InsertarCssJs();
            var campos = '<input id="colores" type="color" style="display:none" value="#ff0000">';
            $("footer").append(campos);
            var file = '<input id="files" style="display:none" type="file" value="#ff0000">';
            $("footer").append(file);
            startup();
          
        }
        catch (e)
           {

            setTimeout(InicioEditor, 1000);
          }

  } 


  //  $("textarea").htmlarea(); // Initialize jHtmlArea's with all default values



});

function alerta(mensaje = "Buenos dias", titulo = "ZetaPitu", boton = "Aceptar") {

    $("#mensajesboton").click();
    $("#mensaje-titulo").text(titulo);
    $("#contenido-mensaje").html(mensaje);
    $("#boton-mensaje").text(boton);



}
function modificarimagennueva(id) {
    ANCHOIMAGEN = 30;
    var id1 = "#" + id.toString(10);
    var img=$("#mieditor").contents().find(id1);
    obtenerimagenes(img, '../images');


}
function modificarimagen(img) {
    ANCHOIMAGEN = 30;
    $("#imagen-final").attr('src', img.getAttribute('src'));
    obtenerimagenes(img, '../images');
    
}
function modificarvideos(vid) {

    $("#videosboton").click();

}
function modificarseccion(cab) {

    $("#secctionboton").click();

}

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






