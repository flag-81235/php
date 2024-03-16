<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="./styles/main.css">
</head>

<body>
    <?php
    $id = isset($_GET["id"]) ? $_GET["id"] : "";

    // Create DB connection
    $mysqli = new mysqli("localhost", "root", "", "world", 3307);

    // Read City to edit based on ID
    $statement = $mysqli->prepare("SELECT * FROM city WHERE Id = ?");
    $statement->bind_param("i", $id);
    $statement->execute();

    $result = $statement->get_result();
    $city = $result->fetch_assoc();

    // fetch all countries to population Select field
    $statement = $mysqli->prepare("SELECT Code, Name FROM country");
    $statement->execute();

    $countriesResult = $statement->get_result();

    ?>
    <div id="pageWrapper">
        <h2>Edit <?= $city["Name"] ?></h2>
        <form id="editCityForm" action="cityEditHandler.php" method="post">
            <input type="hidden" name="id" value="<?= $city["ID"] ?>">
            <input type="text" name="name" placeholder="Name" value="<?= $city["Name"] ?>"><br>
            <select name="countryCode">
                <?php
                while ($countryRow = $countriesResult->fetch_assoc()) {
                    $code = $countryRow["Code"];
                    $name = $countryRow["Name"];
                    if ($city["CountryCode"] == $code) {
                        echo "<option value='$code' selected>$name</option>";
                    } else {
                        echo "<option value='$code'>$name</option>";
                    }
                }
                ?>
            </select><br>
            <input type="text" name="district" placeholder="District" value="<?= $city["District"] ?>"><br>
            <input type="number" name="population" placeholder="Population" value="<?= $city["Population"] ?>"><br>
            <button class="SaveButton">Save City</button>
        </form>
    </div>
</body>

</html>