<?php
class Koneksi{
    private $host = "localhost";
    private $user = "sapa";
    private $pass = "melbu";
    private $dbnm = "db_rekammedis";
    public $db;
    public function __construct()
    {
        try{
            $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbnm", "$this->user", "$this->pass");
        }catch(PDOException $e){
            $e->getMessage();
        }
        return $this->db;
    }
}
?>