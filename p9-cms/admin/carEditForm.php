<!DOCTYPE html>
<html lang="en">

<?php require_once("./head.php"); ?>

<body>
    <?php require_once("./nav.php"); ?>
    <?php

    $id = isset($_GET["id"]) ? $_GET["id"] : "";

    $mysqli = new mysqli("localhost", "root", "", "stand_used_cars", 3307);

    $statement = $mysqli->prepare("SELECT * FROM cars WHERE id = ?");
    $statement->bind_param("i", $id);

    $statement->execute();

    $result = $statement->get_result();

    $row = $result->fetch_object();

    ?>
    <h2>Edit <?= $row->plate ?></h2>
    <form action="carEditHandler.php" method="post">
        <input type="hidden" name="id" value="<?= $row->id ?>"><br>
        <input type="text" name="plate" placeholder="License Plate" value="<?= $row->plate ?>"><br>
        <input type="text" name="color" placeholder="Main Color" value="<?= $row->color ?>"><br>
        <input type="text" name="brand" placeholder="Brand" value="<?= $row->brand ?>"><br>
        <input type="text" name="model" placeholder="Model" value="<?= $row->model ?>"><br>

        <button>Save</button>
    </form>
</body>

</html>