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
$del = "delete from inventario where id='$id'";


$result = $conn->query($del);
if ($conn->query($del) === TRUE) {
    echo "se ha borrado";
    header ("Location: hall.php");
} 
else {
    echo "no se ha podido borrar";
}




$conn->close();