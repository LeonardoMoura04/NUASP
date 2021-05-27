<?php
class Parcelas{
  
    // database connection and table name
    private $conn;
    private $table_name = "parcelas";
  
    // object properties
    public $id;
    public $dividaId;
    public $numeroParcela;
    public $dataVencimento;
    public $valorParcela;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}
?>