<?php
function conectar(){

    $user='comerc97';
    $serv='localhost';
    $pass='W18j7Jba6x';
    $base='comerc97_VentasCorp';


	$conn = mysql_connect($serv,$user,$pass) or die('Error al conectar a la base de datos'.mysql_error());
	 mysql_select_db($base,$conn);

	return $conn;
}

?>
