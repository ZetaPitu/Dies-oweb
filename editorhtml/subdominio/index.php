<?php
//https://yyyy.ziw.es/temas/001/assets/css/main.css
session_start();
//$_SERVER["REQUEST_URI"]="/pruebas";
 $dir= $_SERVER["HTTP_HOST"];
 $sito= $_SERVER["REQUEST_URI"];

 $extension = pathinfo($dir.$sito, PATHINFO_EXTENSION);
// subdominio;
 if(include $dir."/php/funciones.php"){

     if($sito==="/" || $extension==="original") {

        // echo  $dir."/inicio.html";
                        echo  file_get_contents($dir."/inicio.html");
              }

              else{

                   if($extension==="prueba"){

                       echo file_get_contents($dir."/zpitu/borrador.php");
                       exit;
                   }
               if($sito==="/editor"){
                       $extension1 = explode('.', $dir);
                       $asd= $extension1[1].".".$extension1[2];
                       echo  '<script>'.
                       'window.location = "https://'.$asd.'/editorhtml/index.php";'.
                       '</script>';
                       exit;
                   }
                   if(!file_exists($dir.$sito)){

                       if(file_exists($dir.$sito.".html")){
                           $borrador=file_get_contents($dir.$sito.".html");
                       }
                       elseif(file_exists($dir.$sito.".php")){
                           $borrador=file_get_contents($dir.$sito.".php");
                       }
                       else{
                           if($extension==='css') $borrador=file_get_contents("error/costum.css");
                           elseif($extension==='js') $borrador=file_get_contents("error/costum.js");
                           else $borrador=file_get_contents("error/404.php");
                       }

                   }
               else{
                       $borrador=file_get_contents($dir.$sito);
                   }
                        echo $borrador;
                   }
              }

 else{

     $borrador=file_get_contents("error/404.php");
     echo $borrador;
     //exit;
  }



?>
