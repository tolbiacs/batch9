<?php
// function getPosts() {
//     $db=dbConnect();

// We retrieve the 5 last articles
// $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles ORDER BY creation_date DESC LIMIT 0, 5');
// return $req;
// }


// function getPost($postID) {
//     $db=dbConnect();

    // we retrieve the article
//     $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles WHERE id = ?');
//     $req->execute(array($postID));
//     if(!$req) {throw new Exception("Impossible to fetch the article!");}
//     $post = $req->fetch();
//     return $post;
// }

// function getComments($postId) {
//     $db = dbConnect();
//     $comments = $db->prepare('SELECT autor, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id_articles = ? ORDER BY date_comment');
//     $comments->execute(array($postId));
//     return $comments;
// }

// function insertComment($autor,$comment,$id_article) {
//     $db = dbConnect();

//     $query = "INSERT INTO `comments`(`id_articles`, `autor`, `comment` ) VALUES (:id_articles, :autor, :comment)";
//     if(!$status) {
//         throw new Exception('Impossible to add the comment!',20);
//     } else {
//         header('Locatiob: index.php?action=post&id=' .$id_article);
//     }

//     $insert = $db->prepare($query);
//     $insert->bindParam(":autor", $autor, PDO::PARAM_STR);
//     $insert->bindParam(":comment", $comment, PDO::PARAM_STR);
//     $insert->bindParam(":id_articles", $id_article, PDO::PARAM_INT);
//     $rows_inserted = $insert->execute();
//     return $rows_inserted;

// }

// function dbConnect()
// {
//     $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
//     return $db;
// }

// function dbConnect() {
//     try
//     {
//         return new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
//     }
//     catch(Exception $e)
//     {
//             die('Error : '.$e->getMessage());
//     }
// }