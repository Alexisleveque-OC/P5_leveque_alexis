<?php


$title = 'PostManagement';

ob_start();


?>
    <main class="container">
        <button class="btn btn-info" onclick="window.location.href='index.php?action=createPost'"> Créer un article
        </button><hr>

        <?php
        $i = 0;
        foreach ($posts as $post) {
            ?>
            <div class="row article">
                <h2 class="col-12">
                    <?= $post->getTitle(); ?>
                </h2>
                <h4 class="col-12">
                    <?= $post->getChapo(); ?>
                </h4>
                <p class="col-12">
                    <?php
                    echo(substr($post->getContent(), 0, 250));
                    ?>
                    ...<br>
                    <a href="/index.php?action=post&id=<?= $post->getIdPost() ?>">Voir la suite </a>

                </p>
                <p class="col-12">
                    Ecrit le <strong class="col-2"><?= $post->getDateCreation()->format('d-m-Y') ?></strong>
                    à <strong class="col-2"><?= $post->getDateCreation()->format('H:m:s') ?></strong>
                    par <strong class="col-2"><?= $users[$i]->getUserName(); ?></strong>
                </p>
                <button class="btn btn-primary"
                        onclick="window.location.href='index.php?action=updatePost&id=<?= $post->getIdPost() ?>'">
                    Modifier
                </button>
                <button class="btn btn-danger"
                        onclick="window.location.href='index.php?action=deletePost&id=<?= $post->getIdPost() ?>'">
                    Supprimer
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
require_once('Template.php');