<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inicio</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />


</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1>Bienvenido </a></h1>
			<span> Administrador</span> </div>
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="edit-catalogo.php" accesskey="1" title="">Editar Catalogo</a></li>
				<li><a href="edit-usuario.php" accesskey="2" title="">Administrar usuarios</a></li>
				<li><a href="conexlog.php" accesskey="5" title=""> regresar al menu principa</a></li>
				<li><a href="logout.php" accesskey="5" title=""> Cerrar sesion</a></li>
			</ul>
		</div>
	</div>
</div>

</body>
</html>
<?php
include 'conn.php';
$usuario=$_GET['usuario'];
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to check if the email already exist
$registros = "SELECT * FROM ingreso WHERE usuario=$usuario";

// Variable $result hold the connection data and the query
$result = $conn-> query($registros);

// Variable $count hold the result of the query
// $count = mysqli_num_rows($result);
echo"<form action='updateusuario.php?id=".$usuario."' method='POST'>";
echo "<br>
<br>";
$fila =mysqli_fetch_array($result);
echo"<label> identificador</label><br>";
echo"<input type='text' value='".$usuario."'<br>";
echo"<label>Nombre: </label></br>";
echo"<input type='text' value='".$fila ["contrasena"]."' name='contrasena'></br>";
echo"<label>Precio: </label></br>";
echo"<input type='text' value='".$fila ["Rol"]."' name='Rol'></br>";
echo"<input type='submit' >";
echo"</form>";
?>