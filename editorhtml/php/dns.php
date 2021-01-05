 <?php
 header('Content-Type: text/html; charset=UTF-8');
 /*98ee0bb7b391608283fb081adce903ad32cf1 Api key
 curl -X GET "https://api.cloudflare.com/client/v4/user/tokens/verify" \
     -H "Authorization: Bearer MN-D3Qv8VrbsMGbiPKp_I8Obl5pwHX3T1ZbK-i9f" \
     -H "Content-Type:application/json"
     2db397007e566e8e0216405289ef4fc8   ziw.es
     2db397007e566e8e0216405289ef4fc8
     e4d31a70323c36fd107bb88e07b7a9af   zpitu.es
     */
//require "vendor/autoload.php";
require_once "include/zip.php";
require "include/datos.php";
//echo "https://" . $_GET['dominio'] . "." . $_GET['extenxion'];

$url = "https://".$_GET['dominio'].".".$_GET['extenxion'];
// Eliminar cualquier carácter que pueda dar problemas

$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nombre = test_input($_POST["nombre"]);
  $email = test_input($_POST["email"]);
  $contra = test_input($_POST["contra"]);
  $contra1 = test_input($_POST["contra1"]);
  echo "estoy en form" .$nombre.$email.$contra.$contra1;


  exit;
}
if($_GET["id"]==="7"){
$dat=new ziw();
if(esvalidoemail($_GET['email'])===1){
   echo "Email no valido";
   return;
}

if($dat->comprobar()) return;
$contador=$dat->cuantosreg("http='".$_GET['sitioweb']."'");
if($contador !==0){
  echo "Dominio ya esta siendo utilizado";
  return;
 }
$contador=$dat->cuantosreg("email='".$_GET['email']."'");
if($contador !==0){
  echo "Email ya ha sido usado una vez. Solo un dominio por email";
  return;
 }

if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
    $cam[0]=$_GET['nombre'];
    $cam[1]=$_GET['sitioweb'];
    $cam[2]=$_GET['email'];
    $cam[3]=$_GET['contra'];
    $dat->insertar($cam);
  if(creardominio($_GET['dominio'],$_GET['extension'])) return;
} else {
    echo("$url no es una URL valida");
    return;
}


}




if($_GET["id"]==="5"){
$dat=new ziw();

$contador=$dat->cuantosreg("http='".$_GET['sitioweb']."'");
if($contador !==0){
  echo "Dominio ya esta siendo utilizado".chr(10);
  $dat->comprobar();
  return;
 }
$dat->comprobar();
return;

}

return;



/* //Datos para modificar dns eb cloudfare
function createsubdominio($subdominio,$dominio='ziw.es'){
$key = new \Cloudflare\API\Auth\APIKey('zpitu6@gmail.com', '98ee0bb7b391608283fb081adce903ad32cf1');
$adapter = new Cloudflare\API\Adapter\Guzzle($key);
$zones = new \Cloudflare\API\Endpoints\Zones($adapter);

$zoneID = $zones->getZoneID($dominio);

$dns = new \Cloudflare\API\Endpoints\DNS($adapter);
try {
if ($dns->addRecord($zoneID, "CNAME",$subdominio,$dominio, 0, true) === true) {
     return false;
}
}
catch (Exception $e){
    echo  "No se creo DNS de web por que web ya existe o servidor desconectado".chr(10);
 }
    return true;
}
function idsubdominio($subdominio){
$key = new \Cloudflare\API\Auth\APIKey('zpitu6@gmail.com', '98ee0bb7b391608283fb081adce903ad32cf1');
$adapter = new Cloudflare\API\Adapter\Guzzle($key);
$zones = new \Cloudflare\API\Endpoints\Zones($adapter);

$zoneID = $zones->getZoneID("ziw.es");
$dns = new \Cloudflare\API\Endpoints\DNS($adapter);
echo $dns->getRecordID($zoneID,"A",$subdominio). PHP_EOL." idsubdominio ". PHP_EOL. $subdominio. PHP_EOL.$zoneID. PHP_EOL;
}
function deletesubdominio($subdominio){
$key = new \Cloudflare\API\Auth\APIKey('zpitu6@gmail.com', '98ee0bb7b391608283fb081adce903ad32cf1');
$adapter = new Cloudflare\API\Adapter\Guzzle($key);
$zones = new \Cloudflare\API\Endpoints\Zones($adapter);

$zoneID = $zones->getZoneID("ziw.es");

$dns = new \Cloudflare\API\Endpoints\DNS($adapter);

if ($dns->deleteRecord($zoneID,$subdominio) === true) {
    echo "DNS Eliminado". PHP_EOL;
}

}
*/
function creardominio(){

$carpeta ="..//subdominio/".$_GET['dominio'].".".$_GET['extension'];
$dominio=$_GET['dominio'].".".$_GET['extension'];
$temas= "..//subdominio/temas/";
$pluggin = "..//subdominio/pluggin";

//if(createsubdominio($_GET['dominio'],$_GET['extension'])){
// echo "DNS de sitio web ya existe";
 //return true;
//}

if (!file_exists($carpeta)) {

    mkdir($carpeta, 0777, true);
    mkdir($carpeta."/temas", 0777, true);
    mkdir($carpeta."/temas/001", 0777, true);
    mkdir($carpeta."/temas/002", 0777, true);
    mkdir($carpeta."/temas/003", 0777, true);
    mkdir($carpeta."/temas/004", 0777, true);
    mkdir($carpeta."/pluggin", 0777, true);

    $ruta=$temas;
    $destino=$carpeta."/temas/";
    $archivos= glob($ruta.'*.*');

    foreach ($archivos as $archivo){
    $archivo_copiar= str_replace($ruta, $destino, $archivo);

    copy($archivo, $archivo_copiar);
    }
    $nombre=$_GET['dominio'];
    copy($ruta."/principal.php",$carpeta."/".$nombre."-in.php");
    copy($destino."/principal.php",$destino."/".$dominio.".php");
   // echo $ruta."tema1.php -- ",$carpeta."/index.php". "\n";
    $myfile = fopen($carpeta."/".$nombre.".php", "w+") or die("No se pudo crear archivo de inicio ! ".$ruta);
    $file="<?php ".chr(36)."name=". chr(36)."_REQUEST['p'];if (!empty(". chr(36)."name)){include ". chr(36)."name.'.php';} else {include 'xxxxx';}?>";
    $fil= str_replace("xxxxx",$nombre."-in.php" ,$file);
    fwrite($myfile,$fil);
    fclose($myfile);

    $myfile = fopen($carpeta."/editor.php", "w+") or die("No se pudo crear archivo de edicion ! ".$ruta);
    $file='<script> window.location = "https://ziw.es?d=xxxx";</script>';
    $fil= str_replace("xxxx",$nombre,$file);
    fwrite($myfile,$fil);
    fclose($myfile);



    return false;

}
echo "Error: No se creo sitio->".$carpeta;
return true;

}

?>