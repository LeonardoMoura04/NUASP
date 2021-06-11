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
// Criar
function create(){

    // Query
    $query = "INSERT INTO " . $this->table_name . " 
                SET nome=:nome, cnpj=:cnpj, instituicaoId=:instituicaoId;";

    // Preparar query
    $stmt = $this->conn->prepare($query);

    // Limpar query
    $this->nome=htmlspecialchars(strip_tags($this->nome));
    $this->cnpj=htmlspecialchars(strip_tags($this->cpf));
    $this->instituicaoId=htmlspecialchars(strip_tags($this->instituicaoId));

    // Colocar valores (bind values)
    $stmt->bindParam(":nome", $this->nome);
    $stmt->bindParam(":cnpj", $this->cnpj);
    $stmt->bindParam(":instituicaoId", $this->instituicaoId);

    // Executar query
    if($stmt->execute()){
        return true;
    }

    return false;
}

// Usado para pegar um único registro
function readOne(){

    // Query
    $query = "SELECT f.*, i.cnpj AS instituicaoCnpj, i.nome AS instituicaoNome FROM " . $this->table_name . " f INNER JOIN Instituicao i ON i.id = f.instituicaoId
            WHERE f.id = ?";

    $stmt = $this->conn->prepare( $query );

    $stmt->bindParam(1, $this->id);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set os valores das propriedades
    $this->nome = $row['nome'];
    $this->cnpj = $row['cnpj'];
    $this->instituicaoId = $row['instituicaoId'];
}

// Update
function update(){

    // Query
    $query = "UPDATE
                " . $this->table_name . "
            SET 
                nome=:nome, 
                cnpj=:cnpj, 
                instituicaoId=:instituicaoId
            WHERE
                id = :id";

    // Preparar query
    $stmt = $this->conn->prepare($query);

    // Limpar query
    $this->nome=htmlspecialchars(strip_tags($this->nome));
    $this->cnpj=htmlspecialchars(strip_tags($this->cnpj));
    $this->instituicaoId=htmlspecialchars(strip_tags($this->instituicaoId));

    // Colocar valores (bind values)
    $stmt->bindParam(":nome", $this->nome);
    $stmt->bindParam(":cnpj", $this->cnpj);
    $stmt->bindParam(":instituicaoId", $this->instituicaoId);

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

// Desativar
function deactivateActivate(){

    // Query
    $query = "UPDATE " . $this->table_name . "
            SET 
                isAtivo=:isAtivo
            WHERE
                id = :id";

    // Preparar query
    $stmt = $this->conn->prepare($query);

    // Limpar query
    $this->isAtivo=htmlspecialchars(strip_tags($this->isAtivo));

    // Colocar valores (bind values)
    $stmt->bindParam(":isAtivo", $this->isAtivo);
    $stmt->bindParam(':id', $this->id);

    // Executar query
    if($stmt->execute()){
        return true;
    }

    return false;
}

// Search
function search($keywords){

    // Query
    $query = "SELECT *
            FROM " . $this->table_name . " f INNER JOIN Instituicao i ON i.id = f.instituicaoId
            WHERE f.nome LIKE ? OR f.cpf LIKE ? OR f.email LIKE ?";

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
