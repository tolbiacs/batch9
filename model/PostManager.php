<?php
namespace WCoding\Blog\Model;
require_once('./model/Manager.php');

class PostManager extends Manager{
    public function getPosts() {
        $db = $this->dbConnect();
    
        $article = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles ORDER BY creation_date DESC LIMIT 0, 5');
        return $article;


// /**
//  * PostManager
//  * https://github.com/tolbiacs/batch9.git
//  */
// class PostManager extends Manager {
    
//     /** @var String */
//     private $property;
    
//     public function getPosts () {
//         /**
//          * @TODO : i need to fix that blah blah
//          */
//         $db = $this->dbConnect();
//         // We retrieve the 5 last articles
//         $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y at %Hh%imin%ss\') AS date_creation_fr FROM articles ORDER BY creation_date DESC LIMIT 0, 5');
//         return $req;
    }
    
    public function getPost($postId) {
        $db = $this->dbConnect();
    
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles WHERE id = ?');
        $resp = $req->execute(array($postId));
    
        if (!$resp) {throw new Exception('Impossible to fetch an article',25);}
        $resp = $req->fetch();
        return $resp;
    }
}
