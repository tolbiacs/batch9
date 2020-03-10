<?php
namespace WCoding\Blog\Model;
require_once("./model/Manager.php");
class CommentManager extends Manager {
    /**
     * The function get comments from the table comments
     * 
     * this is the description of the function
     * 
     * @param Integer   $postId     The id of the article
     * 
     * @return mixed    Returns either false if no lines or return the PDO collection of comments
     */
    public function getComments($postId) {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT autor, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id_articles = ? ORDER BY date_comment');
        $comments->execute(array($postId));
        return $comments;
    }
    
        
    /**
     * Insert a comment in the database and table comment
     *
     * @param  String   $autor          The author of the comment
     * @param  String   $comment        The comment to insert
     * @param  Integer  $id_articles    The id of the related article
     * @return void
     */
    public function insertComment($autor,$comment,$id_articles) {
        $db = $this->dbConnect();
        $status = $db->exec("INSERT INTO `comments`(`id_articles`, `autor`, `comment`) VALUES ($id_articles, '$autor','$comment') ");
        if(!$status) {
            throw new PDOException ("Impossible to add the comment !", 20);
        }
    }
}
