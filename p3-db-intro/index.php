<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>...</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Porto</td>
                <td>...</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Lisboa</td>
                <td>...</td>
            </tr>
        </tbody>
    </table>
    <?php
    $countryCode = isset($_GET["country"]) ? $_GET["country"] : "USA";

    echo "<h1>Cities in $countryCode</h1>";

    $mysqli = new mysqli("127.0.0.1", "root", "", "world", 3307);
    $result = $mysqli->query("SELECT * FROM city WHERE countryCode = '$countryCode'");

    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>";
        echo $row["Name"];
        echo "</li>";
    }
    echo "</ul>";

    ?>
</body>

</html>