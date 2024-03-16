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
    $statement = $mysqli->prepare("SELECT * FROM country");
    $statement->execute();

    $result = $statement->get_result();
    ?>
    <div id="pageWrapper">
        <a href="./countryAddForm.php" class="addLink">Add New Country</a>
        <table>
            <thead>
                <tr>
                    <th>Country Code</th>
                    <th>Name</th>
                    <th>Continent</th>
                </tr>
            </thead>
            <tbody id="countryTableBody">
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['Code'] ?></td>
                        <td><?= $row['Name'] ?></td>
                        <td><?= $row['Continent'] ?></td>
                        <td><a href="#" class="editLink">✏️</a>
                            <a href="./countryDeleteHandler.php?code=<?= $row['Code'] ?>" class="deleteLink">❌</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        const countryTableBody = document.querySelector("#countryTableBody");
        countryTableBody.addEventListener("click", function(event) {
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