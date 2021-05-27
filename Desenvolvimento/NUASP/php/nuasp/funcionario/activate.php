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
    
    $data = json_decode(file_get_contents("php://input"));
    
    // Setar o Id que será desativado
    $funcionario->id = $data->id;
    
    // Setar valores das propriedades
    $funcionario->isAtivo = 1;
    
    // Update funcionario
    if($funcionario->deactivateActivate()){
    
        http_response_code(200);
        echo json_encode(array("message" => "Registro ativado com sucesso."));
    }
    else{
    
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível ativar o registro."));
    }
?>