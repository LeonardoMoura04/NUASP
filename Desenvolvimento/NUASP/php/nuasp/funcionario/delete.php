<?php
    include_once '../config/database.php';
    include_once '../objects/funcionario.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $funcionario = new Funcionario($db);

    // Setar Id para ser deletado
    $funcionario->id = isset($_GET['id']) ? $_GET['id'] : die();
    
    if($funcionario->delete()){
        // http_response_code(200);
        // echo json_encode(array("message" => "Registro foi deletado com sucesso."));
        echo "<meta http-equiv='refresh' content='0;url=../../../ListagemFuncionario.php?response=Sucesso'>";
    }
    else{
        // http_response_code(503);
        // echo json_encode(array("message" => "Não foi possível deletar o registro."));
        echo "<meta http-equiv='refresh' content='0;url=../../../ListagemFuncionario.php?response=Sucesso'>";
    }
?>