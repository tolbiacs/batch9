<?php
namespace WCoding\Blog\Model;
require_once('./model/Manager.php');

class CommentManager extends Manager{
    /**
     * The function to get comments inside the table comments
     * 
     * This is the discription of the function
     * 
     * @param Intiger   $postId     The id of the article
     * 
     * @return mixed    returns either false if no lines or return PDO collection of comments
     */
    public function getComments($postId) {
        $db = $this->dbConnect();
    
        $comments = $db->prepare('SELECT autor, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id_articles = ? ORDER BY date_comment');
        $comments->execute(array($postId));
        return $comments;
    }
        
    /**
     * Insert a comment into the database and table comment
     *
     * @param  String   $autor          the author of the comments
     * @param  String   $content        The comments to insert
     * @param  Integer  $id_articles    The id of the related article   
     * @return void
     */
    public function addComment($autor,$content,$id_articles) {
        $db = $this->dbConnect();
        
        setcookie("login", $autor, time() + 183*24*3600, null ,null ,false, true);
        $status = $db->prepare("INSERT INTO comments(id_articles, autor, comment) VALUES (:article_id,:pseudo,:msg_text)");
        $status->execute(array(
            'article_id'=>$id_articles,
            'pseudo'=>$autor,
            'msg_text'=>$content
        ));
        if (!$status) {
            throw new Exception('Impossible to add comment',20);
        }
        return $status;
    }
}
