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
//
$sql = "SELECT * FROM inventario";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. "<br> title: " . $row["titulo"]. "<br> info:" . $row["info"]. "<br> <img width='20%' src=img/" . $row["img"] . "><br></h1>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<html>
<style>
.flex-containers{
  background-color: #f1f1f1;
  width: 100px;
  margin-left: 80%;
  margin-top:-35%;
  text-align: center;
  line-height: 75px;
  font-size: 30px;
 
}
</style>
<div class=flex-containers>

<form action="web.html"> <input type="submit"  value="Login" ></form> </div>

</html>