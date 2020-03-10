<?php
    namespace Wcoding\Blog\Model;

    require_once('./model/Manager.php');
    class CommentManager extends Manager {
        /**
         * The function get comments inside the table comments
         * 
         * This is the description of the function 
         * 
         * @param Integer   $postId     The id of the article
         * 
         * @return mixed    return either false if no lines or return the PDO collection of comments
         */
        public function getComments($postId) {
            $db = $this->dbConnect();
            $comments = $db->prepare('SELECT autor, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id_articles = ? ORDER BY date_comment');
            $resp = $comments->execute(array($postId));
            if(!$resp) {throw new PDOException('Impossible to fetch the comment!', 23);}
            return $comments;
        }
            
        /**
         * Insert comment in the database and table comment
         *
         * @param  Integer      $postId       the id of the related article
         * @param  String       $commentName  the author of the comment
         * @param  String       $comment      the comment to insert 
         * @return void 
         */
        public function addComment($postId, $commentName, $comment) {
            $db = $this->dbConnect();          
            $addComments = $db->prepare("INSERT INTO comments(id_articles, autor, comment, date_comment) VALUES(:id_article, :author, :comment, NOW())");
            $status = $addComments->execute(array(
                'id_article' => $postId,
                'author' => htmlspecialchars($commentName),
                'comment' =>  htmlspecialchars($comment)
            ));
            if (!$status) {
                throw new PDOException('Impossible to add the comment!', 20);
            } 
        } 
    }