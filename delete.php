<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

$servername = "localhost";
$username = "root";
$password = "";
$database = "materialncm";



$connection = new mysqli($servername, $username, $password, $database);

$sql = "DELETE FROM material WHERE id= $id";
$connection->query($sql);
}

header("location: /material/principal.php");
