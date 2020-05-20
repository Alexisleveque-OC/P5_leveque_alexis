<?php


$title = 'PostView';

ob_start();


?>

    <h1>la il y aura un article</h1>
    <h2> avec un chapeau</h2>
    <p>un Lorem ipsum</p>


    <h4>
        <ul>
            <li>et quelques commentaires</li>
            <li>et quelques commentaires</li>
            <li>et quelques commentaires</li>
            <li>et quelques commentaires</li>
        </ul>
    </h4>



<?php
$content = ob_get_clean();
require_once('Template.php');