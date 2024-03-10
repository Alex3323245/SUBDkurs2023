<?php

require "dbconnect.php";
require "menu.php";
require "footer.php";

echo '<main class="container" style="margin-top: 100px">';


switch ($_GET['page']) {
    case 'c':
        require "cat.php";

    case 't':
}
echo '</main>';

?>

