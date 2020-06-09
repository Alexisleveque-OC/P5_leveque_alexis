<?php
$title = 'Les articles';
?>
<main class="container">
    <a class="btn btn-info" href='/index.php?action=createPost'"> Créer un article
    </a>
    <hr>

    <?php foreach ($posts as $post): ?>
        <div class="row jumbotron">
            <h2 class="col-12">
                <?= htmlspecialchars($post->getTitle()); ?>
            </h2>
            <h4 class="col-12">
                <?= $post->getChapo(); ?>
            </h4>
            <p class="col-12">
                <?= htmlspecialchars(substr($post->getContent(), 0, 250));
                ?>
                ...<br>
                <a href="/index.php?action=post&id=<?= htmlspecialchars($post->getIdPost()) ?>">Voir la suite </a>

            </p>
            <p class="col-12">
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
            </p>

            <a class="btn btn-primary"
               href="index.php?action=updatePost&id=<?= htmlspecialchars($post->getIdPost()) ?>">
                Modifier
            </a>

            <a class="btn btn-danger"
               href="index.php?action=deletePost&id=<?= htmlspecialchars($post->getIdPost()) ?>">
                Supprimer
            </a>
            <p class="offset-8">Commentaires <span class="badge"></span><?= $post->getCounter() ?></p>

        </div>
        <hr>
    <?php endforeach;
    if ($count[0] >= 5) {
        ?>
        <ul class="pagination">page :
            <?php
            for ($i = 0; $i <= $count[0]; $i += 5) {
                $numberPage = ($i / 5) + 1; ?>

                <li><a class="btn btn-success "
                       href="/index.php?action=posts&page=<?= $numberPage ?>"><?= $numberPage ?></a></li>
            <?php } ?>
        </ul>
    <?php } ?>

</main>
