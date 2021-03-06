<?php
$title = 'Subscribe';
?>
<main class="container">
    <div class="row">
        <div class="offset-lg-2 col-lg-8 col-sm-12 ">
            <h3>Inscription</h3>
            <form name="addUser" id="userForm" method="POST">
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

                <button type="submit" class="btn btn-primary" >S'inscrire</button>
            </form>
        </div>
    </div>
</main>