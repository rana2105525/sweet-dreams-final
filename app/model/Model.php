<?php
session_start();

require_once("../app/db/Dbh.php");
abstract class Model{
    protected $db;
    protected $conn;
    //protected $user_id;

    
    // public function __construct() {
    //     $this->db = new Dbh();

    //     // Retrieve user ID from session
    //     $this->user_id = $_SESSION['id'];
    // }
    public function connect(){
        if(null === $this->conn ){
            $this->db = new Dbh();
        }
        return $this->db;
    }
 }
?>