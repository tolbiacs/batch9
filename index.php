<?php
require('./controller/controller.php');

try {
    if (isset($_REQUEST['action'])) {
        $action = $_REQUEST['action'];
        if ($action == 'listPosts') {
            listPosts();
        } else if ($action == 'post') {
            if (isset($_REQUEST['article']) AND $_REQUEST['article']>0) {
                post($_REQUEST['article']);
            } else {
                throw new Exception('No ID for the article requested');
            }
        } else if ($action == 'postComment') {
            if (!empty($_POST['login']) AND !empty($_POST['comm']) AND !empty($_POST['article'])) {
                postComment($_POST['login'],$_POST['comm'],$_POST['article']);
            } else {
                throw new Exception('Fill in the form please');
            }
        }
    } else {
        listPosts();
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    $code = $e->getCode();
    $line = $e->getLine();
    $file = $e->getFile();
    require ('./view/errorView.php');
}
