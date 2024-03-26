<!DOCTYPE html>
<html lang="en">

<?php require_once("./head.php"); ?>

<body>
    <?php require_once("./nav.php"); ?>
    <?php

    $id = isset($_GET["id"]) ? $_GET["id"] : "";

    $mysqli = new mysqli("localhost", "root", "", "stand_used_cars", 3307);

    $statement = $mysqli->prepare("SELECT * FROM brands WHERE id = ?");
    $statement->bind_param("i", $id);

    $statement->execute();

    $result = $statement->get_result();

    $row = $result->fetch_object();

    ?>
    <h2>Edit <?= $row->name ?></h2>
    <form action="brandEditHandler.php" method="post">
        <input type="hidden" name="id" value="<?= $row->id ?>"><br>
        <input type="text" name="name" placeholder="Brand name" value="<?= $row->name ?>"><br>

        <button>Save</button>
    </form>
</body>

</html>