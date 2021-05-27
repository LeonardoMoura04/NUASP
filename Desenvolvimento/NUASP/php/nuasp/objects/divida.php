<?php
class Divida{
  
    // database connection and table name
    private $conn;
    private $table_name = "divida";
  
    // object properties
    public $id;
    public $numeroParcelas;
    public $valorTotal;
    public $isPaga;
    public $alunoId;
    public $instituicaoId;
    public $tipoPagamentoId;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}
?>