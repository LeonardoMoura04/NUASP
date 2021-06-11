<?php
    include_once '../config/database.php';
    include_once '../objects/funcionario.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $funcionario = new Funcionario($db);
    
    // Pegar keywords
    $keywords=isset($_GET["s"]) ? $_GET["s"] : "";
    
    // Query
    $stmt = $funcionario->search($keywords);
    $num = $stmt->rowCount();
    
    if($num>0){
    
        // funcionarios array
        $funcionarios_arr=array();
        $funcionarios_arr["records"]=array();
    
        // retrieve our table contents
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
                "instituicaoCnpj" => $instituicaoCnpj,
                "instituicaoNome" => $instituicaoNome
            );
    
            array_push($funcionarios_arr["records"], $funcionario_item);
        }
    
        //http_response_code(200);
        echo json_encode($funcionarios_arr);
        echo "<meta http-equiv='refresh' content='0;url=../../../ListagemFuncionario.php?response=Sucesso'>";
    }
    
    else{
        // http_response_code(404);
        // echo json_encode(array("message" => "Registro não encontrado."));
        echo "<meta http-equiv='refresh' content='0;url=../../../ListagemFuncionario.php?response=Erro'>";
    }
?>