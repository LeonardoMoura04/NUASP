<?php
class Instituicao{
  
    // database connection and table name
    private $conn;
    private $table_name = "instituicao";
  
    // object properties
    public $id;
    public $cnpj;
    public $nome;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}
?>