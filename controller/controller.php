<?php
require_once('./model/PostManager.php');
require_once('./model/CommentManager.php');
use \WCoding\Blog\Model\PostManager;
use \WCoding\Blog\Model\CommentManager;

function listPosts() {
    $postManager = new PostManager();
    $article = $postManager->getPosts();

    require('./view/listPostsView.php');
}

function post($postId) {
    $postManager = new PostManager();
    $post = $postManager->getPost($postId);

    $commentManager = new CommentManager();
    $comments = $commentManager->getComments($postId);
    require('./view/postView.php');
    // require('./view/addingCommentView.php');
}

function postComment($autor,$content,$id_articles) {
    $postManager = new PostManager();
    $postManager->addComment($autor,$content,$id_articles);
    header("Location:index.php?action=post&article=$id_articles&status=success");
}
