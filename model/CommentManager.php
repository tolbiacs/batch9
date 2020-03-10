<?php
namespace WCoding\Blog\Model;
require_once("./model/Manager.php");
class CommentManager extends Manager{ 
    /**
     * The function get comments inside the table comments
     * 
     * this is the description of the function
     * 
     * @param Integer   $postId     The id of the article
     * 
     * @return mixed    Return either false if no lines or return the PDO collection of comments
     */
    public function getComments($postId) {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT autor, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id_articles = ? ORDER BY date_comment');
        $comments->execute(array($postId));
        return $comments;
    }
    
    /**
     * insertComment in the database and table comment
     *
     * @param  String  $autor         the author of the comment
     * @param  String  $comment       the comment to insert
     * @param  Integer $id_article    the id of the related article
     * @return void
     * 
     */
    public function insertComment($autor,$comment,$id_article) {
        $db = $this->dbConnect();

        $query = "INSERT INTO `comments`(`id_articles`, `autor`, `comment` ) VALUES (:id_articles, :autor, :comment)";
        if(!$status) {
            throw new Exception('Impossible to add the comment!',20);
        } else {
            header('Locatiob: index.php?action=post&id=' .$id_article);
        }

        $insert = $db->prepare($query);
        $insert->bindParam(":autor", $autor, PDO::PARAM_STR);
        $insert->bindParam(":comment", $comment, PDO::PARAM_STR);
        $insert->bindParam(":id_articles", $id_article, PDO::PARAM_INT);
        $rows_inserted = $insert->execute();
        return $rows_inserted;

    }

}

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