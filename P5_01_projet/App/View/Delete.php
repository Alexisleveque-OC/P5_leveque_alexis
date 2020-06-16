<?php
$title = 'Confirmation Suppression';
?>

<main class="container">

    <?php if ($userType == 2) { ?>
        <div class="one_post card">
            <h2 class="card-title">
                <?= strip_tags(htmlspecialchars($post->getTitle())); ?>
            </h2>
            <h4 class="card-title">
                <?= strip_tags(htmlspecialchars($post->getChapo())); ?>
            </h4>
            <p class="card-text">
                <?= strip_tags(htmlspecialchars($post->getContent())); ?>
            </p>
            <p class="card-footer">
                <strong>Ecrit par :</strong><?= strip_tags(htmlspecialchars($post->getUser()->getUserName())); ?>
            </p>
        </div>
        <p>Êtes vous sur de vouloir supprimer cette article ?</p>
        <form method="POST">
            <button name="answer" value="yes" type="submit" class="btn btn-danger">oui !</button>
            <button name="answer" value="no" type="submit" class="btn btn-primary">non !</button>
        </form>
    <?php } else { ?>
        <h4>Vous ne devriez pas être là !!! </h4>
        <?php
    }
    ?>
</main>
)