<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../objects/aluno.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $aluno = new Aluno($db);
    
    // get posted data
    $data = json_decode(file_get_contents("php://input"));

    // Verificar se os dados não estão vazios
    if(
        !empty($data->nome) &&
        !empty($data->cpf) &&
        !empty($data->telefone) &&
        !empty($data->email) &&
        !empty($data->dataNascimento) &&
        !empty($data->senha)
    ){
    
        // Setar valores dos alunos
        $aluno->nome = $data->nome;
        $aluno->cpf = $data->cpf;
        $aluno->telefone = $data->telefone;
        $aluno->email = $data->email;
        $aluno->dataNascimento = date($data->dataNascimento);
        $aluno->senha = $data->senha;

        // Criar aluno
        if($aluno->create()){
            http_response_code(201);
            echo json_encode(array("message" => "Registro incluido com sucesso."));
        }
        else{
            // Não foi possível registrar o aluno por algum motivo.
            http_response_code(503);
            echo json_encode(array("message" => "Não foi possível incluir a informação."));
        }
    }
    else{
        // Dados incompletos
        http_response_code(400);
        echo json_encode(array("message" => "Não foi possível incluir a informação. Os dados estão incompletos."));
    }
?>