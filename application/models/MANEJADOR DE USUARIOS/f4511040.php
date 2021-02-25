<?php
include("conexion.php");
	if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['extension']) && !empty($_POST['extension']) && isset($_POST['correo']) && !empty($_POST['correo']) && isset($_POST['area_puesto']) && !empty($_POST['area_puesto'])){
mysql_query("INSERT INTO admin (nombre, usuario, password, area_puesto, correo, extension, estatus) VALUES ('$_POST[nombre]','$_POST[usuario]','$_POST[password]','$_POST[area_puesto]','$_POST[correo]','$_POST[extension]','Activo')");
echo '<script> alert("Usuario insertado correctamente"); </script>';	
echo '<script> window.location="alta_de_usuarios.php"; </script>';	
}
else{
	echo '<script> alert("Usuario no insertado"); </script>';	
}
?>