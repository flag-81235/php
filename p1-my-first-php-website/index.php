<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $a = 2;
    $b = 4;
    $sum = $a + $b;

    $name = "Helder";

    echo "<h2>A soma é: " . $sum . "</h2>\n";
    echo "<p>Ola eu sou o $name</p>\n";

    $age = 5;
    if ($age >= 18) {
        echo "<p>Toma la uma cerveja!</p>\n";
    } else {
        echo "<p>Toma la uma cola!</p>\n";
    }

    echo "<ul>\n";
    for ($i = 0; $i < 10; $i++) {
        echo "<li>Indice: $i</li>\n";
    }
    echo "</ul>\n";
    ?>
    <h1>My First Website!!!!!</h1>
</body>

</html>