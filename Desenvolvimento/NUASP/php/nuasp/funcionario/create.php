<?php
    include_once '../config/database.php';
    include_once '../objects/funcionario.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $funcionario = new Funcionario($db);
    
    // get posted data
    if(isset($_POST['nome']))
    {
        $nome = $_POST['nome'] . ' ' . $_POST['sobrenome'];
        $cpf = $_POST['cpf'];
        $telefone = '(' . $_POST['ddd'] . ') ' . $_POST['telefone'];
        $email = $_POST['email'];
        $dataNascimento = $_POST['dataNasc'];
        $senha = $_POST['senha'];
        $instituicaoId = $_POST['instituicaoId'];
    }

    // Verificar se os dados não estão vazios
    if(
        !empty($nome) &&
        !empty($cpf) &&
        !empty($telefone) &&
        !empty($email) &&
        !empty($dataNascimento) &&
        !empty($senha)/* &&
        !empty($instituicaoId)*/
    ){
        // Setar valores dos funcionarios
        $funcionario->nome = $nome;
        $funcionario->cpf = $cpf;
        $funcionario->telefone = $telefone;
        $funcionario->email = $email;
        $funcionario->dataNascimento = date($dataNascimento);
        $funcionario->senha = password_hash($senha, PASSWORD_DEFAULT);
        $funcionario->instituicaoId = $instituicaoId;

        // Criar Funcionario
        if($funcionario->create()){
            //http_response_code(201);
            //echo json_encode(array("message" => "Registro incluido com sucesso."));
            echo "<meta http-equiv='refresh' content='0;url=../../../CadastroFuncionario.php?response=Sucesso'>";
        }
        else{
            // Não foi possível registrar o Funcionario por algum motivo.
            //http_response_code(503);
            //echo json_encode(array("message" => "Não foi possível incluir a informação."));
            echo "<meta http-equiv='refresh' content='0;url=../../../CadastroFuncionario.php?response=Erro'>";
        }
    }
    else{
        // Dados incompletos
        //http_response_code(400);
        //echo json_encode(array("message" => "Não foi possível incluir a informação. Os dados estão incompletos."));
        echo "<meta http-equiv='refresh' content='0;url=../../../CadastroFuncionario.php?response=Incompleto'>";
    }
?>