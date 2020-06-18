<?php
$title = 'PostView';
?>

<main class="container">

    <div class="card one_post">
        <div class="card-body">
            <h2 class="card-title">
                <?= ($this->clean($post->getTitle())); ?>
            </h2>
            <h4 class="card-title">
                <?= ($this->clean($post->getChapo())); ?>
            </h4>
            <p class="card-text">
                <?= ($this->clean($post->getContent())); ?>
            </p>
        </div>
        <div class="card-footer">
            <?php
            if ($post->getDateLastUpdate() === null) {
                ?>
                Ecrit le <strong
                        class="col-2"><?= $this->clean($post->getDateCreation()->format('d-m-Y')) ?></strong>
                à <strong
                        class="col-2"><?= $this->clean($post->getDateCreation()->format('H:m:s')) ?></strong>
                par <strong class="col-2"><?= $this->clean($post->getUser()->getUserName()); ?></strong>
                <?php
            } else {
                ?>
                Dernière modification : <strong
                        class="col-2"><?= $this->clean($post->getDateLastUpdate()->format('d-m-Y')) ?></strong>
                à <strong
                        class="col-2"><?= $this->clean($post->getDateLastUpdate()->format('H:m:s')) ?></strong>
                par <strong class="col-2"><?= $this->clean($post->getUser()->getUserName()); ?></strong>
                <?php
            }
            ?>
        </div>
    </div>
    <hr>
    <div class="offset-1">
        <h2 class="title-box">Commentaires</h2>
        <?php if (isset($userConnected) && $userConnected->getUserTypeId >= 1) { ?>
        <form action="/index.php?action=addComment&id=<?= $post->getIdPost() ?>" method="post">

            <label for="comment">Ajouter un commentaire</label><br/>
            <textarea class="form-control col-md-6 col-sm-12" rows="5" id="comment" name="content"></textarea>

            <input class="btn btn-primary" id="submit-comment" type="submit"/>

        </form>
    </div>
    <hr>
    <?php
    }
    foreach ($comments as $comment) :

        ?>

        <div class="row comment">
            <h5 class="col-md-2 col-sm-12 user">
                <?= ($this->clean($comment->getUser()->getUsername())); ?>
            </h5>
            <div class="col-10">

                <p class="col-12">
                    <?= ($this->clean($comment->getContent())); ?>
                </p>
                <p class="col-12 card-footer">
                    Ecrit le <strong
                            class="col-2"><?= ($this->clean($comment->getDateCreation()->format('d-m-Y'))) ?></strong>
                    à <strong
                            class="col-2"><?= ($this->clean($comment->getDateCreation()->format('H:m:s'))) ?></strong>
                </p>
            </div>
        </div>
        <hr>
    <?php endforeach;
    if ($count == 0) {
        ?>
        <h5 class="jumbotron">Il n'y a pas encore de commentaires.</h5>

    <?php } elseif ($count >= 10) { ?>
        <ul class="offset-4 col-4 pagination"><h6>Page :</h6>
            <?php

            for ($i = 0; $i <= $count; $i += 10) {
                $numberPage = ($i / 10) + 1; ?>

                <li class="col-1 offset-1"><a class="btn btn-pagination "
                                              href="/index.php?action=post&id=<?= $post->getIdPost() ?>&page=<?= $numberPage ?>"><?= $numberPage ?></a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
</main>