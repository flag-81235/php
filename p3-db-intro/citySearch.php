<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $searchTerm = isset($_GET["search"]) ? $_GET["search"] : "";

    echo "<h1>Cities found for '$searchTerm'</h1>";

    $mysqli = new mysqli("127.0.0.1", "root", "", "world", 3307);
    $result = $mysqli->query("SELECT * FROM city WHERE Name LIKE '%$searchTerm%'");

    ?>
    <table border="1">
        <thead>
            <tr>
                <th>Identifier</th>
                <th>Name</th>
                <th>Country Code</th>
                <th>District</th>
                <th>Population Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["CountryCode"] . "</td>";
                echo "<td>" . $row["District"] . "</td>";
                echo "<td>" . $row["Population"] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>