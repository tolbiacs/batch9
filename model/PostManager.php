<?php
//namespace WCoding\Blog\Model;
require_once("./model/Manager.php");

class PostManager extends Manager
{

    public function getPosts(){

        $db= $this->dbConnect();
    
        // We retrieve the 5 last articles
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles ORDER BY creation_date DESC LIMIT 0, 5');
        return $req;
    }
    
    
    
    public function getPost($postId){
        $db= $this->dbConnect();
    
        // we retrieve the article
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles WHERE id = ?');
        $resp = $req->execute(array($postId));
        if(!$resp){
            throw new PDOException("Impossible to fetch th article",25);
        }
        $post = $req->fetch();
        return $post;
    }


}