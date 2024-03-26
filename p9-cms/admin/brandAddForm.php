<!DOCTYPE html>
<html lang="en">

<?php require_once("./head.php"); ?>

<body>
    <?php require_once("./nav.php"); ?>
    <h2>Add new Brand</h2>
    <form action="brandAddHandler.php" method="post">
        <input type="text" name="name" placeholder="Brand name"><br>

        <button class="addButton">Add Brand</button>
    </form>
</body>

</html>