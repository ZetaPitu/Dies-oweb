<?php
/**
 * Creado por ZetaPitu-Juan MAscuñano Torres
 * Diseño de clase de datos
 * Date: 18/03/2019
 * Time: 21:46 
 */
 require_once "cloudfare.php";
 require_once "validarentradas.php";
class  datos
    {
        private  $datos="db6089744_zip";
        private  $user ="u6089744_zip";
        private  $cont ="Andres34-juan"; 
        private  $campos;
        protected  $tabla;
        protected  $conexion=null;
        protected $tablename;
        public    $resultado=array();
        public  $reg=array();     
        
                             
        function __construct($table='usuarios',$servername="mysql508int.srv-hostalia.com", $username="u6089744_zip", $password="Andres34-juan"){

           $this->conexion =  mysqli_connect($servername, $username, $password,$this->datos);
                 
         if (mysqli_connect_errno())
          {
            $this->resultado["text"]=true;
            $this->resultado['Errortext']= "Fallo al conectar: " . mysqli_connect_error();
            return;
         }
        $this->tabla=$table;
        $this->resultado['Error']=false;

        }
        function __destruct() {
        $this->conexion->close();
       // echo "destruido";
       
        }
         public function obtenercampos(){

              $sql="SHOW COLUMNS FROM ".$this->tabla;
              $result=mysqli_query($this->conexion,$sql);
              echo "<br/>"; 
// Numeric array
               if ($result->num_rows > 0) {
              while( $row=mysqli_fetch_array($result,MYSQLI_NUM)){
              echo $row[0];
              echo "<br/>";
            }

         }

            mysqli_free_result($result);
       
         }

        public function verresultado(){
       
         return $this->resultado;

        }
        public function ponerresultado($result,$result1,$result2,$result3){
                      
           $this->resultado["error"]=$result;
           $this->resultado["errordat"]=$result1;
           $this->resultado["funcion"]=$result2;
           $this->resultado["datos"]=$result3;


        }
        public function cuantosreg($email) {
           $sql = "SELECT * FROM usuarios WHERE ".$email;
           $result=mysqli_query($this->conexion,$sql);
           return $result->num_rows;
        }
        public function leer($email){
        $sql = "SELECT * FROM usuarios WHERE ".$email;
        $result=mysqli_query($this->conexion,$sql);

        if ($result->num_rows > 0) {
           
           $cont=0;
           while( $row=mysqli_fetch_array($result,MYSQLI_NUM)){
            $this->reg[$cont++]= $row[0].$row[1].$row[2].$row[3].$row[4];            
            }
            $this->ponerresultado(false, $cont." registros","leer ".$email,$this->reg);

         } else {
             $this->reg[0]="0";
             $this->ponerresultado(true, "0 registros","leer ".$email,$this->reg);
         }

            mysqli_free_result($result);


        }
        function insertar($campos){
          $sql = "INSERT INTO `".$this->tabla."` (`nombre`,`http`, `email`, `contrasena`)
           VALUES ('".$campos[0]."', '".$campos[1]."', '".$campos[2]."', '".$campos[3]."')";
        //echo $sql;
           $sql=$sql;
        if ( mysqli_query($this->conexion,$sql)) {
             $this->ponerresultado(false, "Correcto","insertar","Registro añadidido");
        } else {
           
           $this->ponerresultado(true,$this->conexion->error ,"insertar",$sql);
         
                   }
        }
        function modificar($sql){
        $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

           if ($conn->query($sql) === TRUE) {
           echo "Record updated successfully";
          } else {
          echo "Error updating record: " . $conn->error;
          }



        }
        function eliminar($sql){
        }

    }
class ziw extends datos{

       function __construct($tablename='usuarios'){
       
           if( parent::__construct($tablename)) return;  
           
        }
       function insertar($campos){
        $ip = getRequestIP();
        $fecha = date("j/n/Y");
        $pais=getRequestPAIS();
        if($this->comprobar())return;
         
        
        $sql = "INSERT INTO `".$this->tabla."` (`nombre`,`http`, `email`, `contrasena`, `ip`, `pais`, `fecha`)
           VALUES ('".$campos[0]."', '".$campos[1]."', '".$campos[2]."', '".$campos[3] ."', '".$ip."', '".$pais."', '".$fecha."')";
        //echo $sql;
        $sql=$sql;
        if ( mysqli_query($this->conexion,$sql)) {
             $this->ponerresultado(false, "Correcto","insertar","Registro añadidido");
        } else {
           
           $this->ponerresultado(true,$this->conexion->error ,"insertar",$sql);
         
                   }
        }
        function comprobar(){
                $ip = getRequestIP();
                $fecha = date("j/n/Y");
                if( $this->cuantosreg("fecha='".$fecha."' and ip='".$ip."'") > 2){
                echo "No se puede hacer mas que tres dominios por dia";
                return true;
        };
             return false;

        }
        function autentificar(){
         $contra=$_COOKIE['contra'];
         $sitio=$_COOKIE['dominio'];

    //   echo $this->cuantosreg("contrasena='".$contra."' and http='".$sitio."'");
        
               if( $this->cuantosreg("contrasena='".$contra."' and http='".$sitio."'")===0){
               return false;
        };
           return true;

        }


         function __destruct() {
         parent::__destruct();
        }


}
/*

$row= $dat->obtenercampos();
echo $row[0][0];
$cam= array();

$dat=new ziw();
$cam[0]="Juan";
$cam[1]="00j3jjp9.ziw.es";
$cam[2]="a9jjj0@gmawil.com";
$cam[3]="djfñwhewdjd";

$dat->insertar($cam);
$res=$dat->verresultado();
if($res['error']) echo chr(10)."Error".chr(10);
echo $dat->resultado["error"];
echo $dat->resultado["errordat"];
echo $dat->resultado["funcion"];
echo $dat->resultado["datos"];
/*
$dat->leer("email='a3sd@gmawil.com'");
echo $dat->resultado["error"];
echo $dat->resultado["errordat"];
echo $dat->resultado["funcion"];
//echo $dat->resultado["datos"][0];
if ($dat->reg[0]==="nada") echo "no se encontro registro";
else{
 $cont=0;
 while($dat->reg[$cont]) echo $dat->reg[$cont++]."<br/>";
}


//if(!=='ok') echo $dat->verresultado() ; else echo "bien";
*/

?>