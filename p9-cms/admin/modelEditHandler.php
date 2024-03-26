<?php
$id = isset($_POST["id"]) ? $_POST["id"] : -1;
$name = isset($_POST["name"]) ? $_POST["name"] : "";

$mysqli = new mysqli("127.0.0.1", "root", "", "stand_used_cars", 3307);
$statement = $mysqli->prepare("
       UPDATE brands SET name = ?
       WHERE id = ?
");

$statement->bind_param("si", $name, $id);

$insertResult = $statement->execute();

if ($insertResult) {
    header('Location: ./brands.php');
} else {
    echo ("Something went wrong...");
}
