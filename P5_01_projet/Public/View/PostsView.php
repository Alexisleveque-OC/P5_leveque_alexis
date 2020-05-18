<?php


$title = 'PostsView';

ob_start();


?>
    <h3 class="col-lg-12" >Là il y aura un articles</h3>
    <h3 class="col-lg-12" >Là il y aura un articles</h3>
    <h3 class="col-lg-12" >Là il y aura un articles</h3>
    <h3  class="col-lg-12" >Là il y aura un articles</h3>




<?php
$content = ob_get_clean();
require_once('Template.php');