<?php


$title = 'Accueil';

ob_start();


?>
    <header class="masthead">
        <img src="../Image/banner.jpg" alt="banner" class="banner">
        <div class="site-heading">
            <h1>Alexis LEVEQUE</h1>
            <span class="subheading">May the force be with you</span>
        </div>
    </header>
<h1>ET coucou !!!</h1>




<?php
$content = ob_get_clean();
require_once ('../Template/Template.php');