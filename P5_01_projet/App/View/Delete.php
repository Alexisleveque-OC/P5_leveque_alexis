<?php

$title = 'Confirmation Suppretion';

ob_start();


?>

    <main class="container">


        <h2>
            <?= $post->getTitle(); ?>
        </h2>
        <h4>
            <?= $post->getChapo(); ?>
        </h4>
        <p>
            <?= $post->getContent(); ?>
        </p>
        <p>
            <?= $post->getUserId(); ?> ça c'est le nom de l'utilisateur normalement
        </p>
        <p>Êtes vous sur de vouloir supprimer cette article ?</p>
        <form method="POST">
            <button name="yes" type="submit" class="btn btn-danger">oui !</button>
            <button name="no" type="submit" class="btn btn-primary">non !</button>
        </form>
        <?php

        ?>
    </main>

<?php
$content = ob_get_clean();
require_once('Template.php');