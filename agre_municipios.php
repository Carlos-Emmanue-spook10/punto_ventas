<?php 
require("../conexion.php");
$conn=conectar();
$id=$_POST['id'];
	$mun = "SELECT * FROM municipios WHERE estado='$id' order by nombre_municipio";
	$result= mysql_query($mun,$conn) or die("Error en: $queryE: " . mysql_error());
		if(mysql_num_rows($result)>0){
			echo'<option selected="selected" disabled="disabled">Selecciona el municipio</option>';
			while($row=mysql_fetch_array($result)){
			echo'<option value="'.$row['idmunicipio'].'">'.$row['nombre_municipio'].'</option>';
		}
	}
		
?>	