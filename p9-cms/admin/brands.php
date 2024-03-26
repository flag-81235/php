<!DOCTYPE html>
<html lang="en">

<?php require_once("./head.php"); ?>

<body>
    <?php require_once("./nav.php"); ?>
    <?php

    $mysqli = new mysqli("localhost", "root", "", "stand_used_cars", 3307);
    $statement = $mysqli->prepare("SELECT * FROM brands ORDER BY id DESC");
    $statement->execute();

    $result = $statement->get_result();
    ?>

    <a href="./brandAddForm.php">Add a new brand</a>
    <table>
        <thead>
            <tr>
                <th>Brand name</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= $row["name"] ?></td>
                    <td>
                        <a href="./brandEditForm.php?id=<?= $row["id"] ?>">Edit</a>
                        <a href="./brandDelete.php?id=<?= $row["id"] ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>