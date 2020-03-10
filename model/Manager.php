<?php
namespace WCoding\Blog\Model;
class Manager {

    protected function dbConnect() {
        return new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
    }
}