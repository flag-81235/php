<?php
$id = isset($_GET["id"]) ? $_GET["id"] : "";

$mysqli = new mysqli("127.0.0.1", "root", "", "world", 3307);
$statement = $mysqli->prepare("

       DELETE FROM city WHERE ID = ?

   ");

$statement->bind_param("i", $id);

$deleteResult = $statement->execute();

if ($deleteResult) {
    header('Location: ./showCities.php');
} else {
    echo ("Something went wrong...");
}
