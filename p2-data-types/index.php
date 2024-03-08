<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Data Types</h1>
    <!-- <ul>
        <li>Boolean</li>
        <li>String</li>
        <li>Number</li>
        <li>Array</li>
        <li>Object</li>
    </ul> -->

    <?php
    // // Array
    // $numbers = array("Helder", "Rodolfo", "Iavik", "Jorge", "Luis", "Igor");

    // // Array associativo
    // $person = array(
    //     "name" => "Helder",
    //     "age" => 43,
    //     "city" => "Porto"
    // );

    $dataTypes = array("Boolean", "String", "Number", "Array", "Object");
    echo "<ul>";
    // for ($i = 0; $i < count($dataTypes); $i++) {
    //     echo "<li>";
    //     echo $dataTypes[$i];
    //     echo "</li>";
    // }
    foreach ($dataTypes as $dataType) {
        echo "<li>$dataType</li>";
    }
    echo "</ul>";

    ?>
</body>

</html>