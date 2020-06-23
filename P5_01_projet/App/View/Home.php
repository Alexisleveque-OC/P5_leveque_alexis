<?php
$title = 'Accueil';
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
        <h2 class="col-md-4 col-xs-12 who">
            Qui suis-je?
        </h2>
        <p class="col-md-8 col-xs-12">
            Et harum quidem rerum facilis est et expedita distinctio. Non numquam eius modi tempora incidunt ut
            labore et dolore magnam aliquam quaerat voluptatem. Nam libero tempore, cum soluta nobis est eligendi
            optio cumque nihil impedit quo minus coucou id quod maxime placeat.

            Animi, id est laborum et dolorum fuga. Nihil molestiae consequatur, vel illum qui dolorem eum. Et harum
            quidem rerum facilis est et expedita distinctio. Laboris nisi ut aliquip ex ea commodo consequat.
        </p>
    </div>
    <hr>
    <h2 class="title-box"> Les Derniers articles</h2>
    <div class="row">
        <?php foreach ($posts as $post): ?>

            <div class="card col-lg-4 col-sm-12">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="col-12">
                            <?= self::escape($post->getTitle()); ?>
                        </h2>
                        <h4 class="col-12">
                            <?= self::escape($post->getChapo()); ?>
                        </h4>
                    </div>
                    <p class="card-text">
                        <?= self::escape(substr($post->getContent(), 0, 250)); ?>
                        ...<br>
                        <a class="btn btn-articles"
                           href="/index.php?action=post&id=<?= self::escape(($post->getIdPost())) ?>">Voir la suite
                        </a>
                    </p>
                </div>
                <div class="card-footer">
                    <?php
                    if ($post->getDateLastUpdate() === null) {
                        ?>
                        <div class="col-6">
                        Ecrit le <strong><?= self::escape($post->getDateCreation()->format('d-m-Y')) ?></strong>
                        </div>
                        <div class="col-6">
                            à <strong><?= self::escape($post->getDateCreation()->format('H:i:s')) ?></strong>
                        </div>
                        <div class="col-12">
                            par <strong><?= self::escape($post->getUser()->getUserName()); ?></strong>
                        </div>
                        <?php
                    } else {
                        ?>
                        Dernière modification : <strong
                                class="col-6"><?= self::escape($post->getDateLastUpdate()->format('d-m-Y')) ?></strong>
                        à <strong
                                class="col-6"><?= self::escape($post->getDateLastUpdate()->format('H:i:s')) ?></strong>
                        par <strong class="col-12"><?= self::escape($post->getUser()->getUserName()); ?></strong>
                        <?php
                    }
                    ?>

                    <p class="col-12">Commentaires : <span class="badge"></span><?= $post->getCounterComment() ?></p>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
    <hr>
    <div class="row">
        <div class="offset-lg-2 col-md-8 ">
            <h3 class="title-box">Contact</h3>
            <form name="sendMail" id="contactForm" method="POST">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Nom :</label>
                        <input type="text" class="form-control" name="name" required
                               data-validation-required-message="Veuillez entrez votre nom.">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Numéro de téléphone:</label>
                        <input type="tel" class="form-control" name="phone" required
                               data-validation-required-message="Veuillez entrez votre numéro de téléphone">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Adresse email:</label>
                        <input type="email" class="form-control" name="email" required
                               data-validation-required-message="Veuillez entrez votre adresse e-mail.">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Message:</label>
                        <textarea rows="5" cols="100" class="form-control" name="message" required
                                  data-validation-required-message="Veuillez entrez votre message."
                                  style="resize:none"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer un messsage</button>
            </form>
        </div>

    </div>
</main>
