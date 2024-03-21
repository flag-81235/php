<?php
$pagename =  basename($_SERVER["PHP_SELF"]);

$menu = [
    "index.php" => "Homepage",
    "gallery.php" => "Gallery",
    "contacts.php" => "Contacts",
    "aboutus.php" => "About us",
]

?>

<header>
    <nav>
        <?php
        foreach ($menu as $key => $value) {
            if ($key == $pagename) {
                echo "<a href='$key' class='activeLink'>$value</a> | ";
            } else {
                echo "<a href='$key'>$value</a> | ";
            }
        }
        ?>
    </nav>
</header>