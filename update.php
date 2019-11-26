<?php
$servername = "localhost";
$username = "root";
$password = "Admin1234";
$dbname = "web";
$port = 3307;
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname,$port);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_POST['id'];
$id_N = $_POST['id_N'];
$T = $_POST['T'];
$I = $_POST['I'];
$img = $_POST['img'];

$update = "update inventario set id='$id_N',titulo='$T',info='$I',img='$img' where id='$id'";

//echo $update;

$result = $conn->query($update);
if ($conn->query($update) === TRUE) {
    echo "Actualizado correctamente";
    header ("Location: hall.php");
} 
else {
    echo "no se ha podido actualizar";
}




$conn->close();