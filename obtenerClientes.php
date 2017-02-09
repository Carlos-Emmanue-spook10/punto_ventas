<?php
require("conexion.php");
$conn=conectar();

$nomb='uribe';
	
$nom= ($nomb != null) ? "(nombre like '%".$nomb."%' or apellidoP like '%".$nomb."%' or apellidoM like '%".$nomb."%')":"";

$queri="SELECT idcliente, nombre, apellidoP, apellidoM, direccion, municipio, estado, telefono, correo From clientes  WHERE $nom";
$re=mysql_query($queri,$conn) or die("Error en: $queri: " . mysql_error());
	$can=mysql_num_rows($re);
	
	if($can>0){
	echo "<table class='table' id='tabla'><tr><th>Id</th><th>Nombre</th><th>Direccion</th><th>Telefono</th><th>Correo</th></tr>";
			while($row=mysql_fetch_array($re)){
			echo "<tr>
			      <td id='t1'>".$row["idcliente"]."</td>
			      <td id='t2'>".$row["nombre"]." ".$row["apellidoP"]." ".$row["apellidoM"]."</td>
			      <td id='t3'>".$row["direccion"]." ".$row["municipio"]." ".$row["estado"]."</td>
			      <td id='t4'>".$row["telefono"]."</td>
			      <td id='t5'>".$row["correo"]."</td>
			      </tr>";
			  }    
			echo "</table>";
	}
?>