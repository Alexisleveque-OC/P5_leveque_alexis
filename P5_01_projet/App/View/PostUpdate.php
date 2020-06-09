<?php
$title = 'PostUpdate';
?>
<main class="container">
    <div class="row">
        <div class="col-lg-8 mb-4">
            <h3>Inscription</h3>
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