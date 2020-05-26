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
            <?php
            echo(substr($post->getContent(), 0, 250));
            ?>
            ...<br>
            <a href="/index.php?action=post&id=<?= $post->getIdPost() ?>">Voir la suite </a>

        </p>
        <p>
            <?= $post->getUserId(); ?> ça c'est le nom de l'utilisateur normalement
        </p>
        <?php
        //TODO : à voir pour afficher le nom de l'utilisateur plutot que l'id user + format date

        ?>
    </main>

<?php
$content = ob_get_clean();
require_once('Template.php');