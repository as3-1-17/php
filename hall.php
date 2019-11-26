<!DOCTYPE html>
<html>
<head>
<style>
.crear{
    background-color: brown;
    width: 20%;
    display: flex;
    flex-wrap: nowrap;
   
} 

.login{
  background-color: #161a9c;
  width: 100px;
  margin-left: 80%;
  margin-top: 4%;
  position: absolute;
  text-align: center;
  line-height: 35px;
  font-size: 30px;
}

.cuerpo {
    background-color: green;

}
.linea {
    background-color: black;
    width: 100%;
    font-size: 40%;
}
.margen {
    margin:5%;
}
.inventario {
    margin-left:0,5%;
}

</style>
<div class="login">
<form action="lobby.php"> <input type="submit"  value="Exit" ></form> 
    </div>
</head>
<body class="cuerpo">
    <div class="crear">
    <form action="insert_create.php" method ="POST">
    <div class="margen">
    <h1> INSERTAR EN EL INVENTARIO</h1>    
        Id:<br>
            <input type="text" name="id_N" ><br>
        Title:<br>
            <input type="text" name="T" ><br>
        Info:<br>
            <input type="text" name="I"><br>
        Img:<br>
            <input type="text" name="img"><br><br>
            <input type="submit" value="crear"><br>
       
    </div>
    
    </div><br><br>
    <div class="linea">linea</div>
</body>
</html>
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
//$update = "update inventario  set id = 0 where titulo='cable'";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='inventario'><h2>ID: </h2><h4>" . $row["id"]. "</h4><h2> Title: </h2><h4>" . $row["titulo"]. "</h4> <h2>Info:</h2><h4>" . $row["info"]. "</h4> <img width='35%' src=img/" . $row["img"] . "><br>";
        ?>
<html>
<body>    
        <div>
        <html>
                <br><form action="delete.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row["id"]?>">
                    <input type="submit" value="Delete">
                </form><br>
                <form action="update.php" method ="POST">
                    <input type="hidden" name="id" value="<?php echo $row["id"]?>">
                    <h3>Id:<br></h3>
                    <input type="text" name="id_N" value="<?php echo $row["id"]?>"><br>
                    <h3>Title:<br></h3>
                    <input type="text" name="T" value="<?php echo $row["titulo"]?>"><br>
                    <h3> Info:<br></h3>
                    <input type="text" name="I" value="<?php echo $row["info"]?>"><br>
                    <h3>Img:<br></h3>
                    <input type="text" name="img" value="<?php echo $row["img"]?>"><br><br>
                    <input type="submit" value="actualizar"><br><br><div class="linea">linea</div>
                </form>    
        </div>
        </div>
    </html> <?php
 
    }
    ?>
    
    </body>
</html>
<?php
} else {
    echo "La base de datos esta vacia";
}
$conn->close();
?>

