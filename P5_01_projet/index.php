<?php



try
{
    if (isset($_GET['action'])) {
    }
    else{
        require_once('Public/View/Home.php');
    }

}
catch(Exception $e)
{
    $errorMessage = $e->getMessage();
    require('Public/View/Error.php');
}