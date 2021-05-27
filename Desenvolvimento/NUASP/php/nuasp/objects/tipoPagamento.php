<?php
class TipoPagamento{
  
    // database connection and table name
    private $conn;
    private $table_name = "tipoPagamento";
  
    // object properties
    public $id;
    public $nome;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}
?>