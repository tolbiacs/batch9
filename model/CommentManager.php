<?php
require_once("./model/Manager.php");

class CommentManager extends Manager
{
    /**
     * The function get comments inside the table comments
     * 
     * this is the description of the function
     * @param Integer   $postId     The id of the article
     * 
     * @return mixed    returns either false if no lines or returns the PDO commection of comments
     */
    public function getComments($postId){
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT autor, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id_articles = ? ORDER BY date_comment');
        $comments->execute(array($postId));
        return $comments;
    }
//<<<<<<< HEAD
        //command shift i auto generates the docs
    /**
     * add a comment to the db
     *
     * @param  String $author       the author of the post
     * @param  String $comment      the comment to insert
     * @param  mixed $postId        the id articles
     * @return void
     */
    public function addComment($author,$comment,$postId){
        
        $db = $this->dbConnect();
        // $author = isset($_POST['author']) ? $_POST['author'] : '';
        // $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
        
        $response = $db->prepare("INSERT INTO comments(id_articles,autor,comment) VALUES(:article, :author, :comment)");
        $response->bindParam(':article',$postId,PDO::PARAM_INT);
        $response->bindParam(':author',$author,PDO::PARAM_STR);
        $response->bindParam(':comment',$comment,PDO::PARAM_STR);
        $status = $response->execute();
        if(!$status){
            throw new Exception ("impossible to add comment",20);
        } else {
           return 'success';
        }
        
        
    
        //setcookie("author",$author,time()+ 365*24*3600, null ,null ,false, true);
    }
    
}



=======
    
        
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
>>>>>>> 4498783994008c985cbbece6553006e1f7044a75
