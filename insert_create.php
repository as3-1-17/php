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

$insert = "insert into inventario values ($id_N,'$T','$I','$img');";

//echo $update;

//$result = $conn->query($insert);
if ($conn->query($insert) === TRUE) {
    echo "Creado correctamente";
    header ("Location: hall.php");
} 
else {
    echo "no se ha podido crear correctamente";
}




$conn->close();