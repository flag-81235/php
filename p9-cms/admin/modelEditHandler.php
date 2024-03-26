<?php
$id = isset($_POST["id"]) ? $_POST["id"] : -1;
$name = isset($_POST["name"]) ? $_POST["name"] : "";
$brandId = isset($_POST["brandId"]) ? $_POST["brandId"] : -1;

$mysqli = new mysqli("127.0.0.1", "root", "", "stand_used_cars", 3307);
$statement = $mysqli->prepare("
       UPDATE models SET name = ?, brand_id = ?
       WHERE id = ?
");

$statement->bind_param("sii", $name, $brandId, $id);

$insertResult = $statement->execute();

if ($insertResult) {
    header('Location: ./models.php');
} else {
    echo ("Something went wrong...");
}
