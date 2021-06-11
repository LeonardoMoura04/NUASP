<?php 
    include_once '../config/database.php';
    include_once '../objects/aluno.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $aluno = new Aluno($db);
    
    // Setar o Id que será ativado
    $aluno->id = isset($_GET['id']) ? $_GET['id'] : die();
    
    // Setar valores das propriedades
    $aluno->isAtivo = 1;
    
    // Update Aluno
    if($aluno->deactivateActivate()){
        // http_response_code(200);
        // echo json_encode(array("message" => "Registro ativado com sucesso."));
        echo "<meta http-equiv='refresh' content='0;url=../../../ListagemAlunos.php?response=Sucesso'>";
    }
    else{
        // http_response_code(503);
        // echo json_encode(array("message" => "Não foi possível ativar o registro."));
        echo "<meta http-equiv='refresh' content='0;url=../../../ListagemAlunos.php?response=Erro'>";
    }
?>