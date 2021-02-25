<?php
 session_start();
include 'conexion.php';
if(isset($_SESSION['usuario'])){
	echo '<script> window.location= "paginaprincipal.php"; </script>';	

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body align = "center" bgcolor="##2A4B97"><!--Toda la parte visual estará alineada al centro, así como un color por default-->
		<font color="silver"  ><h1>Manejador de usuarios</h1></font><!--Toda la parte visual estará alineada al centro, así como un color por default--> 
		<img src="admin.png"  width = "200px"> <!--Se carga la imagen del inicio de sesión dando un ancho de 200 px-->
		<form action ="valida.php" method ="post">
			<table align= "center"> <!--Toda la tabla quedará alineada al centro-->
			<tr>	
			   <th><label><input type='text' name='usuario' placeholder='Usuario'></label></th><!--El campo de texto que admitira sólo texto-->
			</tr>
			<tr>
			   <th><label><input type='password' name='password' placeholder="Contraseña"></label></th> <!--Un label de tipo password que te cifra la contraseña-->
			</tr>
			<style>
		body{
			
		}
		input[type="text"], input[type="password"]{
			outline: none;
			padding: 10px;
			display: block;
			width: 250px;
			border-radius: 3px;
			border: 1px solid	#eee;
			margin: 20px auto;

		}

		.button1{
			background: #46514D; 
			color: #000000;
			display: inline-block;
			font-size: 1.25em;
			margin: 15px;
			padding: 10px 0px;
			text-align: center;
			width: 165px;
			text-decoration: none;
			box-shadow: 0px 3px 0px #373c3c; 
		}
		.button span{
			margin-right: 10px;
		}
			.button1.radius{
				border-radius:50px;
		}
		.button1:hover{
			box-shadow: 0px 0px 0px;
			padding-top: 7px; 
		}
	</style>
			<tr>
			   <th><input type= 'submit' name='Entrar' class="button1 radius" value="Ingresar" /></th>
			</tr>
			
			</table>
		</form>
	</body>
</html>