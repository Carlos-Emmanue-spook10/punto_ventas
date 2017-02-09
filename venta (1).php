<?php
session_start();
if(!isset($_SESSION['session_username'])){
	header("location:index.php");
}

$Venduser=$_SESSION['session_username'];
require("conexion.php");
$conn=conectar();
echo $Venduser;

$sql="SELECT  idUsuario from usuarios_corp where usuario='".$Venduser."'";
$user=mysql_query($sql,$conn);
while($row=mysql_fetch_array($user)){
	$idusuario=$row['idUsuario'];
}


$col1=$_REQUEST['value1'];
$col2=$_REQUEST['value2'];
$col3=$_REQUEST['value3'];
$col4=$_REQUEST['value4'];
$col5=$_REQUEST['value5'];
$col6=$_REQUEST['value6'];
$col7=$_REQUEST['value7'];
$col8=$_REQUEST['value8'];


	$query="INSERT INTO ventas(idcliente, producto, compania, color, imei, icc, monto, fecha, idUsuario)
	 VALUES ('1','".$col2."','".$col3."','".$col7."',' ','','".$col8."',NOW(),'".$idusuario."')";

if (mysql_query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
		
?>

