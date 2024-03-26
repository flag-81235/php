<?php
$name = isset($_POST["name"]) ? $_POST["name"] : "";


$mysqli = new mysqli("127.0.0.1", "root", "", "stand_used_cars", 3307);
$statement = $mysqli->prepare("

       INSERT INTO brands (id, name) VALUES (NULL, ?)

   ");

$statement->bind_param("s", $name);

$insertResult = $statement->execute();

if ($insertResult) {
    header('Location: ./brands.php');
} else {
    echo ("Something went wrong...");
}
