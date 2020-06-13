<?php
$title = 'liste des commentaires à valider';
?>
<main class="container">
    <?php
    if (isset($userType) && $userType == 2) {

        if ($comments == null) {
            ?>
            <h5 class="jumbotron">Il n'y a plus de commentaires à valider ou supprimer.</h5>
            <?php
        } else {
            foreach ($comments as $comment) {
                ?>

                <div class="row comment card">
                    <div class="card-body">
                        <h2 class="col-10 card-title">
                            <?= htmlspecialchars($comment->getUser()->getUserName()); ?>
                        </h2>
                        <p class="col-12 card-text">
                            <?= htmlspecialchars($comment->getContent()); ?>
                        </p>
                    </div>
                    <p class="col-12 card-footer">
                        Ecrit le <strong
                                class="col-2"><?= htmlspecialchars($comment->getDateCreation()->format('d-m-Y')) ?></strong>
                        à <strong
                                class="col-2"><?= htmlspecialchars($comment->getDateCreation()->format('H:m:s')) ?></strong>
                    </p>
                    <div class="row ">
                        <a class="btn btn-danger btn_comment offset-3 col-2"
                           href='/index.php?action=deleteComment&id=<?= htmlspecialchars($comment->getIdComment()) ?>'>
                        Supprimer
                        </a>
                        <a class="btn btn-primary btn_comment offset-2 col-2"
                           href='/index.php?action=validateComment&id=<?= htmlspecialchars($comment->getIdComment()) ?>'>
                        Valider
                        </a>
                    </div>
                </div>
                <hr>
                <?php

            }
        }
    } else { ?>
        <h4>Vous ne devriez pas être sur cette page !!!</h4>
    <?php }
    ?>
</main>