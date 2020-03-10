<?php
    require("./controller/controller.php");

    try {

        if (isset($_REQUEST['action'])) {
            $action = $_REQUEST['action'];
            if ($action == 'listPosts') {
                listPosts();
            } elseif ($action == 'post') {
                if (isset($_GET['article']) && $_GET['article'] > 0) {
                    post($_GET['article']);
                } else {
                    throw new Exception("no id for the article requested");
                }
            } elseif ($action == 'postComment') {
                if (isset($_POST['name']) AND isset($_POST['comment']) AND $_POST['name'] !== '' AND $_POST['comment'] !== '') {
                    listNewComments($_POST['id_article'], $_POST['name'], $_POST['comment']);
                } else {
                    throw new Exception('invalid comment!');
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
    

