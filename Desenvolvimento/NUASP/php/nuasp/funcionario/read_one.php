<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    include_once '../config/database.php';
    include_once '../objects/funcionario.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $funcionario = new Funcionario($db);
    
    $funcionario->id = isset($_GET['id']) ? $_GET['id'] : die();
    
    $funcionario->readOne();
    
    if($funcionario->nome != null){
        
        $funcionario_arr = array(
            "id" => $funcionario->id,
            "nome" => $funcionario->nome,
            "cpf" => $funcionario->cpf,
            "telefone" => $funcionario->telefone,
            "email" => $funcionario->email,
            "dataNascimento" => $funcionario->dataNascimento,
            "isAtivo" => $funcionario->isAtivo,
            "senha" => $funcionario->senha
        );
    
        http_response_code(200);
        echo json_encode($funcionario_arr);
    }
    
    else{
        http_response_code(404);
        echo json_encode(array("message" => "Registro não existe."));
    }
?>