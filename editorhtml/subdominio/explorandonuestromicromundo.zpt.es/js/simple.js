/* Juan Mascuñano Torres 000.js*/

function cerrarcookies() {

    setCookie("cookies", "0000000003492", 4000);
    $("#cookies-ziw").css("height", "0");

}
$(document).ready(function () {
    $("body").ready(function () {
        var a = getCookie("cookies");
        if (a === '') $("#cookies-ziw").css("height", "auto");
        else $("#cookies-ziw").css("height", "0");



    });
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