<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/style.css">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../../index.php">Le blog de moi !!!</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Public/View/Home.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Public/View/Post.php">Les articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Public/View/Connection.php">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Public/View/Subscribe.php">Inscription</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<main role="main" class="container">

    <div class="starter-template" style="padding-top: 100px">
        <?= $content; ?>
    </div>

</main>

</body>