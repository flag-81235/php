<!DOCTYPE html>
<html lang="en">

<?php require_once("./head.php"); ?>

<body>
    <?php require_once("./nav.php"); ?>
    <h2>Add new Car</h2>
    <form action="carAddHandler.php" method="post">
        <input type="text" name="plate" placeholder="License Plate"><br>
        <input type="text" name="color" placeholder="Main Color"><br>
        <input type="text" name="brand" placeholder="Brand"><br>
        <input type="text" name="model" placeholder="Model"><br>

        <button class="addButton">Add Car</button>
    </form>
</body>

</html>