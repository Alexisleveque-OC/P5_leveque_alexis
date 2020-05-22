<?php


$title = 'Connection';

ob_start();


?>
    <fieldset>
        <form action="../../Public/index.php?action=triloualaoudadhefgzi" method="post">
            <input type="text" placeholder="un champ">
            <input type="text" placeholder="un champ">
            <input type="submit" class="btn btn-primary">
        </form>
    </fieldset>




<?php
$content = ob_get_clean();
require_once('Template.php');