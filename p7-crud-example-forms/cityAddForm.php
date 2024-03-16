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
    $mysqli = new mysqli("127.0.0.1", "root", "", "world", 3307);
    $statement = $mysqli->prepare("SELECT Code, Name FROM country");
    $statement->execute();

    $result = $statement->get_result();
    ?>
    <div id="pageWrapper">
        <h2>Add a new City</h2>
        <form id="addCityForm" action="cityAddHandler.php" method="post">
            <input type="text" name="name" placeholder="Name"><br>
            <select name="countryCode">
                <?php
                while ($row = $result->fetch_assoc()) {
                    $code = $row["Code"];
                    $name = $row["Name"];
                    echo "<option value='$code'>$name</option>";
                }
                ?>
            </select><br>
            <input type="text" name="district" placeholder="District"><br>
            <input type="number" name="population" placeholder="Population"><br>
            <button class="addButton">Add City</button>
        </form>
    </div>
</body>

</html>