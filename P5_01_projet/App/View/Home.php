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
        <h1 class="col-4 who">
            Qui suis-je?
        </h1>
        <p class="col-8">
            Et harum quidem rerum facilis est et expedita distinctio. Non numquam eius modi tempora incidunt ut
            labore et dolore magnam aliquam quaerat voluptatem. Nam libero tempore, cum soluta nobis est eligendi
            optio cumque nihil impedit quo minus id quod maxime placeat.

            Animi, id est laborum et dolorum fuga. Nihil molestiae consequatur, vel illum qui dolorem eum. Et harum
            quidem rerum facilis est et expedita distinctio. Laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <hr>
    </div>
    <?php foreach ($posts as $post):?>

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
        <p class="offset-8">Commentaires <span class="badge"></span><?= $post->getCounterComment() ?></p>

    </div>
    <hr>
    <?php endforeach;    ?>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <h3>Contact</h3>
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
