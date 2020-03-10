<?php
require_once("./model/PostManager.php");
require_once("./model/CommentManager.php");
//use WCoding\Blog\Model\PostManager;
//use WCoding\Blog\Model\CommentManager;

function listPosts() {
    $postManager = new PostManager();
    $articles = $postManager->getPosts();
    require('./view/listPostsView.php');
}

function post($postId){
    $postManager = new PostManager();
    $post = $postManager->getPost($postId);
    $commentManager = new CommentManager();
    $comments = $commentManager->getComments($postId);
    require("./view/postView.php");
}

//<<<<<<< HEAD
function postComments($author,$content,$id_article){
    
    $commentManager = new CommentManager();
    $comment = $commentManager->addComments($author,$comment,$id_article);
    header("location:index.php?action=post&article=$id_article&status=$status");
}
//=======
function postComment($autor,$content,$id_articles) {
    $commentManager = new CommentManager();
    $commentManager->insertComment($autor,$content,$id_articles);
    header("Location:index.php?action=post&article=$id_articles");
}
//>>>>>>> 4498783994008c985cbbece6553006e1f7044a75
