<!DOCTYPE html>
<html lang="es">
<head>
	<title></title>
		<meta charset="utf-8">
</head>
<body>
<?php
	$variable=trim($_REQUEST['nombre']);
	
	if(empty($variable)){
		echo "Debes escribir bien el nombre";
	}else{
		include("conexion.php");
		$conn=conectar();
		
		$query="SELECT idcliente,nombre,apellidoP,apellidoM,direccion,municipio,estado,telefono,correo FROM clientes WHERE nombre like '%".$variable."%'";
		
		$res=mysql_query($query,$conn);
		$cantidad=mysql_num_rows($res);
		
		if($cantidad>0){
		
			echo "<table id='tabla'><tr><th>Id</th><th>Nombre</th><th>Direccion</th><th>Telefono</th><th>Correo</th></tr>";
			while($rowb=mysql_fetch_array($res)){
			echo "<tr>
			      <td id='t1'>".$rowb["idcliente"]."</td>
			      <td id='t2'>".$rowb["nombre"]."</td>
			      <td id='t3'>".$rowb["apellidoP"]."</td>
			      <td id='t4'>".$rowb["apellidoM"]."</td>
			      <td id='t5'>".$rowb["direccion"]."</td>
			      <td id='t6'>".$rowb["municipio"]."</td>
			      <td id='t7'>".$rowb["estado"]."</td>
			      <td id='t8'>".$rowb["telefono"]."</td>
			      <td id='t9'>".$rowb["correo"]."</td>
			      </tr>";
			  }    
			echo "</table>";
		}else{
			echo "No se encotraron coincidencias";
		}
		mysql_close();
}
?>
</body>
</html>