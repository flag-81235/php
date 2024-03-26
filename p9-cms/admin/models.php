<!DOCTYPE html>
<html lang="en">

<?php require_once("./head.php"); ?>

<body>
    <?php require_once("./nav.php"); ?>
    <?php

    $mysqli = new mysqli("localhost", "root", "", "stand_used_cars", 3307);
    $statement = $mysqli->prepare("
    SELECT models.id, models.name, brands.name AS brand
    FROM models
    JOIN brands ON brands.id = models.brand_id
    ORDER BY models.id DESC
    ");
    $statement->execute();

    $result = $statement->get_result();
    ?>

    <a href="./modelAddForm.php">Add a new model</a>

    <?php
    $brandsStatement = $mysqli->prepare("SELECT * FROM brands ORDER BY name");
    $brandsStatement->execute();

    $brandsResult = $brandsStatement->get_result();
    ?>
    <select>
        <?php while ($brandsRow = $brandsResult->fetch_object()) : ?>
            <option><?= $brandsRow->name ?></option>
        <?php endwhile; ?>
    </select>

    <table>
        <thead>
            <tr>
                <th>Model name</th>
                <th>Brand name</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["brand"] ?></td>
                    <td>
                        <a href="./modelEditForm.php?id=<?= $row["id"] ?>">Edit</a>
                        <a href="./modelDelete.php?id=<?= $row["id"] ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>