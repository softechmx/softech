
<?php

include 'conn.php';
$id=$_GET['id'];
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to check if the email already exist
$registros = "SELECT * FROM catalogo WHERE id=$id";

// Variable $result hold the connection data and the query
$result = $conn-> query($registros);

// Variable $count hold the result of the query
// $count = mysqli_num_rows($result);
echo"<form action='updatecatalogo.php?id=".$id."' method='POST'>";
echo "<br>
<br>";
$fila =mysqli_fetch_array($result);
echo"<label> identificador</label><br>";
echo"<input type='text' value='".$id."' disabled><br>";
echo"<label>Nombre: </label></br>";
echo"<input type='text' value='".$fila ["nombre"]."' name='nombre'></br>";
echo"<label>Descrippcion: </label></br>";
echo"<input type='text' value='".$fila ["descripcion"]."' name='descripcion'></br>";
echo"<label>Precio: </label></br>";
echo"<input type='text' value='".$fila ["precio"]."' name='precio'></br>";
echo"<input type='submit' >";
echo"</form>";
?>