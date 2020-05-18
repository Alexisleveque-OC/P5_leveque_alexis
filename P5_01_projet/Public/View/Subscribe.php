<?php


$title = 'Subscribe';

ob_start();


?>
<main class="container">
    <div class="row">
        <div class="col-lg-8 mb-4">
            <h3>Inscription</h3>
            <form name="addUser" id="userForm" method="POST" action="../../index.php?action=addUser" >
                <div class="control-group form-group">
                    <div class="controls">
                        <label >Nom d'utilisateur:</label>
                        <input name="user_name" type="text" class="form-control" required data-validation-required-message="Entrez votre nom d'utilisateur.">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label >E-mail:</label>
                        <input name="email" type="email" class="form-control" required data-validation-required-message="Entrez votre E-mail.">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label >Mot de passe : </label>
                        <input name="password" type="password" class="form-control" required data-validation-required-message="Entrez un mot de passe.">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label >Confirmation du mot de passe : </label>
                        <input name="password_confirmation" type="password" class="form-control" required data-validation-required-message="Entrez la confirmation du mot de passe." >
                    </div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary" >S'inscrire</button>
            </form>
        </div>
    </div>
</main>
<?php
$content = ob_get_clean();
require_once('Template.php');