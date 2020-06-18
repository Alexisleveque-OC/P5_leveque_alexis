<?php
$title = 'liste des commentaires à valider';
?>
<main class="container">
    <?php
    if (isset($userConnected) && $userConnected->getUserTypeId() == 2) {

        if ($comments == null) {
            ?>
            <h5 class="jumbotron">Il n'y a plus de commentaires à valider ou supprimer.</h5>
            <?php
        } else {
            foreach ($comments as $comment) {
                ?>

                <div class="comment card">
                    <div class="card-body">
                        <h2 class="card-title">
                            <?= $this->clean($comment->getUser()->getUserName()); ?>
                        </h2>
                        <p class="card-text">
                            <?= $this->clean($comment->getContent()); ?>
                        </p>
                    </div>
                    <p class="card-footer">
                        Ecrit le <strong
                                class="col-2"><?= $this->clean($comment->getDateCreation()->format('d-m-Y')) ?></strong>
                        à <strong
                                class="col-2"><?= $this->clean($comment->getDateCreation()->format('H:m:s')) ?></strong>
                    </p>
                    <div class="row ">
                        <a class="btn btn-danger btn_comment offset-md-3 col-md-2 col-sm-6"
                           href='/index.php?action=deleteComment&id=<?= $this->clean($comment->getIdComment()) ?>'>
                        Supprimer
                        </a>
                        <a class="btn btn-primary btn_comment offset-md-3 col-md-2 col-sm-6"
                           href='/index.php?action=validateComment&id=<?= $this->clean($comment->getIdComment()) ?>'>
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