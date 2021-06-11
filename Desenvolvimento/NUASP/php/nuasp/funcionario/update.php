<?php
    include_once '../config/database.php';
    include_once '../objects/funcionario.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $funcionario = new Funcionario($db);
    
    if(isset($_GET['nome']))
    {
        $nome = $_GET['nome'] . ' ' . $_GET['sobrenome'];
        $cpf = $_GET['cpf'];
        $telefone = '(' . $_GET['ddd'] . ') ' . $_GET['telefone'];
        $email = $_GET['email'];
        $dataNascimento = $_GET['dataNasc'];
        $senha = $_GET['senha'];
        $instituicaoId = $_GET['instituicaoId'];
    }
    
    // Setar o Id do funcionario que será editado
    $funcionario->id = $id;
    
    // Setar valores das propriedades
    $funcionario->nome = $nome;
    $funcionario->cpf = $cpf;
    $funcionario->telefone = $telefone;
    $funcionario->email = $email;
    $funcionario->dataNascimento = date($dataNascimento);
    $funcionario->senha = password_hash($senha, PASSWORD_DEFAULT);
    $funcionario->instituicaoId = $instituicaoId;
    
    // Update funcionario
    if($funcionario->update()){
        // http_response_code(200);
        // echo json_encode(array("message" => "Registro atualizado com sucesso."));
        echo "<meta http-equiv='refresh' content='0;url=../../../ListagemFuncionario.php?response=Sucesso'>";
    }
    else{
        // http_response_code(503);
        // echo json_encode(array("message" => "Não foi possível atualizar o registro."));
        echo "<meta http-equiv='refresh' content='0;url=../../../ListagemFuncionario.php?response=Erro'>";
    }
?>