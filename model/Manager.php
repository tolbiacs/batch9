<?php 
namespace WCoding\Blog\Model;
class Manager {
    protected function dbConnect() {
        //we don't need try and catch anymore here, as we have it in the router
        return new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
}
