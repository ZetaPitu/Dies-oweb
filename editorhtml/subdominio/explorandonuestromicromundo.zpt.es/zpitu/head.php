<head>
<!-- ZetaPitu -->
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  <script id="css-js"> 
      
      dir = getCookie("dominio");
      nom = getCookie("pagina");
      if (dir === "") dir = window.location.hostname;
      if (nom === "") nom = "empresa";

      titulo='<title>Mi aaaaaa</title>'
      css ='<link href="https://ziw.es/subdominio/xxxxxx/zpitu/css/yyyyyy.css" rel="stylesheet" type="text/css"/>';
      js = '<script src="https://ziw.es/subdominio/xxxxxx/zpitu/js/yyyyyy.js"></scr' + 'ipt>';
      css = css.replace("xxxxxx", dir);
      titulo = titulo.replace('aaaaaa', nom);
      css = css.replace("yyyyyy", nom);
      js = js.replace("xxxxxx", dir);
      js = js.replace("yyyyyy", nom);
      $('head').append(titulo);
      $('head').append(css);
      $('head').append(js);
      asd = document.getElementById("css-js");
      $(asd).html("");
      asd.parentNode.removeChild(asd);    
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
 </script>
</head>
