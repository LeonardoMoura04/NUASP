<?php
    include_once '../config/database.php';
    include_once '../objects/aluno.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $aluno = new Aluno($db);
    
    // Pegar keywords
    $keywords = isset($_GET["s"]) ? $_GET["s"] : "";
    
    // Query
    $stmt = $aluno->search($keywords);
    $num = $stmt->rowCount();
    
    if($num>0){
    
        // Alunos array
        $alunos_arr=array();
        $alunos_arr["records"]=array();
    
        // retrieve our table contents
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
    
        //http_response_code(200);
        echo json_encode($alunos_arr);
    }
    
    else{
        // http_response_code(404);
        // echo json_encode(array("message" => "Registro não encontrado."));
        echo "<meta http-equiv='refresh' content='0;url=../../../ListagemAluno.php?response=Erro'>";
    }
?>