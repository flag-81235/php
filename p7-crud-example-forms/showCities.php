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
    $mysqli = new mysqli("localhost", "root", "", "world", 3307);
    $statement = $mysqli->prepare("SELECT * FROM city ORDER BY ID DESC LIMIT 20");
    $statement->execute();

    $result = $statement->get_result();
    ?>
    <div id="pageWrapper">
        <a href="./cityAddForm.php" class="addCityLink">Add New City</a>
        <table>
            <thead>
                <tr>
                    <th>City name</th>
                    <th>Country Code</th>
                    <th>District</th>
                    <th>Population</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="cityTableBody">
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['Name'] ?></td>
                        <td><?= $row['CountryCode'] ?></td>
                        <td><?= $row['District'] ?></td>
                        <td><?= $row['Population'] ?></td>
                        <td><a href="#" class="editLink">✏️</a>
                            <a href="./cityDeleteHandler.php?id=<?= $row['ID'] ?>" class="deleteLink">❌</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        const cityTableBody = document.querySelector("#cityTableBody");
        cityTableBody.addEventListener("click", function(event) {
            if (event.target.className !== "deleteLink") {
                return;
            }
            if (!confirm("Are you sure you want to delete?")) {
                event.preventDefault();
            }
        });
    </script>

</body>

</html>