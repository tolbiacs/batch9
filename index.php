<?php require("./controller/controller.php");


try{
    if(isset($_REQUEST['action'])){
        $action = $_REQUEST['action'];
        if($action == 'listPosts'){
            listPosts();
        } elseif ($action == 'post'){
            if(isset($_REQUEST['article']) && $_REQUEST['article'] >0){
                
                post($_REQUEST['article']);
            } else {
                throw new Exception("no id for the article requested") ;
            }
        }elseif ($action == 'postComment'){
            if(!empty($_POST['author']) && !empty($_POST['comment']) && !empty($_POST['comment'])){
                
                postComments($_POST['author'],$_POST['comment'],$_POST['article']);
            } else {
                throw new Exception( "fill the form");
            }
        }
    } else {
            listPosts();
        }
}


catch(PDOException $e){
    $msg = $e->getMessage();
    $code = $e->getCode();
    require('./view/pdoErrorView.php');
}
catch(Throwable $e){
    $msg = $e->getMessage();
    $code = $e->getCode();
    $line = $e->getLine();
    $file = $e->getFile();
    require('./view/errorView.php');
}

