<?php
$title = 'Les articles';
?>
<main class="container">
    <?php if (isset($userType) && $userType == 2) { ?>
        <a class="btn btn-info" href='/index.php?action=createPost'"> Créer un article
        </a>
        <hr>

    <?php }
    foreach ($posts as $post): ?>
        <div class="row card">
            <div class="card-body">
                <h2 class="col-12 card-title">
                    <?= htmlspecialchars($post->getTitle()); ?>
                </h2>
                <h4 class="col-12 card-title">
                    <?= $post->getChapo(); ?>
                </h4>
                <p class="col-12 card-text">
                    <?= htmlspecialchars(substr($post->getContent(), 0, 250));
                    ?>
                    ...<br>
                    <a class="btn btn-articles"
                       href="/index.php?action=post&id=<?= htmlspecialchars($post->getIdPost()) ?>">Voir la suite </a>

                </p>
            </div>
            <div class="col-12 card-footer">
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
                <p class="offset-8">Commentaires <span class="badge"></span><?= $post->getCounterComment() ?></p>

            </div>
            <div class="row">
                <?php if (isset($userType) && $userType == 2) { ?>
                    <a class="btn btn-primary btn_comment offset-3 col-2"
                       href="/index.php?action=updatePost&id=<?= htmlspecialchars($post->getIdPost()) ?>">
                        Modifier
                    </a>

                    <a class="btn btn-danger btn_comment offset-2 col-2"
                       href="/index.php?action=deletePost&id=<?= htmlspecialchars($post->getIdPost()) ?>">
                        Supprimer
                    </a>
                <?php } ?>
            </div>
        </div>
        <hr>
    <?php endforeach;
    if ($countPost >= 5) {
        ?>
        <ul class="row offset-4 col-4 pagination"><h6>Page :</h6>
            <?php
            for ($i = 0; $i <= $countPost; $i += 5) {
                $numberPage = ($i / 5) + 1; ?>
                <li class="col-1 offset-1"><a class=" btn btn-pagination"
                                              href="/index.php?action=posts&page=<?= $numberPage ?>"><?= $numberPage ?></a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

</main>
