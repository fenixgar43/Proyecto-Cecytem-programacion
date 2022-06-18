<!DOCTYPE html>
<meta charset="UTF-8">

<?php

$con = mysqli_connect("localhost","root","12345678","cecytem")or die("Error!");

?>

<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="cecytem.ico">
	<body>
		<div id="header">
		
		<ul class="nav">
			<li><a href="galeria.html">Inicio</a></li>
			<li><a href="">Servicios</a>
				<ul>
					<li><a href="https://controlescolarecatepec.jimdofree.com/">Jimdo</a></li>
					<li><a href="https://cecytem.mx/deo/gui/LogIn.jsp">Deo</a></li>
					<li><a href="https://es-la.facebook.com/CecytemPlantelEcatepec/">Faebook</a></li>
							<li><a href="http://cecytem.edomex.gob.mx/">CECYTEM ECATEPEC</a></li>
							<li><a href="notisias.html">Noticias</a></li>
				
						<ul>
						
						
						<ul>
												
						</ul>
						</li>
					</ul>
				</li>
				</ul>
			</li>
			<li><a href="">Registro</a>
				<ul>
					
						<li><a href="el inicio de los empleos.html">Empleo</a></li>
							<li><a href="">Gana un cupon</a></li>
					
				</ul>
			</li>
			<li><a href="info.html">Acerca de</a></li>
			<ul>
			</ul>
	</div>
	</body>
	<title>Form Cecytem</title>
	<link rel="shortcut icon" type="image/x-icon" href="cecytem.ico">
<style>
body{

		margin-left: 30px;
		margin-right: 30px;
	}
* {
			padding: 0px;
			margin: 0px;
		}

		#header {
			margin: auto;
			width: 500px;
			font-family: Arial, helvetica, sans-serif;
		}
		ul, ol {
			list-style: none;
		}

		.nav li a {
			background-color: #2B6B2A ;
			color: #FFFFFF ;
			text-decoration: none;
			padding: 20px 30px;
			display: block;
		}
		.nav li a: hover {
			background-color: #CD5C5C ;
		}

		.nav > li {
			float: left;
		}

		.nav li ul {
			display:none;
			position: absolute;
			min-width: 140px;
		}

		.nav li:hover > ul {
			display: block;
		}
		.nav li ul li {
			position: relative;
		}
		.nav li ul li ul {
			right:-140px;
			top: 0px;
		}

		body{

		}
		body{
			background-image: url("fondo14.jpg");
			background-attachment:fixed ;
			background-repeat: no-repeat;
			max-width: 1200 px;
}
h1{
	color:#336425 ;
	background-color:#F6F3E7 ;
			text-align: center;
			font-family:"Cooper Black";
}
form{
	text-align: center;
}
	
</style>

</head>
<body>
	<h1>Registrate para tu cupon!! </h1>


<form method="POST" action="ABC.php">
			<label>Nombre:<br></label>
			<input type="text" name="Nombre" placeholder="Escriba su nombre"><br>
			<label>Apellido:<br></label>
			<input type="text" name="Apellido" placeholder="Escriba su apellido"><br>
			<label>Email:<br></label>
			<input type="text" name="Email" placeholder="Escriba su email"><br>
			<label>Carrera:<br></label>
			<input type="text" name="Carrera" placeholder="Escriba su carrera"><br>
			<label>Grupo:<br></label>
			<input type="text" name="Grupo" placeholder="Escriba su grupo"><br>
			<input type="submit" name="insert" value="Insertar datos">

</form>


<?php

   if(isset($_POST["insert"])){
   	  $Nombre=$_POST["Nombre"];
   	  $Apellido=$_POST["Apellido"];
   	  $Email=$_POST["Email"];
   	  $Carrera=$_POST["Carrera"];
   	  $Grupo=$_POST["Grupo"];

   	  $insertar="INSERT INTO user (Nombre,Apellido,Email,Carrera,Grupo)VALUES('$Nombre','$Apellido','$Email','$Carrera','$Grupo')";
   	  $ejecutar=mysqli_query($con,$insertar);

   	  if($ejecutar){
   	  	echo"<h3>Revise su email, para saber si gano el cupon</h3>";
   	  }
   }
?>
<br/>
<center><table width="500" border="2" style="background-color: #F9F9F9;">
	<tr>
		<th>id</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Email</th>
		<th>Carrera</th>
		<th>Grupo</th>
		<th>Editar</th>
		<th>Borrar</th>
	</tr></center>
<?php
$consulta="SELECT * FROM user";
$ejecutar=mysqli_query($con,$consulta);
$i=0;
while($fila=mysqli_fetch_array($ejecutar)){
	$id=$fila['Id'];
	$Nombre=$fila['Nombre'];
	$Apellido=$fila['Apellido'];
	$Email=$fila['Email'];
	$Carrera=$fila['Carrera'];
	$Grupo=$fila['Grupo'];

	$i++;

?>
   <tr align="center">
   <td><?php echo$id;?></td>
	<td><?php echo$Nombre;?></td>
	<td><?php echo$Apellido;?></td>
	<td><?php echo$Email;?></td>
	<td><?php echo$Carrera;?></td>
	<td><?php echo$Grupo;?></td>
	<td><a href="ABC.php?editar=<?php echo$id;?>">Editar</td>
	<td><a href="ABC.php?borrar=<?php echo$id;?>">Borrar</td>
</tr>
<?php } ?>
</table>

<?php
if(isset($_GET['editar'])){
	include("editar.php");
}
?>

<?php
if(isset($_GET['borrar'])){
	$borrar_id=$_GET['borrar'];
	$borrar="DELETE FROM user WHERE id='$borrar_id'";
	$ejecutar=mysqli_query($con, $borrar);

	if($ejecutar){
		echo"<script>alert('El usuario ha sido borrado!')</script>";
		echo "<script>windows.open('ABC.php','_self')</script>";
	}

}
?>

</body>
</html>
