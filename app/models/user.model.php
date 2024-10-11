<?php
require_once 'modelConfig.php';
class UserModel {
    private $db;

    public function __construct() {
       $this->db = new ModelConfig();
    }
 
    public function getUserByUsername($username) {    
        $query = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $query->execute([$username]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }
}