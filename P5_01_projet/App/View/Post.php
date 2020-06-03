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
            Ecrit le <strong class="col-2"><?= $post->getDateCreation()->format('d-m-Y') ?></strong>
            à <strong class="col-2"><?= $post->getDateCreation()->format('H:m:s') ?></strong>
            par <strong class="col-2"><?= $post->getUser()->getUserName(); ?></strong>
        </p>

        <h2>Commentaires</h2>

        <form action="/index.php?action=addComment&id=<?= $post->getIdPost() ?>" method="post">

            <label for="comment">Ajouter un commentaire</label><br/>
            <textarea class="form-control" rows="10" id="comment" name="content"></textarea>

            <input type="submit"/>

        </form>
        <?php
        foreach ($comments as $comment) :
        dd($comments);
            ?>
            <div class="row comment">
                <h5 class="col-10">
                    <?=htmlspecialchars( $comment->getUser()->getUsername()); ?>
                </h5>
                <p class="col-12">
                    <?= htmlspecialchars($comment->getContent()); ?>
                </p>
                <p class="col-12">
                </p>
                <p class="col-12">
                    Ecrit le <strong class="col-2"><?= htmlspecialchars($comment->getDateCreation()->format('d-m-Y')) ?></strong>
                    à <strong class="col-2"><?= htmlspecialchars($comment->getDateCreation()->format('H:m:s')) ?></strong>
                </p>
            </div>
            <hr>
            <?php    endforeach;    ?>
    </main>

<?php
$content = ob_get_clean();
require_once('Template.php');