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
    
    $data = json_decode(file_get_contents("php://input"));
    
    // Setar o Id do Aluno que será editado
    $aluno->id = $data->id;
    
    // Setar valores das propriedades
    $aluno->nome = $data->nome;
    $aluno->cpf = $data->cpf;
    $aluno->telefone = $data->telefone;
    $aluno->email = $data->email;
    $aluno->dataNascimento = date($data->dataNascimento);
    $aluno->senha = $data->senha;
    
    // Update Aluno
    if($aluno->update()){
    
        http_response_code(200);
        echo json_encode(array("message" => "Registro atualizado com sucesso."));
    }
    else{
    
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível atualizar o registro."));
    }
?>