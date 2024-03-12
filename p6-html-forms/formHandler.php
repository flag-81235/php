<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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

    echo $insertResult;

    ?>

</body>

</html>