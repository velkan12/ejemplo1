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
<header>
			<div>
			<img id="logo" src="img/circulito.png" alt="prosegur" width="100" high="100"><br>
			<img id="logo" src="img/letrero.png" alt="prosegur" width="500" high="1000">
			</div>

</header>    
	<body>

	<section id="central" >
<article id="formulario">
<?php
	include "conexion.php";

	$p_empresa= $_POST['Empresa_tf'];
	$p_proveedor= $_POST['Proveedor_tf'];

	$con1="SELECT DISTINCT Proveedor FROM Facturas where Cod_Proveedor = '$p_proveedor' ";
	$rel1=mysql_query($con1);
	 echo "<h4>Empresa:</h4> ".$p_empresa." <h4>Codigo Proveedor:</h4> ".$p_proveedor." ";
	 while ($resEmp1 = mysql_fetch_assoc($rel1)) {
	  echo "<h4>Proveedor:</h4>".$resEmp1['Proveedor']."<br>";
	}

	?>
</article>
		<article id="informacion">

	<?php
	$consulta= "SELECT * FROM Facturas where Empresa ='$p_empresa' and Cod_Proveedor = '$p_proveedor'";
 	$resultado=mysql_query($consulta);
	  	
echo "<table>"; 
echo "<tr>";
echo "<td>"."<h4>Importe compra</h4>"."</td>";
echo "<td>"."<h4>estado de validacion</h4>"."</td>";
echo "<td>"."<h4>Contabilizado</h4>"."</td>";
echo "<td>"."<h4>Pagado</h4>"."</td>";
echo "<td>"."<h4>Vencimiento</h4>"."</td>";
echo "<td>"."<h4>Saldo</h4>"."</td>";
 echo "</tr>";
    while ($resEmp = mysql_fetch_assoc($resultado)) {
    	
    echo"<tr>"; 
   echo "<td>".$resEmp['Importe_Compr']."</td>"; 
   echo "<td>".$resEmp['Estado_Validacion']."</td>";  
   echo "<td>".$resEmp['Contabilizado']."</td>";
   echo "<td>".$resEmp['Pagado']."</td>";
   echo "<td>".$resEmp['Vencimiento']."</td>";  
   echo "<td>".$resEmp['Saldo']."</td>";
   echo "</tr>";
    }
     echo"</table>";                                                                                                                    

?>
<br>
<a href="index.php"><img src="img/botonRegresar.png"></a>

</article>
</section>
</body>

</html>