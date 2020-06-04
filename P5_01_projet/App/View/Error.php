<?php $title = 'Page d\'erreur';

ob_start();
?>
    <main class="container">
        <h4>Il y a un problème</h4>
        <p><?= htmlspecialchars($errorMessage) ?></p>
        <a href="/index.php">Retour à l'acceuil</a>
    </main>

<?php
$content = ob_get_clean();

require('Template.php');
