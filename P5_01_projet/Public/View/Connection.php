<?php


$title = 'Connection';

ob_start();


?>
    <fieldset>
        <form action="index.php?action=triloualaoudadhefgzi" method="post">
            <input type="text" placeholder="un champ">
            <input type="text" placeholder="un champ">
            <input type="submit" class="btn btn-primary">
        </form>
    </fieldset>




<?php
$content = ob_get_clean();
require_once ('Public/Template/Template.php');