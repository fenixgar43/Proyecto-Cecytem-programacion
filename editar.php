<style>
label{
	color:#F6F3E7 ;

}
</style>
<?php
if(isset($_GET['editar'])){
	$editar_id=$_GET['editar'];

	$consulta="SELECT * FROM users WHERE id='editar_id'";
	$ejecutar=mysqli_query($con, $consulta);

	$fila=mysqli_fetch_array($ejecutar);

	$id=$fila['id'];
	$Nombre=$fila['Nombre'];
	$Apellido=$fila['Apellido'];
	$Email=$fila['Email'];
	$Carrera=$fila['Carrera'];
	$Grupo=$fila['Grupo'];
}
?>
<br/>
<form method="POST" action="">
<label>Nombre:</label>
<input type="text" name="Nombre" value="<?php echo $Nombre;?>"><br/>
<label>Apellido:</label>
<input type="text" name="Apellido" value="<?php echo $Apellido;?>"><br/>
<label>Email:</label>
<input type="text" name="Email" value="<?php echo $Email;?>"><br/>
<label>Carrera:</label>
<input type="text" name="Carrera" value="<?php echo $Carrera?>"><br/>
<label>Grupo:</label>
<input type="text" name="Grupo" value="<?php echo $Grupo;?>"><br/>
<input type="submit" name="actualizar" value="ACTUALIZAR DATOS">
</form>

<?php
if(isset($_POST['actualizar'])){
	$actualizar_Nombre=$_POST['Nombre'];
	$actualizar_Apellido=$_POST['Apellido'];
	$actualizar_Email=$_POST['Email'];
	$actualizar_Carrera=$_POST['Carrera'];
	$actualizar_Grupo=$_POST['Grupo'];

	$actualizar="UPDATE user SET Nombre='$actualizar_Nombre',Apellido='$actualizar_Apellido',Email='$actualizar_Email',Carrera='$actualizar_Carrera',Grupo='$actualizar_Grupo' WHERE id='$editar_id'";
	$ejecutar = mysqli_query($con, $actualizar);

	if($ejecutar){
		echo "<script>alert('Datos Actualizados!')</script>";
		echo "<script>windows.open('ABC.php','_self'</script>";
	}
}
?>