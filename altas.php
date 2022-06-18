<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<title>Aplicacion</title>

</head>
<body background="fondo.jpg">

<?php

$con = mysqli_connect("localhost","root","12345678","cecytem")or die("Error!");

 mysqli_query($con,"INSERT INTO user(Nombre,Apellido,Email,Carrera,Grupo) VALUES ('$_REQUEST[Nombre]','$_REQUEST[Apellido]','$_REQUEST[Email]','$_REQUEST[Carrera]'$_REQUEST[Grupo]'")or die(mysqli_error($con));

 mysqli_close($con);
 echo"<h3>Insertado Correctamente</h3>";

 ?>
</body>
</html>