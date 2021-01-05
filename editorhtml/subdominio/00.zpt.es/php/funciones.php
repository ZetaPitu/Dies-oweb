<?php
function MontarHtml($pag,$tema='index.php'){
    $cad="<!DOCTYPE html><html>".
            Leer_Head()."<body>".
            Leer_Body($pag,$tema).
            Leer_Footer()."</body></html>";

    return $cad;

}
function MontarHTMLBorrador(){

    $cad="<!DOCTYPE html><html>".
            Leer_Head()."<body>".
            Leer_Body($pag,$tema).
            Leer_Footer()."</body></html>";

    return $cad;



}


//ziw.es/subdominio/0000.ziw.es/zpitu/php
function Leer_Body($pag,$tema){
 $dir= $_SERVER["HTTP_HOST"];
        $htm=$dir."/zpitu/".$tema;
        $cad=file_get_contents($htm);
        //return __DIR__.  $pag."34";

    return $cad;

}
function Leer_Head($pag='/zpitu/header.php'){
    $dir= $_SERVER["HTTP_HOST"];

        $htm=$dir.$pag;
        $cad= file_get_contents($htm);
       // return __DIR__.  $pag."33";


    //   return $pag;
    return $cad;
}
function Leer_Footer($pag="/zpitu/footer.php"){
    $dir= $_SERVER["HTTP_HOST"];
        $htm=$dir.$pag;

        $cad=file_get_contents($htm);

   //     $cad+=$dir.'<script type="text/javascript" src="scripts/editor.js"></script>';
    //   return $pag;
             return $cad;


}
function Leer_Dir(){
    return __DIR__;

}
?>