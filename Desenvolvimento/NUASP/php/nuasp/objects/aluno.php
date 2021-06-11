<?php
    class Aluno{
    
        // Conexão com o banco e o nome da tabela
        private $conn;
        private $table_name = "aluno";
    
        // Propriedades do objeto
        public $id;
        public $nome;
        public $cpf;
        public $telefone;
        public $email;
        public $dataNascimento;
        public $isAtivo;
        public $senha;
    
        // Construtor com $db como a conexão do banco de dados
        public function __construct($db){
            $this->conn = $db;
        }

        // Select
        function read(){
    
            // Query
            $query = "SELECT * FROM " . $this->table_name;
            
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
                        SET nome=:nome, cpf=:cpf, telefone=:telefone, email=:email, dataNascimento=:dataNascimento, senha=:senha;";
        
            // Preparar query
            $stmt = $this->conn->prepare($query);
        
            // Limpar query
            $this->nome=htmlspecialchars(strip_tags($this->nome));
            $this->cpf=htmlspecialchars(strip_tags($this->cpf));
            $this->telefone=htmlspecialchars(strip_tags($this->telefone));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->dataNascimento=htmlspecialchars(strip_tags($this->dataNascimento));
            $this->senha=htmlspecialchars(strip_tags($this->senha));
        
            // Colocar valores (bind values)
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":cpf", $this->cpf);
            $stmt->bindParam(":telefone", $this->telefone);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":dataNascimento", $this->dataNascimento);
            $stmt->bindParam(":senha", $this->senha);
        
            // Executar query
            if($stmt->execute()){
                return true;
            }
        
            return false;
        }

        // Usado para pegar um único registro
        function readOne(){
        
            // Query
            $query = "SELECT * FROM " . $this->table_name . "
                    WHERE id = ?";
        
            $stmt = $this->conn->prepare( $query );
        
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
        
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            // Set os valores das propriedades
            $this->nome = $row['nome'];
            $this->cpf = $row['cpf'];
            $this->telefone = $row['telefone'];
            $this->email = $row['email'];
            $this->dataNascimento = $row['dataNascimento'];
            $this->isAtivo = $row['isAtivo'];
            $this->senha = $row['senha'];
        }

        // Update
        function update(){
        
            // Query
            $query = "UPDATE
                        " . $this->table_name . "
                    SET 
                        nome=:nome, 
                        cpf=:cpf, 
                        telefone=:telefone, 
                        email=:email, 
                        dataNascimento=:dataNascimento, 
                        senha=:senha
                    WHERE
                        id = :id";
        
            // Preparar query
            $stmt = $this->conn->prepare($query);
        
            // Limpar query
            $this->nome=htmlspecialchars(strip_tags($this->nome));
            $this->cpf=htmlspecialchars(strip_tags($this->cpf));
            $this->telefone=htmlspecialchars(strip_tags($this->telefone));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->dataNascimento=htmlspecialchars(strip_tags($this->dataNascimento));
            $this->senha=htmlspecialchars(strip_tags($this->senha));
        
            // Colocar valores (bind values)
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":cpf", $this->cpf);
            $stmt->bindParam(":telefone", $this->telefone);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":dataNascimento", $this->dataNascimento);
            $stmt->bindParam(":senha", $this->senha);
            $stmt->bindParam(':id', $this->id);
        
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
                    FROM " . $this->table_name . "
                    WHERE nome LIKE ? OR cpf LIKE ? OR email LIKE ?";
        
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

        // Search by CPF
        function searchCPF($keywords){
        
            // Query
            $query = "SELECT *
                    FROM " . $this->table_name . "
                    WHERE cpf = ?";
        
            // Preparar query
            $stmt = $this->conn->prepare($query);
        
            // Limpar query
            $keywords=htmlspecialchars(strip_tags($keywords));
        
            // Colocar valores (bind values)
            $stmt->bindParam(1, $keywords);
        
            // Executar query
            $stmt->execute();
        
            return $stmt;
        }
    }
?>