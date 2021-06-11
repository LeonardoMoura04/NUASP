<?php
    include_once '../config/database.php';
    include_once '../objects/funcionario.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $funcionario = new Funcionario($db);
    
    // Setar o Id que será desativado
    $funcionario->id = isset($_GET['id']) ? $_GET['id'] : die();
    
    // Setar valores das propriedades
    $funcionario->isAtivo = 0;
    
    // Update funcionario
    if($funcionario->deactivateActivate()){
        // http_response_code(200);
        // echo json_encode(array("message" => "Registro desativado com sucesso."));
        echo "<meta http-equiv='refresh' content='0;url=../../../ListagemFuncionario.php?response=Sucesso'>";
    }
    else{
        // http_response_code(503);
        // echo json_encode(array("message" => "Não foi possível desativar o registro."));
        echo "<meta http-equiv='refresh' content='0;url=../../../ListagemFuncionario.php?response=Erro'>";
    }
?>