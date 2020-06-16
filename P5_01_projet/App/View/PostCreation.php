<?php
$title = 'Création de Post';

if (isset($userConnected) && $userConnected->getUserTypeId() == 2){

?>
<main class="container ">
    <div class="row">
        <div class="offset-lg-2 col-lg-8 col-sm-12">
            <h3>Nouvelle article</h3>
            <form name="addPost" method="POST">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Titre :</label>
                        <input name="title" type="text" class="form-control">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Chapô :</label>
                        <input name="chapo" type="text" class="form-control">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Contenu : </label>
                        <textarea name="content" rows="10" cols="100" class="form-control"
                                  style="resize:none"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer l'article</button>
            </form>
        </div>
    </div>
</main>
<?php } else { ?>
    <h4>Vous ne devriez pas être sur cette page !!!</h4>
    <?php
}
