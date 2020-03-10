<?php
    require_once("./model/PostManager.php");
    require_once("./model/CommentManager.php");
    
    use \Wcoding\Blog\Model\PostManager;
    use \Wcoding\Blog\Model\CommentManager;

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

    // function listNewComments($postId, $commentName, $comment) {
    //     addComment($postId, $commentName, $comment);
    //     header('Location:index.php?action=post&article='.$postId);
    // }

    function listNewComments($postId, $commentName, $comment) {
        $commentManager = new CommentManager();
        $commentManager->addcomment($postId, $commentName, $comment);
        header('Location:index.php?action=post&article='.$postId);
    }