<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    include_once '../config/database.php';
    include_once '../objects/aluno.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $aluno = new Aluno($db);
    
    $aluno->id = isset($_GET['id']) ? $_GET['id'] : die();
    
    $aluno->readOne();
    
    if($aluno->nome != null){
        
        $aluno_arr = array(
            "id" => $aluno->id,
            "nome" => $aluno->nome,
            "cpf" => $aluno->cpf,
            "telefone" => $aluno->telefone,
            "email" => $aluno->email,
            "dataNascimento" => $aluno->dataNascimento,
            "isAtivo" => $aluno->isAtivo,
            "senha" => $aluno->senha
        );
    
        http_response_code(200);
        echo json_encode($aluno_arr);
    }
    
    else{
        http_response_code(404);
        echo json_encode(array("message" => "Registro não existe."));
    }
?>