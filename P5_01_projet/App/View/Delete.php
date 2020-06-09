<?php
$title = 'Confirmation Suppretion';
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
    <p>
        <?= htmlspecialchars($post->getUserId()); ?> ça c'est le nom de l'utilisateur normalement
    </p>
    <p>Êtes vous sur de vouloir supprimer cette article ?</p>
    <form method="POST">
        <button name="yes" type="submit" class="btn btn-danger">oui !</button>
        <button name="no" type="submit" class="btn btn-primary">non !</button>
    </form>
    <?php

    ?>
</main>
