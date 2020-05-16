<?php $title = 'Page d\'erreur';

ob_start();
?>
    <h4>Il y a un problème</h4>
    <p><?= $errorMessage ?></p>
    <a href="../../index.php">Retour à l'acceuil</a>
<?php
$content = ob_get_clean();

require ('../Template/Template.php');
