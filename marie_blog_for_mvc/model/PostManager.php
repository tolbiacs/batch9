<?php
    namespace Wcoding\Blog\Model;
       
    require_once('./model/Manager.php');
    class PostManager extends Manager {
        public function getPosts() {
            $db = $this->dbConnect();
            $articles = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles ORDER BY creation_date DESC LIMIT 0, 5');
            return $articles;
        }

        public function getPost($postId) {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles WHERE id = ?');
            $resp = $req->execute(array($postId));
            if(!$resp) {throw new Exception('Impossible to fetch the article!', 25);}
            $post = $req->fetch();
            return $post;
        }
    }