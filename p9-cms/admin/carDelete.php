<?php
$id = isset($_GET["id"]) ? $_GET["id"] : "";

$mysqli = new mysqli("127.0.0.1", "root", "", "stand_used_cars", 3307);
$statement = $mysqli->prepare("DELETE FROM cars WHERE id = ?");

$statement->bind_param("i", $id);

$deleteResult = $statement->execute();

if ($deleteResult) {
    header('Location: ./cars.php');
} else {
    echo ("Something went wrong...");
}
