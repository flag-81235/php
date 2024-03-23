<?php
$plate = isset($_POST["plate"]) ? $_POST["plate"] : "";
$color = isset($_POST["color"]) ? $_POST["color"] : "";
$brand = isset($_POST["brand"]) ? $_POST["brand"] : "";
$model = isset($_POST["model"]) ? $_POST["model"] : "";

$mysqli = new mysqli("127.0.0.1", "root", "", "stand_used_cars", 3307);
$statement = $mysqli->prepare("

       INSERT INTO cars VALUES (NULL, ?, ?, ?, ?)

   ");

$statement->bind_param("ssss", $plate, $color, $brand, $model);

$insertResult = $statement->execute();

if ($insertResult) {
    header('Location: ./cars.php');
} else {
    echo ("Something went wrong...");
}
