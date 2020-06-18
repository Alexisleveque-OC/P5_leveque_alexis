<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/index.php">Le blog de moi !!!</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php?action=posts">Les articles</a>
                </li>
                <?php
                if (isset($userConnected)) {
                    ?>
                    <li class="nav-item">
                        <h4>Bonjour <?= $this->clean($userConnected->getUserName()) ?></h4>
                    </li>
                    <li class="nav-item">
                        <a href="/index.php?action=logout" class="nav-link">Déconnexion</a>
                    </li>
                    <?php
                    if ($nbCommentUnvalidate >= 1 && $userConnected->getUserTypeId() == 2) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/index.php?action=listCommentUnvalidate">
                                Commentaires <span class="badge badge-danger"><?= $nbCommentUnvalidate ?></span>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?action=connection">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?action=subscribe">Inscription</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>


<div class="starter-template" style="padding-top: 100px">
    <?php if ($flash): ?>
        <div class="alert alert-<?= $flash['type'] ?>">
            <?= $flash['message'] ?>
        </div>
    <?php endif; ?>


    <?= $content; ?>
</div>
<footer class="row ">
    <div class="col-12">
        <div class="row">
            <h5 class="col-1">Moi</h5>
            <div class="col-3">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a href="/CV/CV_Alexis_Leveque.pdf">Mon CV</a>

            </div>
            <h5 class="col-1">Contact</h5>
            <ul class="col-3 list list-unstyled">
                <li>- E-mail : alexisblog@blog-p5.alexis-leveque.fr</li>
                <li>- La Jarrie 17220</li>
                <ul>
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/alexis.leveque.585">
                            <img class="social_network" src="/Image/facebook_logo.jpg" alt="Facebook logo">
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/Alexisleveque-OC" class="btn btn-github">
                            <img class="social_network" src="/Image/github_logo.png" alt="github logo">
                        </a>
                    </li>
                </ul>
            </ul>
            <h5 class="col-1">Plan du site</h5>
            <ul class=" col-2 list list-unstyled">
                <li class="col-12">
                    <a class="nav-link" href="/index.html">
                        Accueil
                    </a>
                </li>
                <li class="col-12">
                    <a class="nav-link" href="/index.php?action=posts">
                        Les articles
                    </a>
                </li>
                <?php if (!isset($userConnected)) { ?>

                    <li class="col-12">
                        <a class="nav-link" href="/index.php?action=connection">Connexion</a>
                    </li>
                    <li class="col-12">
                        <a class="nav-link" href="/index.php?action=subscribe">Inscription</a>
                    </li>
                <?php } ?>
                </li>
            </ul>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
