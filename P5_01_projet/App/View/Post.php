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
            Ecrit le <strong class="col-2"><?= $post->getDateCreation()->format('d-m-Y') ?></strong>
            à <strong class="col-2"><?= $post->getDateCreation()->format('H:m:s') ?></strong>
            par <strong class="col-2"><?= $user->getUserName(); ?></strong>
        </p>

        <h2>Commentaires</h2>

        <form action="\index.php?action=addComment&amp;id=<?= $post->getIdPost() ?>" method="post">

            <label for="comment">Ajouter un commentaire</label><br/>
            <textarea class="form-control" rows="10" id="comment" name="content"></textarea>

            <input type="submit"/>

        </form>
        <?php
        $i = 0;
        foreach ($comments as $comment) {
            ?>
            <div class="row comment">
                <h2 class="col-12">
                    <?= $comment->getUserName(); //TODO ressort pas le user name du comment mais celui du post?>
                </h2>
                <p class="col-12">
                    <?= $comment->getContent(); ?>
                </p>
                <p class="col-12">
                </p>
                <p class="col-12">
                    Ecrit le <strong class="col-2"><?= $comment->getDateCreation()->format('d-m-Y') ?></strong>
                    à <strong class="col-2"><?= $comment->getDateCreation()->format('H:m:s') ?></strong>
                </p>
            </div>
            <hr>
            <?php

            $i++;

        }

        ?>
    </main>

<?php
$content = ob_get_clean();
require_once('Template.php');