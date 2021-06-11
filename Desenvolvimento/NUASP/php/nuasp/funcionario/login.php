<?php    
    include_once '../config/database.php';
    include_once '../objects/funcionario.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $funcionario = new Funcionario($db);
    
    // Pegar dados
    if(isset($_POST['cpf']))
    {
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
    }
    
    // Itens do login
    $stmt = $funcionario->searchCPF($cpf);
    $num = $stmt->rowCount();
    
    if($num > 0){
    
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
                "senha" => $senha
            );

            // Update funcionario
            if(($funcionario_item["cpf"] != $cpf || !password_verify($funcionario_item["senha"], password_hash($senha, PASSWORD_DEFAULT))) 
                && $funcionario_item["isAtivo"] == 1){
                // http_response_code(200);
                // echo json_encode(array("message" => "Login efetuado com sucesso."));
                echo "<meta http-equiv='refresh' content='0;url=../../../Login.php?response=Sucesso'>";
            }
            else if ($funcionario_item["isAtivo"] == 0){
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