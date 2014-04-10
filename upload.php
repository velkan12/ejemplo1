
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

<?php
	include "conexion.php";
	$formato = '.csv';
	$nombreArchivo = $_FILES['archivo']['name'];
	$nombreTemArchivo = $_FILES['archivo']['tmp_name'];
	$extension = substr($nombreArchivo, strrpos($nombreArchivo, '.'));
	ini_set('max_execution_time', 300); //300 seconds = 5 minutes


$fp= fopen($nombreTemArchivo, 'r');
$result=mysql_query("TRUNCATE TABLE Facturas");

while ($linea= fgetcsv($fp, 1000, ';')) {
 $carga="INSERT INTO Facturas(Empresa, Cod_Proveedor, Proveedor, Clasificacion, Tipo_Compr, Nro_Compr, Descripcion_Campr, Fecha_Compr, Moneda, Importe_Compr, Tipo_cambio, Importe_Func, Fecha_Creacion, Primer_Aprobador, Estado_Aprobacion, Fecha_Aprobacion, Estado_Validacion, Retencion, Descripcion_Ret, Contabilizado, Pagado, Grupo, Metodo, Prioridad, Cuenta_Bancaria, Vencimiento, Retenido_Pago, Num, Nom, Fecha_OC, Fecha_Sol, Saldo) values ('$linea[0]','$linea[1]','$linea[2]','$linea[3]','$linea[4]','$linea[5]','$linea[6]','$linea[7]','$linea[8]','$linea[9]','$linea[10]','$linea[11]','$linea[12]','$linea[13]','$linea[14]','$linea[15]','$linea[16]','$linea[17]','$linea[18]','$linea[19]','$linea[20]','$linea[21]','$linea[22]','$linea[23]','$linea[24]','$linea[25]','$linea[26]','$linea[27]','$linea[28]','$linea[29]','$linea[30]','$linea[31]')";
 mysql_query($carga);

}

echo "Actualizacion de datos completa";
?>
<a href="index.php"><img src="img/botonRegresar.png"></a>

</article>
</section>
</body>
</html>