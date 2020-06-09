<?php
$title = 'PostView';
?>

<main class="container">


    <h2>
        <?= htmlspecialchars($post->getTitle()); ?>
    </h2>
    <h4>
        <?= htmlspecialchars($post->getChapo()); ?>
    </h4>
    <p>
        <?= htmlspecialchars($post->getContent()); ?>
    </p>
    <?php
    if ($post->getDateLastUpdate() === null) {
        ?>
        Ecrit le <strong
                class="col-2"><?= htmlspecialchars($post->getDateCreation()->format('d-m-Y')) ?></strong>
        à <strong
                class="col-2"><?= htmlspecialchars($post->getDateCreation()->format('H:m:s')) ?></strong>
        par <strong class="col-2"><?= htmlspecialchars($post->getUser()->getUserName()); ?></strong>
        <?php
    } else {
        ?>
        Dernière modification : <strong
                class="col-2"><?= htmlspecialchars($post->getDateLastUpdate()->format('d-m-Y')) ?></strong>
        à <strong
                class="col-2"><?= htmlspecialchars($post->getDateLastUpdate()->format('H:m:s')) ?></strong>
        par <strong class="col-2"><?= htmlspecialchars($post->getUser()->getUserName()); ?></strong>
        <?php
    }
    ?>

    <h2>Commentaires</h2>

    <form action="/index.php?action=addComment&id=<?= $post->getIdPost() ?>" method="post">

        <label for="comment">Ajouter un commentaire</label><br/>
        <textarea class="form-control col-4" rows="5" id="comment" name="content"></textarea>

        <input type="submit"/>

    </form>
    <?php
    foreach ($comments as $comment) :

        ?>

        <div class="row comment">
            <h5 class="col-10">
                <?= htmlspecialchars($comment->getUser()->getUsername()); ?>
            </h5>
            <p class="col-12">
                <?= htmlspecialchars($comment->getContent()); ?>
            </p>
            <p class="col-12">
                Ecrit le <strong
                        class="col-2"><?= htmlspecialchars($comment->getDateCreation()->format('d-m-Y')) ?></strong>
                à <strong
                        class="col-2"><?= htmlspecialchars($comment->getDateCreation()->format('H:m:s')) ?></strong>
            </p>
        </div>
        <hr>
    <?php endforeach;
    if ($count[0] == 0) {
        ?>
        <h5 class="jumbotron">Il n'y a pas encore de commentaires.</h5>

    <?php } elseif ($count[0] >= 10) { ?>
        <ul class="pagination">page :
            <?php

            for ($i = 0; $i <= $count[0]; $i += 10) {
                $numberPage = ($i / 10) + 1; ?>

                <li><a class="btn btn-success "
                       href="/index.php?action=post&id=<?= $post->getIdPost() ?>&page=<?= $numberPage ?>"><?= $numberPage ?></a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
</main>