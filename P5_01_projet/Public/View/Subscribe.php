<?php


$title = 'Subscribe';

ob_start();


?>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <h3>Inscription</h3>
            <form name="addUser" id="userForm" method="post" action="../index.php?action=addUser" >
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Nom d'utilisateur:</label>
                        <input type="text" class="form-control" id="user_name" required data-validation-required-message="Entrez votre nom d'utilisateur.">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>E-mail:</label>
                        <input type="email" class="form-control" id="email" required data-validation-required-message="Entrez votre E-mail.">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Mot de passe : </label>
                        <input type="password" class="form-control" id="password" required data-validation-required-message="Entrez un mot de passe.">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Confirmation du mot de passe : </label>
                        <input type="password" class="form-control" id="password_confirmation" required data-validation-required-message="Entrez la confirmation du mot de passe." >
                    </div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
            </form>
        </div>
    </div>





<?php
$content = ob_get_clean();
require_once ('../Template/Template.php');