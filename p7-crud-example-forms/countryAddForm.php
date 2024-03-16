<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="./styles/main.css">
</head>

<body>
    <div id="pageWrapper">
        <h2>Add a new Country</h2>
        <form id="addCountryForm" action="countryAddHandler.php" method="post">
            <input type="text" name="code" placeholder="Code"><br>
            <input type="text" name="name" placeholder="Name"><br>
            <select name="continent">
                <option>Asia</option>
                <option>Europe</option>
                <option>North America</option>
                <option>Africa</option>
                <option>Oceania</option>
                <option>Antarctica</option>
                <option>South America</option>
            </select><br>
            <button class="addButton">Add Country</button>
        </form>
    </div>
</body>

</html>