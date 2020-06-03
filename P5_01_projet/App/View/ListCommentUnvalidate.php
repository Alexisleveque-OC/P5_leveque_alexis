<?php
$title = 'liste des commentaires à valider';

ob_start();
?>
<main class="container">
    <?php
    $i = 0;
    foreach ($comments as $comment) {
        ?>

        <div class="row comment">
            <h2 class="col-10">
                <?= htmlspecialchars($comment->getUser()->getUserName()); ?>
            </h2>
            <p class="col-12">
                <?=htmlspecialchars( $comment->getContent()); ?>
            </p>
            <p class="col-12">
            </p>
            <p class="col-12">
                Ecrit le <strong class="col-2"><?=htmlspecialchars( $comment->getDateCreation()->format('d-m-Y')) ?></strong>
                à <strong class="col-2"><?= htmlspecialchars($comment->getDateCreation()->format('H:m:s')) ?></strong>
            </p>
            <a class="btn btn-danger col-2"
                    href='/index.php?action=deleteComment&id=<?= htmlspecialchars($comment->getIdComment() )?>'">
                Supprimer
            </a>
            <a class="btn btn-primary col-2"
                    href='/index.php?action=validateComment&id=<?= htmlspecialchars($comment->getIdComment()) ?>'">
                valider
            </a>
        </div>
        <hr>
        <?php

        $i++;

    }
    ?>
</main>
<?php
$content = ob_get_clean();
require('Template.php');