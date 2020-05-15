<?php


$title = 'PostUpdate';

ob_start();


?>
    <form action="index.php?action=youhou" method="post">
        <input type="text" placeholder="là il y aura deja des trucs dedans">
        <input type="text" placeholder="là il y aura deja des trucs dedans">
        <input type="text" placeholder="là il y aura deja des trucs dedans">
    </form>

<?php
$content = ob_get_clean();
require_once ('Public/Template/Template.php');