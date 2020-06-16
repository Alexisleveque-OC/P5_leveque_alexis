<?php
$title = 'PostUpdate';
if (isset($userConnected) && $userConnected->getUserTypeId() == 2) {
    ?>
    <main class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8 col-sm-12">
                <h3>Modification d'un article</h3>
                <form name="addPost" method="POST">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Titre :</label>
                            <input name="title" type="text" class="form-control"
                                   value="<?= htmlspecialchars($post->getTitle()) ?>">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Chapô :</label>
                            <input name="chapo" type="text" class="form-control"
                                   value="<?= htmlspecialchars($post->getChapo()) ?>">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Contenu : </label>
                            <textarea name="content" rows="10" cols="100" class="form-control"
                                      style="resize:none"><?= htmlspecialchars($post->getContent()) ?>
                            </textarea>
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
