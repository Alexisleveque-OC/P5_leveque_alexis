<?php


$title = 'PostView';

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
            <?= $user->getUserName(); ?>
        </p>
        <?php
        //TODO : à voir pour afficher le nom de l'utilisateur plutot que l'id user + format date

        ?>
    </main>

<?php
$content = ob_get_clean();
require_once('Template.php');