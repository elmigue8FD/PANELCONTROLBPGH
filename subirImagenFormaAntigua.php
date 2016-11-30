<!DOCTYPE html>
<html>
<head>
	<title>Subir una imagen de productos en linea</title>
</head>
<body>
<h1>Formulario para subir imagen</h1>
<form action="uploadImgProductoLineaPrueba.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="srcimg1_producto">
	<br/>
	<input type="file" name="srcimg2_producto">
	<br/>
	<input type="file" name="srcimg3_producto">
	<br/>
	<br/>
	<input type="text" name="srcimg1_productoBD">
	<br/>
	<input type="text" name="srcimg2_productoBD">
	<br/>
	<input type="text" name="srcimg3_productoBD">
	<br/>
	<br/>
	<br/>
	<input type="submit" name="subir" value="subir">
</form>

</body>
</html>