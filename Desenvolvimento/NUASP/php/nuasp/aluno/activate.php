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
    
    // Setar o Id que será desativado
    $aluno->id = $data->id;
    
    // Setar valores das propriedades
    $aluno->isAtivo = 1;
    
    // Update Aluno
    if($aluno->deactivateActivate()){
    
        http_response_code(200);
        echo json_encode(array("message" => "Registro ativado com sucesso."));
    }
    else{
    
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível ativar o registro."));
    }
?>