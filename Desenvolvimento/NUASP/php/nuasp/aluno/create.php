<?php    
    include_once '../config/database.php';
    include_once '../objects/aluno.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $aluno = new Aluno($db);

    // Pegar dados
    if(isset($_POST['nome']))
    {
        $nome = $_POST['nome'] . ' ' . $_POST['sobrenome'];
        $cpf = $_POST['cpf'];
        $telefone = '(' . $_POST['ddd'] . ') ' . $_POST['telefone'];
        $email = $_POST['email'];
        $dataNascimento = $_POST['dataNasc'];
        $senha = $_POST['senha'];
    }

    // Verificar se os dados não estão vazios
    if(
        !empty($nome) &&
        !empty($cpf) &&
        !empty($telefone) &&
        !empty($email) &&
        !empty($dataNascimento) &&
        !empty($senha)
    ){
        // Setar valores dos alunos
        $aluno->nome = $nome;
        $aluno->cpf = $cpf;
        $aluno->telefone = $telefone;
        $aluno->email = $email;
        $aluno->dataNascimento = date($dataNascimento);
        $aluno->senha = password_hash($senha, PASSWORD_DEFAULT);

        // Criar aluno
        if($aluno->create()){
            //http_response_code(201);
            //echo json_encode(array("message" => "Registro incluido com sucesso."));
            echo "<meta http-equiv='refresh' content='0;url=../../../CadastroAluno.php?response=Sucesso'>";
        }
        else{
            // Não foi possível registrar o aluno por algum motivo.
            //http_response_code(503);
            //echo json_encode(array("message" => "Não foi possível incluir a informação."));
            echo "<meta http-equiv='refresh' content='0;url=../../../CadastroAluno.php?response=Erro'>";
        }
    }
    else{
        // Dados incompletos
        //http_response_code(400);
        //echo json_encode(array("message" => "Não foi possível incluir a informação. Os dados estão incompletos."));
        echo "<meta http-equiv='refresh' content='0;url=../../../CadastroAluno.php?response=Incompleto'>";
    }
?>