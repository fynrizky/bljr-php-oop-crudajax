<?php
class Databases{
    
    private $host;
    private $user;
    private $password;
    private $db;
    public $connects;

    public function __construct($host,$user,$pass,$db){
        $this->host = $host;
        $this->user = $user;
        $this->password = $pass;
        $this->db = $db;

        $this->connects = new mysqli($this->host,$this->user,$this->password,$this->db);
        if(!$this->connects->connect_errno){
            // echo "<script>alert('Connect DB Success')</script>";
            return true;
        }else{
            echo "<script>alert('Connect DB Failed')</script>".$this->connect->connect_error;
            return false;
        }
    }
}