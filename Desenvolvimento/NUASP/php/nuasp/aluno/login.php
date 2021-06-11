<?php    
    include_once '../config/database.php';
    include_once '../objects/aluno.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $aluno = new Aluno($db);
    
    // Pegar dados
    if(isset($_POST['cpf'])
    ){
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
    }
    
    // Itens do login
    $stmt = $aluno->searchCPF($data->cpf);
    $num = $stmt->rowCount();
    
    if($num > 0){
    
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

            // Update Aluno
            if(($aluno_item["cpf"] == $cpf && password_verify($aluno_item["senha"], password_hash($senha, PASSWORD_DEFAULT)))
                && $aluno_item["isAtivo"] == 1){
                // http_response_code(200);
                // echo json_encode(array("message" => "Login efetuado com sucesso."));
                echo "<meta http-equiv='refresh' content='0;url=../../../Login.php?response=Sucesso'>";
            }
            else if ($aluno_item["isAtivo"] == 0){
                // http_response_code(404);
                // echo json_encode(array("message" => "Registro inativo."));
                echo "<meta http-equiv='refresh' content='0;url=../../../Login.php?response=Inativo'>";
            }
            else{
                // http_response_code(404);
                // echo json_encode(array("message" => "Senha inválida."));
                echo "<meta http-equiv='refresh' content='0;url=../../../Login.php?response=Invalido'>";
            }
        }
    }
    else{
        // http_response_code(404);
        // echo json_encode(array("message" => "Registro inexistente ou com usuário e/ou senha inválidos."));
        echo "<meta http-equiv='refresh' content='0;url=../../../Login.php?response=Inexistente'>";
    }
?>