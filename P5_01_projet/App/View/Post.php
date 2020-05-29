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
            <?= $post->getDateCreation()->format('d-m-Y H:m:s') ?>
        </p>

        <h2>Commentaires</h2>

        <form action="\index.php?action=addComment&amp;id=<?= $post->getIdPost() ?>" method="post">

            <label for="comment">Ajouter un commentaire</label><br/>
            <textarea col="100" rows="10" id="comment" name="content"></textarea>

            <input type="submit"/>

        </form>
    </main>

<?php
$content = ob_get_clean();
require_once('Template.php');