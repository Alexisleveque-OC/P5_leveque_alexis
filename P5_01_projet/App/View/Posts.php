<?php


$title = 'PostManagement';

ob_start();


?>
    <main class="container">
        <a class="btn btn-info" href='/index.php?action=createPost'"> Créer un article
        </a>
        <hr>

        <?php foreach ($posts as $post): ?>
            <div class="row article">
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
                    Ecrit le <strong
                            class="col-2"><?= htmlspecialchars($post->getDateCreation()->format('d-m-Y')) ?></strong>
                    à <strong class="col-2"><?= htmlspecialchars($post->getDateCreation()->format('H:m:s')) ?></strong>
                    par <strong class="col-2"><?= htmlspecialchars($post->getUser()->getUserName()); ?></strong>
                </p>
                <a class="btn btn-primary"
                   href="index.php?action=updatePost&id=<?= htmlspecialchars($post->getIdPost()) ?>">
                    Modifier
                </a>
                <a class="btn btn-danger"
                   href="index.php?action=deletePost&id=<?= htmlspecialchars($post->getIdPost()) ?>">
                    Supprimer
                </a>
            </div>
            <hr>
        <?php endforeach; ?>
    </main>
<?php

$content = ob_get_clean();
require_once('Template.php');