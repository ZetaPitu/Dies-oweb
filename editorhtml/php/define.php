<?php
if(empty($GLOBALS['tema_activo'])){

    setcookie('tema_activo',"/temas/001/index.php");
    setcookie('copy',"/temas/001/copia-1.php");
    setcookie('borrador',"/temas/001/borrador.php");
    //echo "Define.php";

}
   $GLOBALS['dirtema']="/temas/001";
   $GLOBALS['temasdestino']="../../subdominio/";
   $GLOBALS['temasorigen']="../../subdominio/temas/";
   $GLOBALS['tema_activo']="/temas/001/index.php";
   $GLOBALS['copy']="/temas/001/copia-1.php";
   $GLOBALS['borrador']="/temas/001/borrador.php";

//Lectura
   define("PAGINA404", "zetapitu.php");
   define("DIRTEMA", $GLOBALS['dirtema']);
   define("TEMASORIGEN", $GLOBALS['temasorigen']);
   define("TEMASDESTINO",$GLOBALS['temasdestino']);
   define("TEMA",     $GLOBALS['tema_activo']);
   define("COPIA",    $GLOBALS['copy']);
   define("BORRADOR", $GLOBALS['borrador']);
   define("ORIGEN",   $GLOBALS['tema_activo']);
//Escritura

  //echo TEMA. "--".ORIGEN."--".COPIA;
?>