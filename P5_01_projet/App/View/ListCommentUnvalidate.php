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
                <?= $comment->getUserName(); ?>
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
            <button class="btn btn-danger col-2"
                    onclick="window.location.href='index.php?action=deleteComment&id=<?= $comment->getIdComment() ?>'">
                Supprimer
            </button>
            <button class="btn btn-primary col-2"
                    onclick="window.location.href='index.php?action=validateComment&id=<?= $comment->getIdComment() ?>'">
                valider
            </button>
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