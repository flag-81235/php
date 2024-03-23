<!DOCTYPE html>
<html lang="en">

<?php require_once("./head.php"); ?>

<body>
    <?php require_once("./nav.php"); ?>
    <?php

    $mysqli = new mysqli("localhost", "root", "", "stand_used_cars", 3307);
    $statement = $mysqli->prepare("SELECT * FROM cars ORDER BY id DESC");
    $statement->execute();

    $result = $statement->get_result();
    ?>

    <a href="./carAddForm.php">Add a new car</a>
    <table>
        <thead>
            <tr>
                <th>License Plate</th>
                <th>Color</th>
                <th>Brand</th>
                <th>Model</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= $row["plate"] ?></td>
                    <td><?= $row["color"] ?></td>
                    <td><?= $row["brand"] ?></td>
                    <td><?= $row["model"] ?></td>
                    <td>
                        <a href="./carEditForm.php?id=<?= $row["id"] ?>">Edit</a>
                        <a href="./carDelete.php?id=<?= $row["id"] ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>