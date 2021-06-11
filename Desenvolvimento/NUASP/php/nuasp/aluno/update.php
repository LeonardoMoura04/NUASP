<?php    
    include_once '../config/database.php';
    include_once '../objects/aluno.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $aluno = new Aluno($db);
    
    if(isset($_GET['nome']))
    {
        $nome = $_GET['nome'] . ' ' . $_GET['sobrenome'];
        $cpf = $_GET['cpf'];
        $telefone = '(' . $_GET['ddd'] . ') ' . $_GET['telefone'];
        $email = $_GET['email'];
        $dataNascimento = $_GET['dataNasc'];
        $senha = $_GET['senha'];
    }
    
    // Setar o Id do Aluno que será editado
    $aluno->id = $id;
    
    // Setar valores das propriedades
    $aluno->nome = $nome;
    $aluno->cpf = $cpf;
    $aluno->telefone = $telefone;
    $aluno->email = $email;
    $aluno->dataNascimento = date($dataNascimento);
    $aluno->senha = password_hash($senha, PASSWORD_DEFAULT);
    
    // Update Aluno
    if($aluno->update()){
        // http_response_code(200);
        // echo json_encode(array("message" => "Registro atualizado com sucesso."));
        echo "<meta http-equiv='refresh' content='0;url=../../../ListagemAluno.php?response=Sucesso'>";
    }
    else{
        // http_response_code(503);
        // echo json_encode(array("message" => "Não foi possível atualizar o registro."));
        echo "<meta http-equiv='refresh' content='0;url=../../../ListagemAluno.php?response=Erro'>";
    }
?>