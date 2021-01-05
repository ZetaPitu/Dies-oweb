<!DOCTYPE html>
<?php
session_start();

 echo $_SESSION["newsession"];
 

  // directorio de temas https://www.creativosonline.org/blog/templates-web-responsive-html5-css3.html
  //  require "php/dns.php";
  //  createsubdominio("andhres22",'zpt.es');
  //  idsubdominio("andres22");
   $dir= $_SERVER["HTTP_HOST"];//. $_SERVER["REQUEST_URI"];
   $https="https://".$dir."?admin=1";
     $name = $_REQUEST['admin'];
     $dominio=$_REQUEST['d'];
    if (empty($name)) {
        // no hacer nada
    } else {
        echo '<script> alert("Pagina de diseño no preparada");close();</script>';
    }
    if (empty($dominio)) {
        // no hacer nada
    } else {
       $html='<script>window.location="'. "https://ziw.es/editorhtml/editorhtml.php?d=" .$dominio .'";</script>';
       echo $html;
    }





?>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>ZetaPitugratis </title>
      <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1"/>
   <link rel="icon" href="editorhtml/favicon.ico" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <link href = "https://unpkg.com/aos@2.3.1/dist/aos.css" rel = "stylesheet"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <!-- <script src="/path/to/jquery.cookie.js"></script>-->
  <link href="css/ziw.css" rel="stylesheet" />
</head>
<body>
    
    <header style="background-image: url('images/cabecera-1053197.jpg')">
    <p style="margin-top:4px; text-align:center;width:100%;position:fixed;z-index:898767"><a class="btn btn-primary" href="https://mipaypal.zpt.es" target="_blank">
                    Ayùdame a seguir</a></p>
       
           <div class="jumbotron text-center">
            <div class="row web-sitios">
                
           
            <h1 style="text-align:center;width:100%;">Su sitio web gratis</h1>
            <div style="text-align:center;width:90%;margin-left:10%">
             <p>Elija su dominio</p>

          
            <label for="whois_dominio" class="formWww">Solo letras minúsculas y numeros</label><div style="display:flex;margin-right: 15px;"> 
            <input type="text" value="" spellcheck="false" onkeyup="this.value=comprobar(this.value)" id="dominio1" placeholder="Introduzca su web" style="width:80%;">
               
            <select name="whois_extension" id="extension">
                <option value="zpt.es">.zpt.es</option>
                <option value="ziw.es">.ziw.es</option>

            </select>
</div>   
           <div>
            <button id="ver" type="button" style="display:none" class="btn btn-danger normal">Ver web</button>            
            <button id="editarweb" type="button" style="display:none" class="btn btn-danger normal">Editar web</button>       
   
            <button id="crear" type="button" class="btn btn-danger normal">Crear web</button>
            <button id="crear1" style="display:none" type="button" class="btn btn-danger normal" data-toggle="modal" data-target="#crearweb">Crear web</button>

           </div>
 </div>
            </div>
           </div>
    </header>
    <section style="text-align:center">
 <a href="#contacto"><img src="images/iconos/thumbs.png"  style="float:left"/></a>       
<div class="container">
  <div class="row">
   
    <div class="col-sm-4" >
      <div  data-aos="fade-up-right">
      <h3>Su web gratis</h3>
          <picture style="text-align:center">
            <a name="Inicio">
            <source media="(min-width: 465px)" src="images/base64.png" />
            <source media="(min-width: 650px)" src="images/base64.png" />
          <img src="images/base64.png" alt="" style="width:80%;height:200px;" />
         </a>
         </picture>
<p>Si creais un tema mostrar vuestra info de contacto para que os puedan mandar un soporte.  A mi personalmente me mata tener publicidad en el dashboard no lo hagais jajaja.</p>
Si teneis una tienda ultimos productos comprados (usando un shortcode) ,…
Ultimos usuarios conectados
Con los shortcodes podeis lanzar cualquier cosa
Tenemos al alcance de la mano dos géneros de publicidad en el buscador Google; publicidad gratis que conocemos con el nombre de posicionamiento web en buscadores o bien estrategia de SEO, y una de pago que consiste en la generación y puesta en marcha de una campaña de anuncios en Google y en toda su red de contenido
    </div>

    </div>
    
    <div class="col-sm-4" >
        <div data-aos="fade-up">
      <h3>SSL gratis </h3>
      <img src="images/ssl.png" alt="" style="width:80%;height:200px;" />
            <h3>Creado el sitio web La conexiòn SSL tarda unos 5 minutos en instalarse</h3>
<p>
  Considerando un modelo OSI (Arquitectura de redes por capas), el protocolo SSL se utiliza entre la capa de aplicaciòn y la capa de transporte. Uno de sus usos màs extendidos, es el que se realiza junto al protocolo HTTP, dando lugar al HTTPS o versiòn segura de HTTP. Se utiliza para la transferencia de hipertexto (Sitios web) de manera segura. De esta forma se consigue que la informaciòn transmitida entre un sitio web y un usuario (en ambos sentidos), sea segura, especialmente importante cuando se trata de informaciòn sensible: datos confidenciales, contraseñas, informaciòn bancaria, imàgenes personales, etc.
     <p>
 </div>
<div class = "sharethis-inline-share-buttons"> </div>
    </div>
    
    <div class="col-sm-4" >
        <div data-aos="fade-up-left">
      <h3>Multiples servicios</h3>  
            
         <img src="images/herram.jpg" alt="" style="width:80% ;height:200px;" />    
        </div> 
        <p>Servicios profesionales de traducción, revisión de textos, redacción, transcripción, paleografía y desarrollos web a la carta. Somos especialistas en lenguajes técnicos y en proyectos web multidisciplinares de humanidades y medicina.
        </p>
        <p>
            Audio o video a texto Para que la información en audio sea útil es necesario transformarla en texto escrito. ZetaPitu logra la máxima precisión y calidad en la entrega del proyecto dado su flujo de trabajo de varias capas en las que las que intervienen tanto la tecnología como la comprensión humana. Con una gran base de colaboradores alrededor del mundo podemos realizar transcripciones en el idioma que sea necesario.
        </p>

    </div>
  </div>
      <div data-aos="fade-up">
           <div class="col-md-12 mipu" >
                <div class="col-md-6">
                    <svg id="globe-icon" class="md-cm-upgrade-advantage__icon" height="100" viewbox="0 0 31 31" width="100" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.882 29.463c1.271-1.267 3.847-4.256 5.253-8.683 1.833.31 3.715.774 5.61 1.445-2.196 3.926-6.19 6.713-10.863 7.238zm-13.97-7.079c.74-.262 2.79-.935 5.686-1.452 1.424 4.366 3.977 7.312 5.226 8.553-4.67-.475-8.674-3.218-10.913-7.1zm-.47-13.317c.62.226 2.673.926 5.665 1.482a16.882 16.882 0 0 0-.512 4.86c.066 1.65.33 3.171.71 4.565-3.083.56-5.218 1.283-5.863 1.517A14.171 14.171 0 0 1 1 15.28c0-2.228.528-4.33 1.442-6.212zm11.424-7.996C12.493 2.34 9.752 5.295 8.391 9.587c-2.785-.512-4.757-1.157-5.48-1.414C5.157 4.28 9.177 1.534 13.866 1.071zm13.88 7.263a33.371 33.371 0 0 1-5.406 1.407c-1.339-4.358-4.108-7.36-5.504-8.653 4.693.512 8.705 3.306 10.91 7.246zM15.778 19.28V11.28c.061 0 .12.003.181.003 1.794 0 3.695-.123 5.656-.414.35 1.38.54 2.883.474 4.5a19.02 19.02 0 0 1-.674 4.292c-1.957-.28-3.85-.39-5.637-.382zm0 9.852v-8.857a37.628 37.628 0 0 1 5.341.352c-1.54 4.66-4.442 7.661-5.34 8.505zm-1-8.84v8.72c-1-.966-3.68-3.852-5.169-8.249a42.127 42.127 0 0 1 5.17-.47zm0-18.687v8.662a42.036 42.036 0 0 1-5.376-.506c1.407-4.25 4.233-7.126 5.376-8.156zm1-.114c1.062.933 4.107 3.92 5.548 8.412-1.927.28-3.79.39-5.548.381V1.49zM8.594 15.37a15.655 15.655 0 0 1 .518-4.648c1.674.272 3.587.481 5.667.541v8.033a43.294 43.294 0 0 0-5.475.51 19.128 19.128 0 0 1-.71-4.437zm19.604 5.953l-.004-.002a34.27 34.27 0 0 0-5.776-1.504c.358-1.353.608-2.819.672-4.408a16.92 16.92 0 0 0-.475-4.707 34.146 34.146 0 0 0 5.58-1.465s.001-.002.003-.002a14.165 14.165 0 0 1 1.361 6.044c0 2.162-.497 4.206-1.36 6.044zM15.28 0C6.854 0 0 6.854 0 15.28c0 8.424 6.854 15.28 15.28 15.28 8.425 0 15.28-6.856 15.28-15.28C30.56 6.853 23.704 0 15.28 0z"></path>
                    </svg>
                    <h3 class="md-cm-upgrade-advantage__title" style="margin: 0px 0px 0.83333rem; padding: 0px; line-height: 1.25; font-weight: 700; font-size: 1.41667rem;">Dominio &amp; e-mail</h3>
                    <p class="md-cm-upgrade-advantage__text" style="margin: 0px; padding: 0px;">
                        Con nuestras versiones de pago puedes conectar tu dominio profesional con tu página web así como crear una dirección de email asociada a tu dominio.</p>
                </div>
                  <div class="col-md-6">   
                      <svg id="graph2-icon" class="md-cm-upgrade-advantage__icon" height="100" style="enable-background:new 0 0 100 100;" viewbox="0 0 100 100" width="100" x="0" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" y="0">
                        <path d="M89.7,25.8L89.7,25.8c-0.8-4-4.7-6.7-8.8-5.9c-4,0.8-6.7,4.8-5.9,8.8c0.3,1.5,1.1,2.8,2.1,3.9l-12,15.6
                                	c-0.3-0.2-0.5-0.5-0.9-0.7c-1.7-1.1-3.7-1.5-5.6-1.1c-2.7,0.6-4.8,2.6-5.6,5.1L42.9,48c0-0.5,0-1.1-0.1-1.6c-0.8-4-4.7-6.7-8.8-5.9
                                	c-4,0.8-6.7,4.8-5.9,8.8c0.3,1.3,0.9,2.4,1.7,3.4l-9.5,15c-1.3-0.5-2.6-0.6-4-0.3c-4,0.8-6.7,4.8-5.8,8.8c0.7,3.7,4,6.2,7.7,6
                                	c0.4,0,0.7-0.1,1.1-0.1c4-0.8,6.7-4.8,5.9-8.8c0,0,0,0,0,0c-0.3-1.7-1.3-3.1-2.5-4.2l9.3-14.7c1.2,0.7,2.6,1,3.9,0.9
                                	c0.4,0,0.8-0.1,1.1-0.1c2-0.4,3.6-1.5,4.7-3.2c0.3-0.5,0.5-1,0.7-1.5l10,3.3c0.1,0,0.3,0.1,0.4,0.1c0,0.4,0,0.8,0.1,1.2
                                	c0.7,3.7,4,6.2,7.7,6c0.4,0,0.8-0.1,1.1-0.1c2-0.4,3.6-1.5,4.7-3.2c1.1-1.7,1.5-3.7,1.1-5.6c0,0,0,0,0,0c-0.1-0.7-0.4-1.3-0.7-1.9
                                	L79.3,34c1,0.5,2.2,0.7,3.4,0.7c0.4,0,0.7-0.1,1.1-0.1C87.8,33.7,90.5,29.8,89.7,25.8z M18.6,79.6c-2.6,0.5-5.2-1.2-5.7-3.8
                                	c-0.5-2.6,1.2-5.2,3.8-5.7c0.2,0,0.5-0.1,0.7-0.1c0.9,0,1.8,0.2,2.5,0.6c0,0,0,0,0,0c0,0,0,0,0,0c1.2,0.7,2.1,1.8,2.4,3.3
                                	C23,76.5,21.2,79,18.6,79.6z M36.4,52.7c-2.6,0.5-5.2-1.2-5.7-3.8c-0.5-2.6,1.2-5.2,3.8-5.7c0.2,0,0.5-0.1,0.7-0.1
                                	c2.4-0.1,4.5,1.5,5,3.9c0,0,0,0,0,0C40.7,49.6,39,52.2,36.4,52.7z M61.2,58.4c-2.6,0.5-5.2-1.2-5.7-3.8c-0.5-2.6,1.2-5.2,3.8-5.7
                                	c0.2,0,0.5-0.1,0.7-0.1c2.4-0.1,4.5,1.5,5,3.9C65.5,55.3,63.8,57.9,61.2,58.4z M83.3,32c-2.6,0.5-5.2-1.2-5.7-3.8
                                	c-0.5-2.6,1.2-5.2,3.8-5.7c0.2,0,0.5-0.1,0.7-0.1c2.4-0.1,4.5,1.5,5,3.9C87.6,28.9,85.9,31.5,83.3,32z"></path>
                    </svg>
                    <h3 class="md-cm-upgrade-advantage__title" style="margin: 0px 0px 0.83333rem; padding: 0px; line-height: 1.25; font-weight: 700; font-size: 1.41667rem;">SEO</h3>
                    <p class="md-cm-upgrade-advantage__text" style="margin: 0px; padding: 0px;">
                        Nuestras herramientas SEO te ayudan a posicionar tu página en Google para conseguir más visitantes. Comprueba los resultados con las estadísticas de tu web.</p>
                </div>
              <div class="col-md-3">
                 <svg id="three-faces-icon" class="md-cm-upgrade-advantage__icon" height="100" viewbox="0 0 32 21" width="100" xmlns="http://www.w3.org/2000/svg">
                        <g fill="#000" fill-rule="evenodd"><path d="M15.66 1a6.423 6.423 0 0 0-6.416 6.415 6.423 6.423 0 0 0 6.415 6.416 6.423 6.423 0 0 0 6.416-6.416A6.423 6.423 0 0 0 15.66 1m0 13.831c-4.089 0-7.415-3.327-7.415-7.416S11.57 0 15.66 0c4.09 0 7.416 3.326 7.416 7.415 0 4.09-3.327 7.416-7.416 7.416"></path><path d="M13.208 5.96a.666.666 0 1 0 1.332 0 .666.666 0 0 0-1.332 0M16.686 5.96a.666.666 0 1 0 1.332 0 .666.666 0 0 0-1.332 0M15.619 10.947a3.933 3.933 0 0 1-3.44-2.028.5.5 0 0 1 .875-.485 2.933 2.933 0 0 0 5.12.018.5.5 0 1 1 .871.491 3.938 3.938 0 0 1-3.426 2.004M6.886 10.635A5.222 5.222 0 0 1 1.67 5.419 5.222 5.222 0 0 1 6.886.202c1.648 0 3.218.793 4.199 2.12a.5.5 0 0 1-.805.595 4.234 4.234 0 0 0-3.394-1.715A4.221 4.221 0 0 0 2.67 5.419a4.221 4.221 0 0 0 6.19 3.727.496.496 0 0 1 .675.207.499.499 0 0 1-.207.676 5.22 5.22 0 0 1-2.442.606"></path><path d="M6.858 7.986a2.842 2.842 0 0 1-2.485-1.465.501.501 0 0 1 .875-.484 1.843 1.843 0 0 0 3.034.274.5.5 0 1 1 .774.633 2.83 2.83 0 0 1-2.198 1.042"></path><g transform="translate(2 12.001)"><path d="M25.502 9H1.112a.5.5 0 0 1-.447-.725C2.565 4.502 5.11 1.691 8.029.146a.5.5 0 1 1 .468.884C5.95 2.378 3.695 4.78 1.939 8h22.736c-1.69-3.096-3.846-5.442-6.273-6.814a.5.5 0 0 1 .492-.87c2.786 1.574 5.225 4.327 7.055 7.96a.503.503 0 0 1-.447.724"></path></g><g transform="translate(0 9.001)"><path d="M.5 5.451a.5.5 0 0 1-.435-.747C1.305 2.514 3.085.995 5.078.432a.5.5 0 0 1 .272.962C3.614 1.886 2.046 3.236.936 5.198a.501.501 0 0 1-.436.253"></path></g><path d="M24.351 10.635a5.162 5.162 0 0 1-2.227-.498.5.5 0 0 1 .428-.904 4.221 4.221 0 0 0 6.015-3.814 4.221 4.221 0 0 0-4.216-4.217 4.204 4.204 0 0 0-3.269 1.554.5.5 0 1 1-.775-.632A5.2 5.2 0 0 1 24.351.202a5.222 5.222 0 0 1 5.216 5.217 5.222 5.222 0 0 1-5.216 5.216"></path><path d="M24.38 7.986a2.827 2.827 0 0 1-2.195-1.038.499.499 0 1 1 .772-.634 1.842 1.842 0 0 0 3.032-.277.501.501 0 0 1 .875.484 2.843 2.843 0 0 1-2.485 1.465"></path><g transform="translate(25 9.001)"><path d="M5.738 5.33a.5.5 0 0 1-.436-.255C4.187 3.105 2.677 1.795.935 1.286a.501.501 0 0 1 .28-.96c1.998.583 3.71 2.055 4.958 4.257a.5.5 0 0 1-.435.746"></path></g><path d="M4.94 4.286a.666.666 0 1 0 1.33 0 .666.666 0 0 0-1.33 0M7.752 4.286a.666.666 0 1 0 1.331 0 .666.666 0 0 0-1.331 0M26.298 4.286a.666.666 0 1 1-1.331 0 .666.666 0 0 1 1.331 0M23.486 4.286a.666.666 0 1 1-1.332 0 .666.666 0 0 1 1.332 0"></path></g>
                    </svg>
                    <h3 class="md-cm-upgrade-advantage__title" style="margin: 0px 0px 0.83333rem; padding: 0px; line-height: 1.25; font-weight: 700; font-size: 1.41667rem;">Soporte</h3>
                    <p class="md-cm-upgrade-advantage__text" style="margin: 0px; padding: 0px;">
                        Cuando tienes dudas relacionadas con la creación de tu página web, el experimentado equipo de soporte de ZetaPitu con mucho gusto te ayuda a resolverlas.</p>
                </div>
               <div class="col-md-3">   
                   <svg id="screen-with-smiley-icon" class="md-cm-upgrade-advantage__icon" height="100" viewbox="0 0 100 100" width="100" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="42.7" cy="37.2" r="2.5"></circle><circle cx="56.5" cy="37.2" r="2.5"></circle><path d="M49.6 55.5c5.1 0 9.9-2.8 12.4-7.3.3-.6.1-1.3-.5-1.6-.6-.3-1.3-.1-1.6.5-2.1 3.7-6.1 6.1-10.4 6.1-4.3 0-8.3-2.3-10.4-6.1-.3-.6-1-.8-1.6-.5-.6.3-.8 1-.5 1.6 2.7 4.5 7.4 7.3 12.6 7.3z"></path><path d="M81.6 23.9H18.4c-.7 0-1.2.5-1.2 1.2V64c0 .7.5 1.2 1.2 1.2h63.3c.7 0 1.2-.5 1.2-1.2V25.1c-.1-.7-.6-1.2-1.3-1.2zm-1.1 38.9h-61V26.2h60.9v36.6z"></path><path d="M82.7 17.9H17.3c-3.3 0-5.9 2.7-5.9 5.9v41.4c0 3.3 2.7 5.9 5.9 5.9h21.8v3.1h-1.8c-1.4 0-2.5 1.1-2.5 2.5v2.9c0 1.4 1.1 2.5 2.5 2.5h25.5c1.4 0 2.5-1.1 2.5-2.5v-2.9c0-1.4-1.1-2.5-2.5-2.5H61v-3.1h21.8c3.3 0 5.9-2.7 5.9-5.9V23.8c-.1-3.2-2.7-5.9-6-5.9zM62.9 76.7v2.9c0 .1-.1.1-.1.1l-25.6-.1.1-3.1 25.6.2zm-4.3-2.5H41.4v-3.1h17.1v3.1zm27.7-9c0 2-1.6 3.5-3.5 3.5H17.3c-2 0-3.5-1.6-3.5-3.5V23.8c0-2 1.6-3.5 3.5-3.5h65.5c2 0 3.5 1.6 3.5 3.5v41.4z"></path>
                    </svg>
                    <h3 class="md-cm-upgrade-advantage__title" style="margin: 0px 0px 0.83333rem; padding: 0px; line-height: 1.25; font-weight: 700; font-size: 1.41667rem;">Sin publicidad</h3>
                    <p class="md-cm-upgrade-advantage__text" style="margin: 0px; padding: 0px;">
                        Sabemos que lo más importante en tu página web son tus contenidos. Por este motivo, puedes crearla de forma que no aparezca ninguna publicidad de ZetaPitu.</p>
                </div>
            </div>
        
        </div>

  
</div>
        <section>
           <div class="container" style="text-align: center">
  <h2 style="text-align: center;  padding:50px;">Tenemos mas de 1000 temas </h2>

  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="https://ziw.es/images/wm1.jpg" target="_blank">
          <img src="images/wm1.jpg" alt="Lights">
          <div class="caption">
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="https://ziw.es/images/wm2.jpg" target="_blank">
          <img src="images/wm2.jpg" alt="Nature">
          <div class="caption">
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="https://ziw.es/images/wm3.jpg" target="_blank">
          <img src="images/wm3.jpg" alt="Fjords">
          <div class="caption">
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="images/tema1.jpg" target="_blank">
          <img src="images/tema1.jpg" alt="Lights">
          <div class="caption">
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="images/tema2.jpg" target="_blank">
          <img src="images/tema2.jpg" alt="Nature">
          <div class="caption">
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="images/tema3.jpg" target="_blank">
          <img src="images/tema3.jpg" alt="Fjords">
          <div class="caption">
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="images/tema4.jpg" target="_blank">
          <img src="images/tema4.jpg" alt="Lights">
          <div class="caption">
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="images/tema5.jpg" target="_blank">
          <img src="images/tema5.jpg" alt="Nature">
          <div class="caption">
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="images/tema6.jpg" target="_blank">
          <img src="images/tema6.jpg" alt="Fjords">
          <div class="caption">
          </div>
        </a>
      </div>
    </div>
  </div>


</div>

        </section>

    </section>
    <footer>

        <div class="container" style="text-align: center">
            <div class="row">
                <div class="col-md-4">
                    <h1>Redes sociales</h1>
                    <p><a href="https://www.facebook.com/zetapitu" target="_blank">
                        <img class="icon-pie" src="images/iconos/facebook.png" /></a></p>
                    <p><a href="https://twitter.com/zetapitu" target="_blank">
                        <img class="icon-pie" src="images/iconos/gorjeo.png" /></a></p>
                    <p><a href="https://www.linkedin.com/in/zetapitu/" target="_blank">
                        <img class="icon-pie" src="images/iconos/linkedin.png" /></a></p>
                    <p>Recuerda somos una entidad benefica</p>


                </div>
                <div class="col-md-4">
                    <h1></h1>
                    <div id="fb-root">
                        <div class="fb-share-button" data-href="https://ziw.es" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fziw.es%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
                    </div>
                    <img src="images/base64.png" />

                </div>
                <div class="col-md-4">
                    <h1>Contacto</h1>
                    <p>📧 info@ziw.es</p>
                    <p>📞 +34 663 56 60 29</p>
                    <p><a style="color:black" href="https://zpitu.es/Servicios/index.html">Web de ZetaPitu</a></p>
                    <p><a style="color:black" href="#">Volver a inicio</a></p>
                    <a name="contacto">
                </div>
                 
            </div>



            <p style="text-align: center">ZetaPitu ©  2019</p>
        </div>
    </footer>

<!-- modal -->

<div class="modal fade" id="crearweb" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content form-web">
        <div class="modal-header">
      <h2>Datos para administrar su web</h2>
        </div>
        <div class="modal-body">

      <form id="form1" style="text-align:center" method="post"  action="php/dns.php" onsubmit="return validarform(this)" target="_blank">  
      <div>
      Su nombre:<br> <input type="text" name="nombre" required="required">
     <br>
  E-mail:<br> <input type="email" name="email" required="required">
  <br>
  Contraseña:<br> <input type="password" name="contra" required="required">
  <br>
  Repite Contraseña:<br> <input type="password" name="contra1" required="required">
  <br>
  <h1> Su web es</h1>
  <textarea id="info" style="width:100%;overflow:hidden; font-weight: 600; font-size: x-large;" disabled="disabled" readonly="readonly"></textarea>
<p>Recuerde estos datos y contraseñas Se le pedira para poder modificar la web. Solo se puede tener un dominio por cada e-mail</p>
        
        </div>
        <div class="modal-footer">
          <button id="crearwebfinal" class="btn btn-danger normal">Crear web</button>
          <button id="cerrar-crearweb" type="button" class="btn btn-danger normal" data-dismiss="modal">Close</button>
        </div>
    <img src="images/base64.png" style="width:80%"/>

    </form>
            </div>
          </div>
        </div>
    </div>

 <div class="modal fade" id="ayudame" role="dialog">
        <div class="modal-dialog">
            <div>Ayudame</div>
        </div>
    </div>

      <button id="mensajesboton" style="display:none" type="button" class="btn btn-danger normal" data-toggle="modal" data-target="#mensajes">Crear web</button>
      <div class="modal fade" id="mensajes" role="dialog" style="z-index:33333333;">
          <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content form-web-1">
                  <div class="modal-header">
                      <h2 id="mensaje-titulo">Datos para administrar su web</h2>
                      <img src="images/base674.png" style="width:20%" />                      
                  </div>
                  <div class="modal-body">
                      <h5 id="contenido-mensaje"></h5>
                    
                  </div>
                  <div class="modal-footer">
                      <button id="boton-mensaje" class="btn btn-danger normal" data-dismiss="modal">Crear web</button>
                  </div>



              </div>
          </div>

      </div> 
       <div id="cookies-ziw" style="position:fixed;top:0;left:0;z-index:9999999999;background-color:#0094ff;color:#ffffff;display:none">
          Utilizamos cookies propias y de terceros para obtener datos estadísticos de la navegación de nuestros usuarios y
          mejorar nuestros servicios. Si acepta o continúa navegando, consideramos que acepta su uso. Puede cambiar la configuración
           u obtener más información aquí &nbsp;&nbsp;
          <a style="color:burlywood" href="https://ziw.es/privacidad.html" target="_blank">Cookies</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <button onclick="cerrarcookies()" style="background-color:#ff0000;color:blanchedalmond"> Aceptar</button>

      </div> 
<!--Script-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"> </script>
      <script src="script/inicio.js"></script>
      <script src="https://zpt.es/script/pirata.js"></script>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v5.0&appId=201350997125108&autoLogAppEvents=1"></script>
 
</body>
</html>