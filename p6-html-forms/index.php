<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $mysqli = new mysqli("127.0.0.1", "root", "", "world", 3307);
    $statement = $mysqli->prepare("SELECT Code, Name FROM country");
    $statement->execute();

    $result = $statement->get_result();
    ?>
    <form id="form1" action="formHandler.php" method="post">
        <input type="text" name="name" placeholder="Name"><br>
        <select name="countryCode">
            <?php
            while ($row = $result->fetch_assoc()) {
                $code = $row["Code"];
                $name = $row["Name"];
                echo "<option value='$code'>$name</option>";
            }
            ?>
        </select><br>
        <input type="text" name="district" placeholder="District"><br>
        <input type="number" name="population" placeholder="Population"><br>
        <button>Add City</button>
    </form>

    <a href="https://google.com" id="link1" target="_blank">Vai para o Google</a>

    <script>
        const form1 = document.querySelector("#form1");
        const link1 = document.querySelector("#link1");

        // form1.addEventListener("submit", function (event) {
        //     event.preventDefault();
        // });

        link1.addEventListener("click", function(event) {
            event.preventDefault();
        });
    </script>
</body>

</html>