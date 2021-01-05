<?php
 comprimir();
function agregar_zip($dir,$zip){
    //verificamos si $dir es un directorio

    if (is_dir($dir)) {
        //abrimos el directorio y lo asignamos a $da
        if ($da = opendir($dir)) {
            
            //leemos del directorio hasta que termine
            while (($archivo = readdir($da)) !== false) {
                /*Si es un directorio imprimimos la ruta
                 * y llamamos recursivamente esta función
                 * para que verifique dentro del nuevo directorio
                 * por mas directorios o archivos
                 */
                if (is_dir($dir . $archivo) && $archivo != "." && $archivo != "..") {
                    echo "<strong>Creando directorio: $dir$archivo</strong><br/>";
                    agregar_zip($dir . $archivo . "/", $zip);

                    /*si encuentra un archivo imprimimos la ruta donde se encuentra
                     * y agregamos el archivo al zip junto con su ruta
                     */
                } elseif (is_file($dir . $archivo) && $archivo != "." && $archivo != "..") {
                    echo "Agregando archivo: $dir$archivo <br/>";
                    $zip->addFile($dir . $archivo, $dir . $archivo);
                }
            }
            //cerramos el directorio abierto en el momento
            closedir($da);
        }
    }
}

//fin de la función
//creamos una instancia de ZipArchive
function comprimir($dir = "temas/",$rutaFinal = "zip/"){
$zip = new ZipArchive();

//ruta donde guardar los archivos zip, ya debe existir


if(!file_exists($rutaFinal)){
    mkdir($rutaFinal);
}

$archivoZip = "kiuvox.zip";
$finalzip=$rutaFinal."/temas.zip";
if ($zip->open($archivoZip, ZIPARCHIVE::CREATE) === true) {
    echo $dir."   ";
    agregar_zip($dir, $zip);
    $zip->close();

    //Muevo el archivo a una ruta
    //donde no se mezcle los zip con los demas archivos
  rename($archivoZip,$finalzip);

    //Hasta aqui el archivo zip ya esta creado
    //Verifico si el archivo ha sido creado
    if (file_exists($finalzip)) {
        echo "Proceso Finalizado!! <br/><br/>
                Descargar: <a href='$finalzip'>$archivoZip</a>";
    } else {
        echo "Error, archivo zip no ha sido creado!!";
    }
}

}




function descomprimir($dirzip="zip/temas.zip",$dir="jose.ziw.es/"){
        $zip = new ZipArchive;
        if ($zip->open($dirzip) === TRUE) {
            $path = $dir; // Path del directorio actual
            $zip->extractTo($path); // Extraemos el contenido en el directorio actual
            $zip->close();
            echo 'bien';
        } else {
            echo 'failed';
        }


    }













?>