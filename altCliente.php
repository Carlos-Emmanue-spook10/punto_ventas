<?php 
session_start();
if(!isset($_SESSION['session_username'])){
	header("location:index.php");
}
require("conexion.php");
$conn=conectar();
	
?>

<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<script src="js/script.js" language="javascript" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="js/aclient.js"></script>
		<title>ALTA CLIENTES</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 	
		
</head>
<body style="background-color: #cccccc">
	<div id="menu" class="row">
		<ul class="nav nav-tabs">
			<li><a href="../index.php"> INICIO </a></li>
			<li><a href="sessionVentas.php"> VENTAS </a></li>
			<li class="active"><a>CLIENTES </a></li>
		</ul>
	   
	</div>
<h1 class="text-head">NUEVO CLIENTE</h1>
	<div class="container" align="center">
	<br /><br />
		<form name="formuCliente" method="post" action="clienteG.php">
			<label>Nombre: </label>
				<input name="nombrec" type="text" value=""/><br /><br />
			
			<label>Apellido Paterno: </label>
				<input name="apellidop" type="text" value=""/><br /><br />
			
			<label>Apellido Materno: </label>
				<input name="apellidom" type="text" value=""/><br /><br />
			
			<label>Direccion: </label>
				<input name="direcc" type="text" value=""/><br /><br />
			<seccion>
			<label>Estado: </label>
				<select id="estado" name="estado">
				<?php
			
				$queryE="SELECT * FROM estados order by nombre";
				$res= mysql_query($queryE,$conn) or die("Error en: $queryE: " . mysql_error());
				   echo "<option selected='selected' disabled='disabled'> Selecciona el estado </option>";
				   while ($row= mysql_fetch_array($res)){ 
				      echo" 
				      <option value='".$row["idestado"]."'>".$row['nombre']."</option>";
	 	 	 		}?>
	 	 	 	
	 	 	 	</select><br /><br />
	 	 	 	<label>Municipio: </label>
	 	 	 	<select id='municipio' name='municipio'>
				<option> <option>
				</select>
	 	 	 	<br><br>
				
			</seccion>
			
			<label>Telefono: </label>
			<input name="telef" type="tel" min="7" maxlength="10"  value=""/><br /><br />
			
			<label>Correo: </label>
			<input name="correo" type="email" value=""/><br /><br />
			
			<label>RFC: </label>
			<input name="rfc" type="text" value=""/><br /><br />
			
			<label>tipo de Tienda: </label>
			<input name="Ttienda" type="text" value=""/><br /><br />
			
			<input type="submit" value="Guardar"> GUARDAR </input><br>
			
			
			
		</form>
	</div>
	<div>
		<br /><br />
	</div>
</body>
</html>

<?php
$_POST['nombrec'];
$_POST['apellidop'];
$_POST['apellidom'];
$_POST['direcc'];
$_POST['sestado'];
$_POST['smunicipio'];
$_POST['telef'];
$_POST['correo'];
$_POST['rfc'];
$_POST['Ttienda'];
?>