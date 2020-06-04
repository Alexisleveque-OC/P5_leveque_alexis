<?php
$title = "Mail envoyé !";

ob_start();
?>

<main class="container">
    <h4>Votre e-mail a bien été envoyé . </h4>
    <p>Nous vous réponderons dans les plus brefs délais.</p>
    <a href="/index.php">Retour à l'acceuil</a></main>


<?php
$content = ob_get_clean();
require ('Template.php');