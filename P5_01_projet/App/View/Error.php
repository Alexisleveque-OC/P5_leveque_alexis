<?php
$title = 'Page d\'erreur';
?>
<main class="container col-8">
    <h4>Il y a un problème</h4>
    <p><?= $this->clean($errorMessage); ?></p>
    <a href="/index.php">Retour à l'acceuil</a>
</main>
