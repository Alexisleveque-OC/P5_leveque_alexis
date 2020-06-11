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
                if (isset($_SESSION['user_name'])) {
                    ?>
                    <li class="nav-item">
                        <h4>Bonjour <?= htmlspecialchars($_SESSION['user_name']) ?></h4>
                    </li>
                    <li class="nav-item">
                        <a href="/index.php?action=logout" class="nav-link">Déconnexion</a>
                    </li>
                    <?php
                    if ($nbCommentUnvalidate >= 1) {
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
    <?= $content; ?>
</div>


</body>
