<?php
// $user1 = "ivan"; 
// $user1_password = "ivan";

// $user2 = "badi";
// $user2_password = "badi";
?> <html>
    <script>
        function usuario () {
       // alert("¡El usuario no es correcto!");
        //windows.location ='web.html';
        if(confirm("¡El usuario no es correcto! Pulsa aceptar para volver a la pagina anterior.")) document.location = 'web.html';
        }
        function error() {
            if(confirm("No admitimos numeros. Pulsa aceptar para volver")) document.location = 'web.html';
        }
    </script>
    </html>
 <?php


// if (($user1 == $user && $user1_password == $password || 
    //  $user2 == $user && $user2_password == $password)){
    // echo "OK";
// } else{
    // echo "KO";
// }

$servername = "localhost";
$username = "root";
$password = "Admin1234";
$dbname = "web";
$port = 3307;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['user'];
$password = $_POST['password'];

// $sql = "INSERT INTO Info (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";
$sql = "select * from Info where Usuario='$user';";
// echo $sql;

$result = $conn->query($sql);
/*
$X = var_dump ($result);
echo $X;
*/

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($user == $row["Usuario"]){
        //echo $row["Hash"];
        if (password_verify($password, $row['Hash'])) {
            header ("Location: hall.php");
        } else{
           echo "error";
        }   
    } else {
        echo "KO2";
    }
} else {
    echo "<script>
    usuario();
</script>";
}


/* if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
 } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
}

 if ($result->num_rows > 0) {

    
    if (password_verify($password,$X)){
        echo "OK";
    } else{
        echo "KO";
    }
 }*/
$conn->close();


?> 