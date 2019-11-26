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

$user = $_POST['user'];
$password = $_POST['password'];

// HASH CODIGO -------------------------------------------------------------

$hash =password_hash($password, PASSWORD_DEFAULT);  

// $hash = '$2y$10$P1zZdXnApJOKvPqu8m3wheUxQvQ0FByQpFZPhc9CuiRrR7DS9/HNW';
//echo $hash . "<br>";

if (password_verify($password,$hash))
{
    //echo "success!";
}

else {
    echo "error!";
}
//------------------------------------------------------------------------
//--------------SQL-------------------------------------------------------
$insert = "INSERT INTO Info ( Usuario, Hash)
VALUES ('$user', '$hash')";
$consulta = "SELECT Usuario FROM Info where usuario='$user'";
?>
<html>
    <head>
        <h1>LOGIN</h1>
    </head>
    <script>
        function registrado() {
        alert("Este usuario ya esta registrado");
        }
        function creado() {
        alert("Usuario creado correctamente");
        }
    </script>
    <body>
        <form action ="php2.php" method="POST">
            Name:<br>
            <input type="text" name="user" value=""><br>
            Password:<br>
            <input type="text" name="password" >
            <br><br>
            <input type="submit" value="submit">
        </form>
        <form action ="register html.html" method="POST">
            <input type="submit" value="register">
        </form>
    
<?php
$result = $conn->query($consulta);
if ($result->num_rows > 0) {
    echo "<script>
             registrado(); 
        </script>";
    //echo "<h1>True</h1>";
    //header ("Location: web.html"); >
} 
else {
    //echo "<h1>False</h1>";
    if ($conn->query($insert) === TRUE) {
    echo "<script>
            creado(); 
        </script>";
    } else {
    echo "Error: " . $insert . "<br>" . $conn->error;
}
}
$conn->close();
?>
<!-- ------------------------------------------------------------>

</body>
</html>