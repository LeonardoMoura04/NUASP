<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../objects/parcelas.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $parcelas = new Parcelas($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    // Setar o Id do parcelas que será editado
    $parcelas->id = $data->id;
    
    // Setar valores das propriedades
    $parcelas->dividaId = $data->dividaId;
    $parcelas->numeroParcela = $data->numeroParcela;
    $parcelas->dataVencimento = date($data->dataVencimento);
    $parcelas->valorParcela = $data->valorParcela;
    
    // Update parcelas
    if($parcelas->update()){
    
        http_response_code(200);
        echo json_encode(array("message" => "Registro atualizado com sucesso."));
    }
    else{
    
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível atualizar o registro."));
    }
?>