<?php $title = 'page d\'erreur';

ob_start();
?>
    <h1>Il y a un problème</h1>
    <p><?= $errorMessage ?></p>
    <a href="../index.php">Retour à l'acceuil</a>
<?php
$content = ob_get_clean();

require 'view/template.php';
