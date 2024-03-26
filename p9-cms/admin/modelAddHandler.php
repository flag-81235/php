<?php
$name = isset($_POST["name"]) ? $_POST["name"] : "";
$brandId = isset($_POST["brandId"]) ? $_POST["brandId"] : "";


$mysqli = new mysqli("127.0.0.1", "root", "", "stand_used_cars", 3307);
$statement = $mysqli->prepare("

       INSERT INTO models (id, name, brand_id) VALUES (NULL, ?, ?)

   ");

$statement->bind_param("si", $name, $brandId);

$insertResult = $statement->execute();

if ($insertResult) {
    header('Location: ./models.php');
} else {
    echo ("Something went wrong...");
}
