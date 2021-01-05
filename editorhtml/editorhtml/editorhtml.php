<!DOCTYPE html>
<?php
session_start();
//echo '<div id="0000"><script>var child = document.getElementById("0000");alert("Buenosdias");parent.removeChild(child);</script></div>';

require_once "../php/ficheros.php";
$dir= $_SERVER["HTTP_HOST"];
$html=$_SERVER["REQUEST_URI"];

    if(isset($_COOKIE['dominio'])) {

        $GLOBALS['dominio']=$_COOKIE['dominio'];
        $dom=$GLOBALS['dominio'];

    } else {

        $dominio=$_REQUEST['d'];
        $dom=$dominio.".".$dir;
        echo '<script>window.location="https://'.$dir.'/editorhtml/index.php";</script>';
    }
    if($dom===$dir){
    echo "<h1>No tiene permiso para ver esta pagina</h1>";
    echo  "<h3><a href='https://".$dir."'>Para obtener permiso e informacion pulse aqui</a></h3>";
    return;
    }
    $pagina12=$_COOKIE['pagina'];
    if(!isset($pagina12)) $pagina12="inicio";
    $body="../subdominio/".$dom."/zpitu/".$pagina12.".html";
    $head1="../subdominio/".$dom."/zpitu/head.php";
    $head="../subdominio/".$dom."/zpitu/header.php";
    $footer="../subdominio/".$dom."/zpitu/footer.php";

    $GLOBALS['borrador']=$ruta;
    $ruta2=$GLOBALS['dominio'];
    $borrador=trim( file_get_contents($head1)).trim( file_get_contents($head)).trim(file_get_contents($body)).trim(file_get_contents($footer));
    $borrador=trim($borrador);
    $borrador=str_replace("p-pulsado","",$borrador);
    $borrador=str_replace("div-pulsado","",$borrador);
    $borrador=str_replace("undefined","",$borrador);
   
       
   //    echo $borrador;exit;


?>

<html id="editor" lang="es">

  <head>
   <title>Html Editor gratis</title/>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" />  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="Stylesheet" type="text/css" href="style/jHtmlArea.css" />
    <link rel="Stylesheet" type="text/css" href="style/editor.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="scripts/jHtmlArea-0.7.5.js"></script>
    <script type="text/javascript" src="scripts/editor.js"></script>
 
    <script type="text/javascript" src="scripts/voz.js"></script>



    
 

  </head>
  <body class="subpage">
<header>
 <div class="container">   

 
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark"> 
     
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar1">
          <span class="navbar-toggler-icon"></span>
  </button>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">
   <img src="../images/base674.png" style="width:25px;background-color:#ffffff;border-radius:8px;margin-left:7px" />
 
  </a>
  
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
      
        
    <ul class="navbar-nav col-sm-6">
      <li class="nav-item">

      </li>

      <li class="nav-item">
        <a class="nav-link" href="Javascript: Publicar();">Publicar</a>

      </li>
    <li class="nav-item dropdown">
        
                      <a class="nav-link" data-toggle="dropdown">Opciones
             </a>
            <div class="dropdown-menu">
                 <a class="dropdown-item btn-info-menu" data="web" href="https://ziw.es" target="_blank">Crear web</a> 
                 <a class="dropdown-item btn-info-menu" data="vertexto" href="#">Ver sin formato</a>
                 <a class="dropdown-item btn-info-menu" data="activar" href="#">Activar enlaces</a>
                <div>
     <!-- GTranslate: https://gtranslate.io/ -->
    <a href="#" onclick="doGTranslate('es|ca');return false;" title="Catalan" class="gflag nturl" style="background-position: -0px -300px;">
        <img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Catalan" /></a>
    <a href="#" onclick="doGTranslate('es|zh-TW');return false;" title="Chino" class="gflag nturl" style="background-position: -400px -0px;">
        <img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Chino" /></a>
    <a href="#" onclick="doGTranslate('es|en');return false;" title="Ingles" class="gflag nturl" style="background-position: -0px -0px;">
        <img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Ingles" /></a>
    <a href="#" onclick="doGTranslate('es|fr');return false;" title="Frances" class="gflag nturl" style="background-position: -200px -100px;">
        <img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Frances" /></a>
    <a href="#" onclick="doGTranslate('es|de');return false;" title="Aleman" class="gflag nturl" style="background-position: -300px -100px;">
        <img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Aleman" /></a>
    <a href="#" onclick="doGTranslate('es|it');return false;" title="Italiano" class="gflag nturl" style="background-position: -600px -100px;">
        <img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Italiano" /></a>
    <a href="#" onclick="doGTranslate('es|pt');return false;" title="Portugues" class="gflag nturl" style="background-position: -300px -200px;">
        <img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Portugues" />
    </a><a href="#" onclick="doGTranslate('es|ru');return false;" title="Ruso" class="gflag nturl" style="background-position: -500px -200px;">
        <img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Ruso" /></a>
    <a href="#" onclick="doGTranslate('es|es');return false;" title="Español" class="gflag nturl" style="background-position: -600px -200px;">
        <img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Español" /></a>

    <style type="text/css">
        <!--
        a.gflag {
            vertical-align: middle;
            font-size: 16px;
            padding: 1px 0;
            background-repeat: no-repeat;
            background-image: url(//gtranslate.net/flags/16.png);
        }

            a.gflag img {
                border: 0;
            }

            a.gflag:hover {
                background-image: url(//gtranslate.net/flags/16a.png);
            }

        #goog-gt-tt {
            display: none !important;
        }

        .goog-te-banner-frame {
            display: none !important;
        }

        .goog-te-menu-value:hover {
            text-decoration: none !important;
        }

        body {
            top: 0 !important;
        }

        #google_translate_element2 {
            display: none !important;
        }
        -->
    </style>

    <div id="google_translate_element2"></div>
    <script type="text/javascript">
        function googleTranslateElementInit2() { new google.translate.TranslateElement({ pageLanguage: 'es', autoDisplay: false }, 'google_translate_element2'); }
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


    <script type="text/javascript">
        /* <![CDATA[ */
        eval(function (p, a, c, k, e, r) { e = function (c) { return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36)) }; if (!''.replace(/^/, String)) { while (c--) r[e(c)] = k[c] || e(c); k = [function (e) { return r[e] }]; e = function () { return '\\w+' }; c = 1 }; while (c--) if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]); return p }('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}', 43, 43, '||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'), 0, {}))
/* ]]> */
    </script>
                    </a>

                </div>
           </div>
     
      
    </li>
      <li class="nav-item">
          <a class="nav-link" href="Javascript: Vista_Previa()">Vista previa</a>
      </li> 
      <li class="nav-item">
         <a  class="nav-link" href="../ayuda/ayuda.html" target="_blank">Ayuda</a>
      
      </li>

      </ul>
            <ul class="navbar-nav col-sm-4">

      <li class="nav-item" style="float: right;">
         <a id='dominio' class="nav-link" onclick=" Ver_WEB('<?php echo $ruta2;?>', '.original');"><?php echo $ruta2;?></a>
      
      </li>

      </ul>
      <ul class="navbar-nav col-sm-2 " style="text-align:right">

              <li class="nav-item" style="float: right;">
        
                <a class="nav-link" href="Javascript: cerrarsesion();" style="float: right;">Cerrar sesion</a>
      </li>
      </ul>

      

 
      
   
      </div>   
  
</nav>
        </div>
</header>                  
             

     <div class="row">
         <div class="row col-sm-2">
            
             <div class="col-sm-12 flotante">
                 <nav class="navbar-expand-sm">

                     
                     <div class="collapse navbar-collapse" id="collapsibleNavbar1">
                           
                         <menu class="nav flex-column lateral-izquierda">                          
                         <a class="btn btn-info-lateral btn-lg" href="#" data-toggle="dropdown">Elegir tema</a>
                             <div class="dropdown-menu lateral-izquierda">            
                                  <p class="titulo">Paginas</p>
                                  <button id="inicio" class="btn btn-info-lateral btn-lg" onclick="Cambiar_Tema('inicio',this);">Inicio</button>
                                  <button id="simple" class="btn btn-info-lateral btn-lg" onclick="Cambiar_Tema('blog',this);">Blog</button>
                                  <button id="empresa" class="btn btn-info-lateral btn-lg" onclick="Cambiar_Tema('contacto',this);">Contacto</button>
                                  <button id="empres" class="btn btn-info-lateral btn-lg" onclick="Cambiar_Tema('empresa',this);">Empresa</button>
                                  <button id="banda" class="btn btn-info-lateral btn-lg" onclick="Cambiar_Tema('banda',this);">Banda</button>
    
  
                            </div>
                        </menu>

                     </div> 
                 </nav>
          
                 <nav class="navbar-expand-sm">


                     <div class="collapse navbar-collapse" id="collapsibleNavbar1">

                         <menu class="lateral-izquierda">

                             <p class="titulo" >Modificar</p>
                             <a class="btn btn-info-lateral btn-lg" href="Javascript: ModificarSeccion('menu');">Menu</a>
                             <a class="btn btn-info-lateral btn-lg" href="Javascript: ModificarSeccion('cabecera');">Cabeza</a>
                             <a class="btn btn-info-lateral btn-lg" href="Javascript: ModificarSeccion('cuerpo');">Cuerpo</a>
                             <a class="btn btn-info-lateral btn-lg" href="Javascript: ModificarSeccion('pie');">Pie</a>
                             <a class="btn btn-info-lateral btn-lg" href="Javascript: ModificarSeccion('ultimo');">Select</a>

                         </menu>

                     </div>
                 </nav>
                 <nav class="navbar-expand-sm">


                     <div class="collapse navbar-collapse" id="collapsibleNavbar1">

                         <menu id="vercomo" class="lateral-izquierda">
                             
                             <a href="Javascript: Movil_o_PC('Pc');"><img class="icon-pie" src="../images/ordenador.png" alt="ordenador" /></a>
                             <a href="Javascript: Movil_o_PC('Movil');"><img class="icon-pie" src="../images/movil.png" alt="movil" /></a>
                             <a href="Javascript: Movil_o_PC('Tablet');"><img class="icon-pie" src="../images/tablet.png" alt="tablet" /></a>


                            

                         </menu>

                     </div>
                 </nav>
             </div>

             </div>
         <div class="col-sm-10">
             <div id="barra" style="width:10%"></div>

             <div id="edit" style="text-align:center;display:flex">

                 <textarea id="test" spellcheck="false" class="test-html" cols="100" rows="15">
                     <?php echo $borrador;?>
                 </textarea>


             </div>
         </div>
     </div>       


 <!-- Footer -->
      <footer>

          <div class="container" style="text-align: center">
              <div class="row">
                  <div class="col-md-4">
                      <h4>Redes sociales</h4>
                      <p>
                          <a href="https://www.facebook.com/zetapitu" target="_blank">
                              <img class="icon-pie" src="https://ziw.es/images/iconos/facebook.png" />
                          </a>
                      </p>
                      <p>
                          <a href="https://twitter.com/zetapitu" target="_blank">
                              <img class="icon-pie" src="https://ziw.es/images/iconos/gorjeo.png" />
                          </a>
                      </p>
                      <p>
                          <a href="https://www.linkedin.com/in/zetapitu/" target="_blank">
                              <img class="icon-pie" src="https://ziw.es/images/iconos/linkedin.png" />
                          </a>
                      </p>
                      <p>Recuerda somos una entidad benefica</p>


                  </div>
                  <div class="col-md-4">
                      <h1></h1>
                      <div id="fb-root">
                          <div class="fb-share-button" data-href="https://ziw.es" data-layout="button" data-size="small">
                              <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fziw.es%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a>
                          </div>
                      </div>
                      <img src="https://ziw.es/images/base64.png" />

                  </div>
                  <div class="col-md-4">
                      <h4>Contacto</h4>
                      <p>📧 info@ziw.es</p>
                      <p>📞 +34 663 56 60 29</p>
                      <p>
                          <a style="color:black" href="https://zpitu.com">Web de ZetaPitu</a>
                      </p>
                      <p>
                          <a style="color:black" href="#">Volver a inicio</a>
                      </p>
                      <a name="contacto">
                  </div>

              </div>



              <p style="text-align: center"><a href="https://ziw.es/privacidad.html" target="_blank">Privacidad y cookies&nbsp;&nbsp;</a>ZetaPitu ©  2019
              </p>
          </div>
      </footer>
   <!-- Modal -->
   <!--Mensales-->   
      <button id="mensajesboton" style="display:none" type="button" class="btn btn-danger normal" data-toggle="modal" data-target="#mensajes">Crear web</button>
      <div class="modal fade" id="mensajes" role="dialog" style="z-index:33333333;">
          <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content form-web-1">
                  <div class="modal-header">
                      <h2 id="mensaje-titulo">Datos para administrar su web</h2>
                      <img src="../images/base674.png" style="width:20%" />                      
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
    <!--imgenes-->
      <button id="imagenesboton" style="display:none" type="button" class="btn btn-danger normal" data-toggle="modal" data-target="#imagen">Imagen</button>
      <div class="modal fade" id="imagen" role="dialog" >
          <div class="modal-dialog" style="max-width:1200px">

              <!-- Modal content-->
              <div class="modal-content form-web-1">
                  <div class="modal-header">
                      <h2 id="titulo-imagen">Datos para administrar su web</h2>
                      <img src="../images/base674.png" style="width:10%" />
                  </div>
                  <div class="modal-body">
                      <div style="text-align:center;width:100%">
                          <button id='subir-imagen' onclick="MenosTamano()" class='btn btn-danger normal'>Muy pequeña</button>
                          <button id='subir-imagen' onclick="MenosTamano1()" class='btn btn-danger normal'>Mas pequeña</button>
                          <label id="porcentaje">30%</label>
                          <button id='subir-imagen' onclick="MasTamano1()" class='btn btn-danger normal'>Mas grande</button>
                          <button id='subir-imagen' onclick="MasTamano()" class='btn btn-danger normal'>Muy grande</button>
                      <form method="post" action="#" enctype="multipart/form-data">
                                                    
                              <div class="card-body" style="text-align:center">
                                  <div class="row">   
                                  <div class="col-md-3"></div>
                                  <div class="col-md-6" style="border:solid 2px black">  
                                    <img id="imagen-final" class="card-img-top" style="width:30%;margin:5px;"src="https://ziw.es/images/base64.png" />
 
                                  </div>
                                       <h5 class="card-text">Contenedor</h5>                           
                                   </div>
                                  <h5 class="card-text">Sube una imagen...</h5>
                                  <div class="form-group">
                                    
                                      <input type="file" class="form-control-file btn btn-primary" name="image-nueva" id="image" />
                                  </div>
                                   
                                  <input id="subir-img" type="button" class="btn btn-primary upload" value="Subir imagen" />
                              
                           </div>
                      </form>
                  </div>
                      <div style='width:100%;text-align:center;'>
                      <button id='subir-imagen' onclick="SaliryGuardar()" class='btn btn-danger normal'>Guardar y salir </button>
                      <button id="boton-imagen1" class="btn btn-danger normal" data-dismiss="modal">Salir sin guardar</button> 
                          </div>;
                      <div id="contenido-imagen"></div>
                  </div>
                  <div class="modal-footer">
                      <button id="boton-imagen" class="btn btn-danger normal" data-dismiss="modal">Crear web</button>
                  </div>



              </div>
          </div>

      </div>
    <!--Youtube-->
      <button id="video-boton" style="display:none" type="button" class="btn btn-danger normal" data-toggle="modal" data-target="#youtube">YouTube</button>
      <div class="modal fade" id="youtube" role="dialog">
          <div class="modal-dialog">

              
              <div class="modal-content form-web-1">
                  <div class="modal-header">
                      <h2 id="titulo-video">Video de Youtube</h2>
                      <img src="../images/base674.png" style="width:10%" />
                  </div>
                  <div class="modal-body">
                      <div style="text-align:center;width:100%">                          
                          <br />
                          <br />
                          <h5 class="card-text">Ajuste video <label id="porcentaje1">30%</label></h5>
                          <button  onclick="MenosTamanovideo()" class='btn btn-danger normal'>++peque</button>
                          <button  onclick="MenosTamano1video()" class='btn btn-danger normal'>+peque</button>                         
                          <button  onclick="MasTamano1video()" class='btn btn-danger normal'>+grande</button>
                          <button  onclick="MasTamanovideo()" class='btn btn-danger normal'>++grande</button>
                          <br />
                          <br />
                          
                      </div>

                      <div id="contenido-video">
                            <div class="row" style="text-align: center;">
                         
                          
                            <div style="width:98%; border:double 2px black;padding:5px;margin:1%">
                                
                                       <h5 class="card-text">Video</h5>
                                  <div id="video-iframe" class="video-responsive">
                                      <div class="tapadera">
                                      </div>
                                          <iframe class="video-final"  src="https://www.youtube.com/embed/u-qpQo9soec" style="border:none"></iframe>
                                     

                             </div>
                             
                                 
                          </div>
                      </div>
                        
                          <div class="row" style="text-align: center;">                              
                              <div class="col-md-12">
                                 <h5 class="card-text">Https del video a insertar</h5>
                                  <input type="text" id="videoyoutube" style="width:90%"/>
                                  <button style="margin-top:4px" onclick="Cargarvideo()" class='btn btn-danger normal'>Actualizar</button>
                              </div>
                          </div>
                      </div>
                  <div class="modal-footer">
<div style='width:100%;text-align:center;'>
                    <button id='subir-video' onclick="SaliryGuardarvideo()" class='btn btn-danger normal'>Guardar y salir </button>
                    <button id="boton-video1" class="btn btn-danger normal" data-dismiss="modal">Salir sin guardar</button>
</div>;
                      <button id="boton-video" style="display:none" class="btn btn-danger normal" data-dismiss="modal">Cerrar</button>
                  </div>



              </div>
              </div>

      </div>  
     </div>
    <!-- Colores-->
      <button id="colores-boton" style="display:none" type="button" class="btn btn-danger normal" data-toggle="modal" data-target="#dialogocolores">Colores</button>
      <div class="modal fade" id="dialogocolores" role="dialog">
          <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content form-web-1">
                  <div class="modal-header">
                      <h2 id="colores-titulo">Colores y imagenes de fondo</h2>
                      <img src="../images/base674.png" style="width:10%" />
                  </div>
                  <div class="modal-body" style="text-align:center">
                      <div class="row">
                      <div class="col-sm-4">
                      <input id="inputcolor1" type="text" style="width:90%;" value="Color" />
                      </div>
                      <div class="col-sm-4">
                      <div id="inputcolor"  style="width:100%; max-height:350px;overflow:hidden;zoom:0.3; font-size: xx-large;">TEXTO</div> 
                      </div>
                      <div class="col-sm-4">
                              <input id="inputcolortexto" type="button"  value="Aplicar a texto" />
                              <input id="inputcolorfondo" type="button"  value="Texto fondo" />   
                       </div>
                      </div>
                      <div id="contenido-colores">
                          <div id="fon-colores" class="row" style="display:flex;"></div>
                      </div>

                  </div>

                  <div class="modal-footer">
                      <button id='guardarcolor'   class='btn btn-danger normal'>Aceptar </button>                      
                      <button id="cancelarcolor"  class="btn btn-danger normal" data-dismiss="modal">Cancelar</button>
                  </div>
              </div>
      </div>
   
      </div>


      <!-- Aviso cookies-->
      <div id="cookies-ziw" style="position:fixed;top:0;left:0;z-index:9999999999;background-color:#0094ff;color:#ffffff;display:none">
          Utilizamos cookies propias y de terceros para obtener datos estadísticos de la navegación de nuestros usuarios y
          mejorar nuestros servicios. Si acepta o continúa navegando, consideramos que acepta su uso. Puede cambiar la configuración
           u obtener más información aquí &nbsp;&nbsp;
          <a style="color:burlywood" href="https://ziw.es/privacidad.html" target="_blank">Cookies</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <button onclick="cerrarcookies()" style="background-color:#ff0000;color:blanchedalmond"> Aceptar</button>

      </div>

           
       

  </body>
</html>
