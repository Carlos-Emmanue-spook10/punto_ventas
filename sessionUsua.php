<?php
session_start();
if(!isset($_SESSION['session_username'])){
	header("location:index.php");
}

$perfil=$_SESSION['session_username'];
require("conexion.php");
$conn=conectar();
?>
<?php 
	$query="SELECT nombre,apellidoP,apellidoM,password,corporativo,cuota FROM usuarios_corp WHERE usuario='".$perfil."'";
	$resu=mysql_query($query,$conn);
	
		while($row=mysql_fetch_row($resu)){
			$name=$row[0];
			$apeP=$row[1];
			$apeM=$row[2];
			$contra=$row[3];
			$corp=$row[4];
			$montomes=$row[5];
			
		};		
	?>

<html>
<head><meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>perfil </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="background-color: #595C7F">
	<div id="menu" class="row container">
		<font size=4 class="col-md-10 text-center"><strong>  Bienvenido </strong><?php echo $name.' '.$apeP.' '.$apeM; ?></font>
		<font size=2 class="col-md-2 text-right" >PERFIL: <input type="button" name="closeU" class="btn btn-primary btn-sm" value="Cerrar session" 
		onclick = "location='closeLogin.php'"/></font>
	</div><br><br>
	<div class="container">
		<div class="col-md-8">
			<div class="col-md-2">
				<form name="btnventas" action="sessionVentas.php">
					<input type="submit" name="vender" class="btn btn-success" value="VENTAS" onclick = "Location='sessionVentas.php'"/>
				</form> 
			</div>
			<div class="col-md-2">
				<form name="btnclientes" action="altCliente.php">
					<input type="submit" name="clientes" class="btn btn-success" value="CLIENTES" onclick = "Location='altCliente.php'"/>
				</form>
			</div>
		</div>	
		
		<div class="col-md-4 container text-right">
			
			<font size=5><b> CUOTA DEL MES: $ 4000</b></font><br />
			<font size=3><b> MIS VENTAS: $ <?PHP echo $montomes ?></font>	
		</div>
	</div><br><br>
	<div class="container">
		<form>
			<table class="table table-bordered">
				<caption><font size=4><b> COMISIONES </b></font></caption>
					<tr class="success">
						<th class="text-center">Producto</th>
						<th class="text-center">Cantidad</th>
						<th class="text-center">Total Venta</th>
						<th class="text-center">Comision</th>
					</tr>
					<tr class="warning">
						<td>Chip</td>
						<td></td>
						<td class="text-right">$ 0</td>
						<td class="text-right">$ 0</td>
					</tr>
					<tr class="warning">
						<td>Celular</td>
						<td></td>
						<td class="text-right">$ 0</td>
						<td class="text-right">$ 0</td>
					</tr>
			</table>
		</form>
	</div>
</body>
</html>