<?php
$name = isset($_POST["name"]) ? $_POST["name"] : "";
$countryCode = isset($_POST["countryCode"]) ? $_POST["countryCode"] : "";
$district = isset($_POST["district"]) ? $_POST["district"] : "";
$population = isset($_POST["population"]) ? $_POST["population"] : 0;

$mysqli = new mysqli("127.0.0.1", "root", "", "world", 3307);
$statement = $mysqli->prepare("

       INSERT INTO city VALUES (NULL, ?, ?, ?, ?)

   ");

$statement->bind_param("sssi", $name, $countryCode, $district, $population);

$insertResult = $statement->execute();

if ($insertResult) {
    header('Location: ./showCities.php');
} else {
    echo ("Something went wrong...");
}
