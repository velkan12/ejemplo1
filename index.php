<!DOCTYPE html>
<html>

<html lang= "es">
	
	<head>
 		<title>prosegur consulta</title>
 		<meta charset="UTF-8" />
 	<link rel= "stylesheet" type="text/css" href="css/principal.css" />
	    
	</head>
	<script  type="text/javascript"src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
	<script type="text/javascript" src="http://jqueryrotate.googlecode.com/svn/trunk/jQueryRotate.js"></script>
<script>
	var angle = 0;
	setInterval(function(){
	      angle+=3;
	     $("#logo").rotate(angle);
	},50);
</script>

	<body>
			
<header>
			<div>
			<img id="logo" src="img/circulito.png" alt="prosegur" width="100" high="100"><br>
			<img id="logo" src="img/letrero.png" alt="prosegur" width="500" high="1000">
			</div>

</header>


	</head>
<body>
	<section id="central" >
		<article id="informacion">
			<h1>Bienvenido a su sistema de manejo de registros</h1>
			<p>Usted podra usar esta aplicacion para migrar los registros de un archivo CVS (separado por ",") a una base de datos para facilitar su manejo </p>
			<br>
			<p>A su derecha encontrara 2 opciones:</p>
			<br>
			<p>1: Podra subir un archivo nuevo a la base de datos </p>
			<br>
			<p>2: Podra consultar datos sobre registro existentes</p>


		</article>
		<article id="formulario">
<h1>Cargar un archivo nuevo</h1>
	<form method="post" action="upload.php"  enctype="multipart/form-data">
		<input type="file" name="archivo">
		<input type="submit" value="subir archivo" name="boton_cargar"/>
	</form>
	
			<h1>Consultar registros existentes</h1>
			<br>
	

			<form method="post" action="consulta.php"> 
			
	<?php
	include "conexion.php";
	echo "<h4>Selecciona una Empresa</h4>";
	echo '<select name="Empresa_tf">';
	$consulta_mysql= "SELECT DISTINCT Empresa, Empresa FROM Facturas";
	$resultado_consulta_mysql=mysql_query($consulta_mysql);

	while($fila=mysql_fetch_array($resultado_consulta_mysql)){
	echo '<option value="'.$fila["Empresa"].'"> '.$fila["Empresa"].'></option>';
 
	
	}
	echo '</select>';

	?>
	<h4>escriba un codigo de Proveedor</h4> <input type="textfield"  name="Proveedor_tf"/>
	<input type="submit" value="consultar" name="boton_consultar"/>
	</form>
	</article>	
	</section>
	
	
</body>

</html>