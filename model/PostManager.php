<?php
namespace WCoding\Blog\Model;
require("./model/Manager.php");
class PostManager extends Manager {

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles ');
        $req->execute();
        return $req;
    }

    public function getPost($postid)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles WHERE id = ?');
        $req->execute(array($postid));
        if(!$req) {
            throw new Exception('Impossible to fetch article!',25);
        } 
        return $req->fetch();
    }

}