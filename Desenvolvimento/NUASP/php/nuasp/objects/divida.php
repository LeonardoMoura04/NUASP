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

    // Select
    function read(){
    
        // Query
        $query = "SELECT d.*,
                    i.cnpj AS instituicaoCnpj, i.nome AS instituicaoNome,
                    a.nome AS alunoNome, a.cpf AS alunoCpf, a.email AS alunoEmail,
                    tp.nome AS tipoPagamentoNome
                    FROM " . $this->table_name . " d
                    INNER JOIN Instituicao i ON i.id = d.instituicaoId
                    INNER JOIN Aluno a ON a.id = d.alunoId
                    INNER JOIN TipoPagamento tp ON tp.id = d.tipoPagamentoId;";
        
        // Preparar query
        $stmt = $this->conn->prepare($query);

        // Executar query
        $stmt->execute();
    
        return $stmt;
    }

    // Criar
    function create(){

        // Query
        $query = "INSERT INTO " . $this->table_name . " 
                    SET dividaId=:dividaId, numeroParcela=:numeroParcela, dataVencimento=:dataVencimento, valorParcela=:valorParcela;";
    
        // Preparar query
        $stmt = $this->conn->prepare($query);
    
        // Limpar query
        $this->dividaId=htmlspecialchars(strip_tags($this->dividaId));
        $this->numeroParcela=htmlspecialchars(strip_tags($this->numeroParcela));
        $this->dataVencimento=htmlspecialchars(strip_tags($this->dataVencimento));
        $this->valorParcela=htmlspecialchars(strip_tags($this->valorParcela));
    
        // Colocar valores (bind values)
        $stmt->bindParam(":dividaId", $this->dividaId);
        $stmt->bindParam(":numeroParcela", $this->numeroParcela);
        $stmt->bindParam(":dataVencimento", $this->dataVencimento);
        $stmt->bindParam(":valorParcela", $this->valorParcela);
    
        // Executar query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // Usado para pegar um único registro
    function readOne(){
    
        // Query
        $query = "SELECT d.*,
                    i.cnpj AS instituicaoCnpj, i.nome AS instituicaoNome,
                    a.nome AS alunoNome, a.cpf AS alunoCpf, a.email AS alunoEmail,
                    tp.nome AS tipoPagamentoNome
                    FROM " . $this->table_name . " d
                    INNER JOIN Instituicao i ON i.id = d.instituicaoId
                    INNER JOIN Aluno a ON a.id = d.alunoId
                    INNER JOIN TipoPagamento tp ON tp.id = d.tipoPagamentoId
                    WHERE d.id = ?;";
    
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Set os valores das propriedades
        $this->dividaId = $row['dividaId'];
        $this->numeroParcela = $row['numeroParcela'];
        $this->dataVencimento = $row['dataVencimento'];
        $this->valorParcela = $row['valorParcela'];
        $this->dividaParcelas = $row['dividaParcelas'];
        $this->dividaValor = $row['dividaValor'];
        $this->dividaIsPaga = $row['dividaIsPaga'];
        $this->alunoId = $row['alunoId'];
        $this->instituicaoId = $row['instituicaoId'];
        $this->tipoPagamentoId = $row['tipoPagamentoId'];
        $this->instituicaoCnpj = $row['instituicaoCnpj'];
        $this->instituicaoNome = $row['instituicaoNome'];
        $this->alunoNome = $row['alunoNome'];
        $this->alunoCpf = $row['alunoCpf'];
        $this->alunoEmail = $row['alunoEmail'];
        $this->tipoPagamentoNome = $row['tipoPagamentoNome'];
        
    }

    // Update
    function update(){
    
        // Query
        $query = "UPDATE
                    " . $this->table_name . "
                SET 
                    dividaId=:dividaId, 
                    numeroParcela=:numeroParcela, 
                    dataVencimento=:dataVencimento, 
                    valorParcela=:valorParcela
                WHERE
                    id = :id";
    
        // Preparar query
        $stmt = $this->conn->prepare($query);
    
        // Limpar query
        $this->dividaId=htmlspecialchars(strip_tags($this->dividaId));
        $this->numeroParcela=htmlspecialchars(strip_tags($this->numeroParcela));
        $this->dataVencimento=htmlspecialchars(strip_tags($this->dataVencimento));
        $this->valorParcela=htmlspecialchars(strip_tags($this->valorParcela));
    
        // Colocar valores (bind values)
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(":dividaId", $this->dividaId);
        $stmt->bindParam(":numeroParcela", $this->numeroParcela);
        $stmt->bindParam(":dataVencimento", $this->dataVencimento);
        $stmt->bindParam(":valorParcela", $this->valorParcela);
    
        // Executar query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // Delete
    function delete(){
    
        // Query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
        // Preparar query
        $stmt = $this->conn->prepare($query);
    
        // Limpar query
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // Colocar valores (bind values)
        $stmt->bindParam(1, $this->id);
    
        // Executar query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // Search
    function search($keywords){
    
        // Query
        $query = "SELECT d.*,
                    i.cnpj AS instituicaoCnpj, i.nome AS instituicaoNome,
                    a.nome AS alunoNome, a.cpf AS alunoCpf, a.email AS alunoEmail,
                    tp.nome AS tipoPagamentoNome
                    FROM " . $this->table_name . " d
                    INNER JOIN Instituicao i ON i.id = d.instituicaoId
                    INNER JOIN Aluno a ON a.id = d.alunoId
                    INNER JOIN TipoPagamento tp ON tp.id = d.tipoPagamentoId;";

                    //WHERE p.dividaId LIKE ? OR p.valorParcela LIKE ? OR p.dataVencimento LIKE ?";
    
        // Preparar query
        $stmt = $this->conn->prepare($query);
    
        // Limpar query
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
    
        // Colocar valores (bind values)
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);
    
        // Executar query
        $stmt->execute();
    
        return $stmt;
    }
}
?>