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
echo"<input type='text' value='".$usuario."' disabled><br>";
echo"<label>Nombre: </label></br>";
echo"<input type='text' value='".$fila ["usuario"]."' name='usuario'></br>";
echo"<label>Descrippcion: </label></br>";
echo"<input type='text' value='".$fila ["constrasena"]."' name='contrasena'></br>";
echo"<label>Precio: </label></br>";
echo"<input type='text' value='".$fila ["Rol"]."' name='Rol'></br>";
echo"<input type='submit' >";
echo"</form>";
?>