<?php


$title = 'PostManagement';

ob_start();


?>
    <button class="btn btn-info" onclick="window.location.href='index.php?action=createPost'"> Créer un article</button>
    <h3 class="col-lg-12" >Là il y aura un articles</h3>
    <button class="btn btn-primary">update</button>
    <button class="btn btn-danger">delete</button>
    <h3 class="col-lg-12" >Là il y aura un articles</h3>
    <button class="btn btn-primary">update</button>
    <button class="btn btn-danger">delete</button>
    <h3 class="col-lg-12" >Là il y aura un articles</h3>
    <button class="btn btn-primary">update</button>
    <button class="btn btn-danger">delete</button>
    <h3  class="col-lg-12" >Là il y aura un articles</h3>
    <button class="btn btn-primary">update</button>
    <button class="btn btn-danger">delete</button>



<?php
$content = ob_get_clean();
require_once('Template.php');