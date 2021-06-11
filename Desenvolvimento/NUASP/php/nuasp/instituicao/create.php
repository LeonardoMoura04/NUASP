<?php
    include_once '../config/database.php';
    include_once '../objects/funcionario.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $instituicao = new Instituicao($db);
    
    // get posted data
    if(isset($_POST['nome']))
    {
        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];
        $instituicaoId = $_POST['instituicaoId'];
    }

    // Verificar se os dados não estão vazios
    if(
        !empty($nome) &&
        !empty($cnpj)/* &&
        !empty($instituicaoId)*/
    ){
        // Setar valores dos funcionarios
        $instituicao->nome = $nome;
        $instituicao->cnpj = $cnpj;
        $instituicao->instituicaoId = $instituicaoId;

        // Criar Funcionario
        if($instituicao->create()){
            //http_response_code(201);
            //echo json_encode(array("message" => "Registro incluido com sucesso."));
            echo "<meta http-equiv='refresh' content='0;url=../../../index.php?response=Sucesso'>";
        }
        else{
            // Não foi possível registrar o Funcionario por algum motivo.
            //http_response_code(503);
            //echo json_encode(array("message" => "Não foi possível incluir a informação."));
            echo "<meta http-equiv='refresh' content='0;url=../../../index.php?response=Erro'>";
        }
    }
    else{
        // Dados incompletos
        //http_response_code(400);
        //echo json_encode(array("message" => "Não foi possível incluir a informação. Os dados estão incompletos."));
        echo "<meta http-equiv='refresh' content='0;url=../../../Index.php?response=Incompleto'>";
    }
?>