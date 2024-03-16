<?php
$code = isset($_POST["code"]) ? $_POST["code"] : "";
$name = isset($_POST["name"]) ? $_POST["name"] : "";
$continent = isset($_POST["continent"]) ? $_POST["continent"] : "";

$mysqli = new mysqli("127.0.0.1", "root", "", "world", 3307);
$statement = $mysqli->prepare("

       INSERT INTO country (Code, Name, Continent) VALUES (?, ?, ?)

   ");

$statement->bind_param("sss", $code, $name, $continent);

$insertResult = $statement->execute();

if ($insertResult) {
    header('Location: ./showCountries.php');
} else {
    echo ("Something went wrong...");
}
