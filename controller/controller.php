<?php
// THIS IS A TEST COMMENT MADE TODAY MARCH 10th TUES BY JEREMY
require_once('./model/PostManager.php');
require_once('./model/CommentManager.php');
use \WCoding\Blog\Model\PostManager;
use \WCoding\Blog\Model\CommentManager;

function listPosts() {
    $postManager = new PostManager();
    $articles = $postManager->getPosts();
    require("./view/listPostsView.php");
}

function post($postId) {
    $postManager = new PostManager();
    $post = $postManager->getPost($postId);
    $commentManager = new CommentManager();
    $comments = $commentManager->getComments($postId);
    require("./view/postView.php");
}

function postComment($autor,$content,$id_article) {
    $commentManager = new CommentManager();
    $commentManager->insertComment($autor,$content,$id_article);
    $status = insertComment($autor,$content,$id_article);
    if($status === 'failure') {
        die('impossible to add the comment');
    } else {
    // $insert = insertComments($_POST['article']);
    header("Location:index.php?action=post&article=$id_article&success=$status");
    // require("./view/postView.php");  
}
}