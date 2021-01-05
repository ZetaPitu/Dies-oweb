<?php
 session_start();
 require_once  "define.php";
 require_once  'include/datos.php';


// mkdir(TEMASORIGEN."/temasprueba", 0777, true);
 $sitioweb =  $_REQUEST['sitioweb'];


// echo TEMASORIGEN."..... ".TEMASDESTINO.$sitioweb;
// echo "......".$sitioweb;
// recurse_delete_dir(TEMASORIGEN,TEMASDESTINO.$sitioweb);
// exit;
$Cabecera="";
 $contenido = $_REQUEST['contenido'];
 $id = $_REQUEST['id'];



 $dat=new ziw;
 $dat1=$dat->autentificar();





   switch($id){
   case "1":
       if(!$dat1){
           echo chr(10). $dat1."  No tiene permiso para modificar en esta web Acceso denegado";
       }else{


           publicar($sitioweb);
       }
   break;
   case "2":
       if(!$dat1){
           echo chr(10). $dat1."  No tiene permiso para modificar en esta web Acceso denegado";
       }elseif (!empty($contenido)){

      //   $html1=explode("<head>", $contenido);
       //    echo " ".$html1;
           $pos = strpos($contenido,"</head>");
           if($pos > 0){
               echo "No ha hecho ningun cambio ". $pos;
               break;
           }
           $head=leer_head();
           write_html(htmlspecialchars_decode($head.$contenido).chr(10)."</body>".chr(10)."</html>");
           publicar($sitioweb);
       }
       else echo "Error al escribir borrador" ;
       break;
     default:
      break;


    }
  function recurse_delete_dir ($src,$dest){
      $carpeta=$dest;
      if (!file_exists($dest)) {

          mkdir($carpeta, 0777, true);
          mkdir($carpeta."/temas", 0777, true);
          mkdir($carpeta."/temas/001", 0777, true);
          mkdir($carpeta."/temas/002", 0777, true);
          mkdir($carpeta."/temas/003", 0777, true);
          mkdir($carpeta."/temas/004", 0777, true);
          mkdir($carpeta."/pluggin", 0777, true);

      }
      else{
          echo " ya existe ".$carpeta;
      }

      copy($src."/tema1.php",$carpeta."/index.php");
      $ruta=$src.'/';
      $archivos= glob($ruta.'*.*');
      foreach ($archivos as $archivo){
       $archivo_copiar= str_replace($ruta, $carpeta.'/', $archivo);
           copy($archivo, $archivo_copiar);
      }

  }

function leer_html($dom,$tema){
      $dominio=$dom;
      $ruta="../subdominio/".$dominio.$tema;
  //    $texto = file_get_contents($ruta);
  //    echo $texto;
  //    return;
      $ruta="../subdominio/".$dominio.$tema;
      $myfile = fopen($ruta, "r+");
      if($myfile===false){
          $myfile = fopen("../subdominio/".PAGINA404, "r+");
          if($myfile===false){
              echo $tema ,"jjuan";
              echo  $dominio. "<h1> Texto de Prueba</h1>";
          }
          else{
              $html=fread($myfile,filesize("../subdominio/".PAGINA404));
              fclose($myfile);
              echo htmlspecialchars_decode( $html);
          }
      }
      else{
      $html=fread($myfile,filesize($ruta));
      fclose($myfile);
      echo htmlspecialchars_decode( $html);
      }
      return;
}


function leer_head(){

$sitioweb =  $_REQUEST['sitioweb'];

$ruta="../subdominio/".$sitioweb.TEMA;
//echo $ruta;exit;
$myfile = fopen($ruta, "r+") or die("No se pudo leer head ! ".$ruta);
$html=fread($myfile,filesize($ruta));
fclose($myfile);
$htm= strstr(htmlspecialchars_decode($html),'</head>',true);
return htmlspecialchars_decode($htm).'</head>'.chr(10)."<body>".chr(10).chr(10)."   ";
}
function write_html($html="Nada"){

$sitioweb =  $_REQUEST['sitioweb'];
$ruta="../subdominio/".$sitioweb.BORRADOR;
$myfile = fopen($ruta, "w") or die("No se pudo leer contenido!" .$ruta);

fwrite($myfile,htmlspecialchars_decode($html));
fclose($myfile);
}
function publicar($web){

      $original="../subdominio/".$web.ORIGEN;
      $borrador="../subdominio/".$web.BORRADOR;
      $copia="../subdominio/".$web.COPIA;


      echo $original.chr(10);
      echo $borrador.chr(10);
      echo $copia.chr(10);

      if(copy($original,$copia)) echo  "Se publico copia .>".COPIA.chr(10) ;else{ echo "Error: No se creo copia ni se publico";return;}
      if(copy($borrador,$original)) echo  "Se publico web .>".ORIGEN.chr(10) ;else{ echo "Error: Se creo copia pero no se publico";return;}

     exit;

      if(copy($ruta,$temaactivo)) echo  "Se modifico tema activo".chr(10) ;else echo "Error: No se modifico tema activo".chr(10);
      if(copy($ruta,$carpeta)) echo  "Publicacion correcta ";else echo "Error: No se publico";

 /*   $myfile = fopen("../temas/tmp/tema1copy.php", "r") or die("Unable to open file! original");
    $html=fread($myfile,filesize("../temas/tmp/tema1copy.php"));
    fclose($myfile);
    $myfile = fopen("../../subdominio/".$web."/index.php", "w") or die("Unable to open final!");
    fwrite($myfile, $html);
    fclose($myfile);*/


      return true;
}


?>
