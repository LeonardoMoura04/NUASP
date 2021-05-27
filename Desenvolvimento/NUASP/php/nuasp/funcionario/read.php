<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../config/database.php';
    include_once '../objects/funcionario.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $funcionario = new Funcionario($db);

    // Query
    $stmt = $funcionario->read();
    $num = $stmt->rowCount();
    
    if($num > 0){
        $funcionarios_arr=array();
        $funcionarios_arr["records"]=array();
    
        // Pegar o conteúdo da tabela
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
    
            $funcionario_item=array(
                "id" => $id,
                "nome" => $nome,
                "cpf" => $cpf,
                "telefone" => $telefone,
                "email" => $email,
                "dataNascimento" => $dataNascimento,
                "isAtivo" => $isAtivo,
                "senha" => $senha,
                "instituicaoId" => $instituicaoId,
                "cnpj" => $instituicaoCnpj,
                "instituicaoNome" => $instituicaoNome
            );
    
            array_push($funcionarios_arr["records"], $funcionario_item);
        }
    
        http_response_code(200);
        echo json_encode($funcionarios_arr);
    }
    else{
        http_response_code(404);
        
        echo json_encode(
            array("message" => "Registro não encontrado.")
        );
    }

?>