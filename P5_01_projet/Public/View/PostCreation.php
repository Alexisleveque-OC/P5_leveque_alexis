<?php


$title = 'PostCreation';

ob_start();


?>
    <form action="index.php?action=youhou" method="post">
        <input type="text">
        <input type="text">
        <input type="text">
    </form>

<?php
$content = ob_get_clean();
require_once ('../Template/Template.php');