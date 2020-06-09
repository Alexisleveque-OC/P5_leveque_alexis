<?php
$title = 'Subscribe';
?>
<main class="container">
    <div class="row">
        <div class="col-lg-8 mb-4">
            <h3>Connexion</h3>
            <form name="connection" id="userForm" method="POST">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Nom d'utilisateur:</label>
                        <input name="user_name" type="text" class="form-control" required
                               data-validation-required-message="Entrez votre nom d'utilisateur.">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Mot de passe : </label>
                        <input name="password" type="password" class="form-control" required
                               data-validation-required-message="Entrez un mot de passe.">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>
</main>