<?php
$temaactivo="/zpitu/";
$dirpaginas="/paginas/";
$pagina12=$_COOKIE['pagina'];
if(!isset($pagina12)) $pagina12="inicio";
$body="../subdominio/".$dom.$temaactivo.$pagina12.".html";
echo $body;

$head1="../subdominio/".$dom.$temaactivo."head.php";
$head="../subdominio/".$dom.$temaactivo."header.php";
$footer="../subdominio/".$dom.$temaactivo."footer.php";return;