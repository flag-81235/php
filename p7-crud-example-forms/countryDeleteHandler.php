<?php
$code = isset($_GET["code"]) ? $_GET["code"] : "";

$mysqli = new mysqli("127.0.0.1", "root", "", "world", 3307);
$statement = $mysqli->prepare("

       DELETE FROM country WHERE Code = ?

   ");

$statement->bind_param("s", $code);

$deleteResult = $statement->execute();

if ($deleteResult) {
    header('Location: ./showCountries.php');
} else {
    echo ("Something went wrong...");
}
