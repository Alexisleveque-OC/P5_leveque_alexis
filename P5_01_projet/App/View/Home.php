<?php


$title = 'Accueil';

ob_start();


?>
    <header class="masthead">
        <img src="/Image/banner.jpg" alt="banner" class="banner">
        <div class="site-heading">
            <h1>Alexis LEVEQUE</h1>
            <span class="subheading">May the force be with you</span>
        </div>
    </header>
    <main class="container home">
        <div class="row">
            <h1 class="col-4 who">
                Qui suis-je?
            </h1>
            <p class="col-8">
                Et harum quidem rerum facilis est et expedita distinctio. Non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat.

                Animi, id est laborum et dolorum fuga. Nihil molestiae consequatur, vel illum qui dolorem eum. Et harum quidem rerum facilis est et expedita distinctio. Laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            <hr>
        </div>
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
            </div>
            <hr>
            <?php
            $i++;
        }
        //TODO a voir pour afficher que 3 articles
        ?>
    </main>
<?php
$content = ob_get_clean();
require('Template.php');