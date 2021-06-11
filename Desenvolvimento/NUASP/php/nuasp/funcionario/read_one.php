<?php
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
            "senha" => $funcionario->senha,
            "instituicaoId" => $funcionario->instituicaoId,
            "instituicaoCnpj" => $funcionario->instituicaoCnpj,
            "instituicaoNome" => $funcionario->instituicaoNome
        );
    
        //http_response_code(200);
        echo json_encode($funcionario_arr);
    }
    
    else{
        //http_response_code(404);
        //echo json_encode(array("message" => "Registro não existe."));
        echo "<meta http-equiv='refresh' content='0;url=../../../Login.php?response=Sucesso'>";
    }
?>