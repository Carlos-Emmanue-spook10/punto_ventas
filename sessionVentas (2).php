<?php
session_start();
if(!isset($_SESSION['session_username'])){
	header("location:index.php");
}

?>

<html>
<head><meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="ajax.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>

	<script type="text/javascript">
			
		$(document).ready(function () {

			MostrarConsulta("obtenerProductos.php", 'productos');
            
        });
		function clienteDat(){
			MostrarConsulta("obtenerClientes.php",'datcliente')
		}

		function Anexar(i){

			//para disminuir el contador de cantidad
			var x = document.getElementById("table1").rows[i].cells;
			//x[0].innerHTML = "NEW CONTENT";
			cann=x[0].innerHTML;
			
			
			if(cann>0){
				x[0].innerHTML=cann - 1;
				//para agregar de tabla a tabla	
				
				$("#table2").append("<tr>"+document.getElementById("table1").rows[i].innerHTML+"</tr>");
			
			}
			else
			{
				alert("no pues no se puede carnal.")
			}	
		}
		
		function Mtotal(){
			var total =0;
			
			$("#table2 tr").find('td:eq(7)').each(function () {
			valor = $(this).html();
			
			total += parseInt(valor)
			})
			$('#total1').text(total);
			if(total>0){
			document.form1.venta.disabled=false;}
			else{document.form1.venta.disabled=true;}
		}
		


	</script>
	<title>VENTAS FREEMEX</title>

</head>
<body style="background-color: #42647F">
	<div id="menu" class="row">
	   
		<ul class="nav nav-tabs">
			<li><a href="index.php"> INICIO </a></li>
			<li class="active"><a href=""> VENTAS </a></li>
			<li><a href="altCliente.php">CLIENTES </a></li>
		</ul>
	</div><br>
	
	<div>
		<h2 id="titulo">FREEMEX VENTAS </h2>
	</div>
	
	<div class="container">
		<div class="col-md-6" method="POST">
			<label> NOMBRE DEL CLIENTE </label>
			<input id="nombre" required type="text" onkeyup="clienteDat()" placeholder="Nombre/ApePat/apeMat"><br><br>
			
	  	</div>
		<div id="datcliente" class="col-md-6">
		
		</div>
	</div><br><br>
	
	
	<div class="container">
		<div class="col-md-2">
		
		</div>
		<div class="col-md-10 table-responsive">
			<div id="productos"></div>
		</div>
	</div><br><br>
	
	<div class="container">
		<form name="form1" id="form1" method="post" action="venta.php">
		<div class="col-md-9 table-responsive">
			<table  class="table" >
			<caption><p>PRODUCTOS ADQUIRIDOS</p></caption>
			<tr class="success">
				<th> Cantidad </th>
				<th> Producto </th>
				<th> Compañia </th>
				<th> Precio </th>
			</tr>
			<tbody id="table2">
			</tbody>
			</table>
		</div>
		
		<div class="col-md-3" method="POST">
		<br><br>
			<font size=6><b>Total: $ <label id="total1" name="total1"> </label></b></font><br><br>
			<input type="button" id="totalf" onclick="Mtotal()" class="btn btn-success btn-sm" value="TOTAL"/>
			
			
			<input type="submit" id="venta" name='venta' disabled="disabled" value="VENTA" onclick="Location='venta.php'">
		</div>
		</form>
	</div><br>

</body>
</html>
<?php
$_POST['total1'];
?>