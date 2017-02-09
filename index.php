<?php
session_start();
?>

<?php require("conexion.php");
$conn=conectar();
 ?>
<?php 
	if(isset($_SESSION['session_username'])){
	echo"<script language='javascript'>window.location='sessionUsua.php'</script>";
	}
		
		if(isset($_POST["login"])){
			if(!empty($_POST['username']) && !empty($_POST['password'])){
				$username=$_POST['username'];
				$password=$_POST['password'];
				
				$query = mysql_query("SELECT usuario,password FROM usuarios_corp WHERE usuario='".$username."' AND password='".$password."'") or die(mysql_error());
				
				$nrows= mysql_num_rows($query);
				if($nrows!=0){
					while($row=mysql_fetch_assoc($query)){
						$dbusername=$row['usuario'];
						$dbpassword=$row['password'];
						
					}
					
					if($username == $dbusername && $password == $dbpassword){
						$_SESSION['session_username']=$username;
					echo"<script language='javascript'>window.location='sessionUsua.php'</script>";
						
 				} 
 				} else {
 
					$message = "Nombre de usuario ó contraseña invalida!";
 					}
 			}else {
				$message = "Todos los campos son requeridos!";
				
			}
		}
	?>

<html>
<head><meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
	<title>VENTAS SESSION</title>
		
</head>

<body>
	
	<div class="container mlogin">
 	<div id="login">
 	<h1>FREEMEX SESSION</h1>
		<form name="loginform" id="loginform" action="" method="POST">
		 	<p>
		 	<label for="user_login">Usuario<br />
		 	<input type="text" name="username" id="username" class="input" value="" size="20" /></label>
		 	</p>
		 	<p>
			 <label for="user_pass">Contraseña<br />
			 <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
			 </p>
			 <p class="submit">
			 <input type="submit" name="login" class="button" value="Entrar" />
			 </p>
			 
		</form>
 
	</div>
 
	</div>

</body>

</html>
