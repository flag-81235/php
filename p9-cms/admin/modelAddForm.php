<!DOCTYPE html>
<html lang="en">

<?php require_once("./head.php"); ?>

<body>
    <?php require_once("./nav.php"); ?>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "stand_used_cars", 3307);

    $brandsStatement = $mysqli->prepare("SELECT * FROM brands ORDER BY name");
    $brandsStatement->execute();

    $brandsResult = $brandsStatement->get_result();
    ?>

    <h2>Add new Model</h2>
    <form action="modelAddHandler.php" method="post">
        <input type="text" name="name" placeholder="Model name"><br>
        <select name="brandId">
            <?php
            while ($brandsRow = $brandsResult->fetch_object()) {
                echo "<option value='$brandsRow->id'>$brandsRow->name</option>";
            }
            ?>
        </select>
        <button class="addButton">Add Model</button>
    </form>
</body>

</html>