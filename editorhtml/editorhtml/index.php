<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>ZetaPitu WEB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="scripts/index.js"></script>
    <style>
	body{
        background-color:aqua;
	}
   	#container {
           background-color:#e0e0e0;
           text-align:center;
           margin-top:10%;
           border:double 2px #808080;
		   width: 100%;
		}
     .boton{
         background-color:#4cff00;
         font-size:large;

     }
     .texto{
        
         font-size:large;
     }
        
        
        
    @media screen and (min-width: 737px) {

	

		#container {           
            margin-left:35%;
			width: 30%;
		}

	}


    </style>
</head>
<body>
<div id="container">
    <h1 ></h1>

    <form id="form1" action="editorhtml.php" method="post" onsubmit="return inicio();" autocomplete="off">
        <img style="width:50%" src="../images/base674.png" />
        <br />
        <p>Su dominio</p>
        <input type="text" class="texto" name="dominio" placeholder="domejemplo" required="required" style="text-align: right" />
                
                <select name="whois_extension" class="texto" id="extension">
                <option value="zpt.es">.zpt.es</option>
                <option value="ziw.es">.ziw.es</option>

            </select>
        <p>Contraseña</p>
        <input type="password" class="texto" name="contrasena" required="required" />
        <br />
        <br />
        <input type="checkbox" class="texto" name="sesion" />
        <span>Mantener sesion inciciada</span>
        <br />
        <br />
        <input type="submit" class="boton" name="aceptar" value="Aceptar" onclick="inicio(2);" />
        <input type="submit" class="boton" name="cancelar" value="Cancelar" onclick="inicio(3);" />
        <br />
    </form>
    <br />
</div>
    <div id="cookies-ziw" style="position:fixed;top:0;left:0;z-index:0;background-color:#0094ff;color:#ffffff;">
        Utilizamos cookies propias y de terceros para obtener datos estadísticos de la navegación de nuestros usuarios y
mejorar nuestros servicios. Si acepta o continúa navegando, consideramos que acepta su uso. Puede cambiar la configuración
u obtener más información aquí &nbsp;&nbsp;
        <a style="color:burlywood" href="https://ziw.es/privacidad.html" target="_blank">Cookies</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button onclick="cerrarcookies()" style="background-color:#ff0000;color:blanchedalmond"> Aceptar</button>
    </div>
</body>
</html>
<?php
if(isset($_COOKIE['dominio']));
?>