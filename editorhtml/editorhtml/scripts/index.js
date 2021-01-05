//inicio();

if (window.location.hash !== "#nuevasesion") {
    if (getCookie("dominio") !== "" && getCookie("contra") !== "") {
        window.location = "https://" + window.location.hostname + "/editorhtml/editorhtml.php";
    }
}
function cerrarcookies() {
    document.getElementById("cookies-ziw").style.display = "none";
  //  setCookie("cookies", "0000034",0);
}
function inicio(asd = 0) {
    if (asd === 1) {
        asd = document.getElementById("form1");
        var contra1 = "prueba.ziw.es";
        asd.elements.dominio.value = contra1;     
        asd.elements.dominio.setAttribute("readonly", "readonly");
        asd.elements.dominio.setAttribute("style", "border-style: none");
        setCookie("dominio", contra1,0);
        var contra2 = prompt("Contraseña de " + getCookie("dominio"), "ASDRTGHGVGUJNMK");
        setCookie("contra", contra2,0);


    }
    if (asd===2) {
        
        //  setCookie("contra", contra, 3000);
        asd = document.getElementById("form1");        
        var dom = asd.elements.dominio.value;
        dom +="." + asd.elements.extension.value;
      
        var cont = asd.elements.contrasena.value;
        if (dom.length < 8) {
            alert("Dominio no valido");
            return false;
        }
        if (cont.length < 8) {
            alert("Contraseña muy corta no valida");
            return false;
        }
        var d;
        if (asd.elements.sesion.checked) d = 300000; else d = 0;
        setCookie("contra", cont, d);
        setCookie("dominio", dom, d);
        setCookie("pagina","inicio", d);
        setCookie("extension", asd.elements.extension.value, d);

    }
    if (asd === 3) {
        setCookie("contra","00000000", 0);
        setCookie("dominio", "prueba.ziw.es", 0);
        setCookie("pagina","inicio", d);
        setCookie("extension", asd.elements.extension.value, d);
  }
    return true;
    }

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    var dom = window.location.hostname;
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    if (exdays === 0) document.cookie = cname + "=" + cvalue + ";path=/;domain=" + dom;
    else document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
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

