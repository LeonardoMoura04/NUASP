<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../config/database.php';
    include_once '../objects/aluno.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $aluno = new Aluno($db);

    // Query
    $stmt = $aluno->read();
    $num = $stmt->rowCount();
    
    if($num > 0){
        $alunos_arr=array();
        $alunos_arr["records"]=array();
    
        // Pegar o conteúdo da tabela
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
    
            $aluno_item=array(
                "id" => $id,
                "nome" => $nome,
                "cpf" => $cpf,
                "telefone" => $telefone,
                "email" => $email,
                "dataNascimento" => $dataNascimento,
                "isAtivo" => $isAtivo,
                "senha" => $senha
            );
    
            array_push($alunos_arr["records"], $aluno_item);
        }
    
        http_response_code(200);
        echo json_encode($alunos_arr);
    }
    else{
        http_response_code(404);
        
        echo json_encode(
            array("message" => "Registro não encontrado.")
        );
    }

?>