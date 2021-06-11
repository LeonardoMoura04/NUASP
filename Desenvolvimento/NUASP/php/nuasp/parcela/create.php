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
    
    // get posted data
    $data = json_decode(file_get_contents("php://input"));

    // Verificar se os dados não estão vazios
    if(
        !empty($data->dividaId) &&
        !empty($data->numeroParcela) &&
        !empty($data->dataVencimento) &&
        !empty($data->valorParcela)
    ){
    
        // Setar valores dos parcelass
        $parcelas->dividaId = $data->dividaId;
        $parcelas->numeroParcela = $data->numeroParcela;
        $parcelas->dataVencimento = date($data->dataVencimento);
        $parcelas->valorParcela = $data->valorParcela;

        // Criar parcelas
        if($parcelas->create()){
            http_response_code(201);
            echo json_encode(array("message" => "Registro incluido com sucesso."));
        }
        else{
            // Não foi possível registrar as parcelas por algum motivo.
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