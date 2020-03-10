<?php
require("./controller/controller.php");
try {
if(isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    if($action == 'listPosts') {
        listPosts();
    } elseif ($action == 'post') {
        if (isset($_GET['article']) && $_GET['article'] > 0) {
            post($_GET['article']);
        } else {
            throw new Exception('Error : no id for the article requested');
        }
    } elseif ($action == 'postComment') {
    if(!empty($_POST['autor']) && !empty($_POST['comment']) && !empty($_POST['article'])) {
        postComment($_POST['autor'], $_POST['comment'], $_POST['article']);
    } else {
        throw new Exception("Error : fill the form Please");
        }
    }
    } else {
    listPosts();
}
}
catch(PDOException $e) {
    
    $msg = $e->getMessage();
    $code = $e->getCode();
    require('./view/errorViewPDO.php');
}
catch(Exception $e) {
    
    $msg = $e->getMessage();
    $code = $e->getCode();
    $line = $e->getLine();
    $file = $e->getFile();
    require('./view/errorView.php');
}

