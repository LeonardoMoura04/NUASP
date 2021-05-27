<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../objects/funcionario.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $funcionario = new Funcionario($db);
    
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
    
        // Setar valores dos funcionarios
        $funcionario->nome = $data->nome;
        $funcionario->cpf = $data->cpf;
        $funcionario->telefone = $data->telefone;
        $funcionario->email = $data->email;
        $funcionario->dataNascimento = date($data->dataNascimento);
        $funcionario->senha = $data->senha;

        // Criar funcionario
        if($funcionario->create()){
            http_response_code(201);
            echo json_encode(array("message" => "Registro incluido com sucesso."));
        }
        else{
            // Não foi possível registrar o funcionario por algum motivo.
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