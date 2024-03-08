<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/main.css">
</head>

<body>
    <?php

    // if (isset($_GET["teste"])) {
    //     $teste = ($_GET["teste"]);
    // } else {
    //     $teste = "valor por defeito";
    // }

    $teste = isset($_GET["teste"]) ? $_GET["teste"] : "valor por defeito";
    $number = isset($_GET["n"]) ? $_GET["n"] : 0;


    echo "ola $teste";

    echo "<h2>Tabuada dos $number</h2>";
    echo "<p>";
    for ($i = 1; $i <= 10; $i++) {
        $res = $number * $i;
        echo "$number x $i = $res<br>";
    }
    echo "</p>";

    if (strlen($teste) > 10) {
        echo "<button class='testButton'>$teste</button>";
    } else {
        echo "<button>$teste</button>";
    }

    ?>

</body>

</html>