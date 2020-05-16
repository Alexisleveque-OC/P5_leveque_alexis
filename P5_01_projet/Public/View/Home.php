<?php


$title = 'Accueil';

ob_start();


?>

<h1>ET coucou !!!</h1>




<?php
$content = ob_get_clean();
require_once ('../Template/Template.php');