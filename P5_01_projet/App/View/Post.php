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

<!--        <h2>Commentaires</h2>-->
<!---->
<!--        <form action="\index.php?action=addComment&amp;id=--><?//= $post->getIdPost()?><!--" method="post">-->
<!--            <div>-->
<!--                <label for="author">Auteur</label><br />-->
<!--                <input type="text" id="author" name="author" />-->
<!--            </div>-->
<!--            <div>-->
<!--                <label for="comment">Commentaire</label><br />-->
<!--                <textarea id="comment" name="comment"></textarea>-->
<!--            </div>-->
<!--            <div>-->
<!--                <input type="submit" />-->
<!--            </div>-->
<!--        </form>-->
<!--    </main>-->

<?php
$content = ob_get_clean();
require_once('Template.php');