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

<?php
$content = ob_get_clean();
require ('Template.php');