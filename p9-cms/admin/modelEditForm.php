<!DOCTYPE html>
<html lang="en">

<?php require_once("./head.php"); ?>

<body>
    <?php require_once("./nav.php"); ?>
    <?php

    $id = isset($_GET["id"]) ? $_GET["id"] : "";

    $mysqli = new mysqli("localhost", "root", "", "stand_used_cars", 3307);

    $statement = $mysqli->prepare("SELECT * FROM models WHERE id = ?");
    $statement->bind_param("i", $id);

    $statement->execute();

    $result = $statement->get_result();

    $row = $result->fetch_object();

    ?>
    <h2>Edit <?= $row->name ?></h2>
    <form action="modelEditHandler.php" method="post">
        <input type="hidden" name="id" value="<?= $row->id ?>"><br>
        <input type="text" name="name" placeholder="Model name" value="<?= $row->name ?>"><br>
        <select name="brandId">
            <?php
            $brandsStatement = $mysqli->prepare("SELECT * FROM brands ORDER BY name");
            $brandsStatement->execute();

            $brandsResult = $brandsStatement->get_result();

            while ($brandsRow = $brandsResult->fetch_object()) {
                if ($row->brand_id == $brandsRow->id) {
                    echo "<option selected value='$brandsRow->id'>$brandsRow->name</option>";
                } else {
                    echo "<option value='$brandsRow->id'>$brandsRow->name</option>";
                }
            }
            ?>
        </select>
        <button>Save</button>
    </form>
</body>

</html>