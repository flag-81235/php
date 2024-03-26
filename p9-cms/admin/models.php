<!DOCTYPE html>
<html lang="en">

<?php require_once("./head.php"); ?>

<body>
    <?php require_once("./nav.php"); ?>
    <?php

    $brand = isset($_GET["brand"]) ? $_GET["brand"] : "%";

    $mysqli = new mysqli("localhost", "root", "", "stand_used_cars", 3307);
    $statement = $mysqli->prepare("
    SELECT models.id, models.name, brands.name AS brand
    FROM models
    JOIN brands ON brands.id = models.brand_id
    WHERE brands.name LIKE ?
    ORDER BY models.id DESC
    ");
    $statement->bind_param("s", $brand);
    $statement->execute();

    $result = $statement->get_result();
    ?>

    <a href="./modelAddForm.php">Add a new model</a>

    <?php
    $brandsStatement = $mysqli->prepare("SELECT * FROM brands ORDER BY name");
    $brandsStatement->execute();

    $brandsResult = $brandsStatement->get_result();
    ?>
    <select id="selectBrand">
        <option value="%">all brands</option>
        <?php
        while ($brandsRow = $brandsResult->fetch_object()) {
            if ($brandsRow->name == $brand) {
                echo "<option selected>$brandsRow->name</option>";
            } else {
                echo "<option>$brandsRow->name</option>";
            }
        }
        ?>
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
    <script>
        const selectBrand = document.querySelector("#selectBrand");
        selectBrand.addEventListener("change", function() {
            window.location.href = `./models.php?brand=${selectBrand.value}`;
        });
    </script>
</body>

</html>