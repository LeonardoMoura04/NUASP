<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    include_once '../config/database.php';
    include_once '../objects/parcelas.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $parcelas = new Parcelas($db);
    
    $parcelas->id = isset($_GET['id']) ? $_GET['id'] : die();
    
    $parcelas->readOne();
    
    if($parcelas->id != null){
        
        $parcelas_arr = array(
            "id" => $parcelas->id,
            "dividaId" => $parcelas->dividaId,
            "numeroParcela" => $parcelas->numeroParcela,
            "dataVencimento" => $parcelas->dataVencimento,
            "valorParcela" => $parcelas->valorParcela,
            "dividaParcelas" => $parcelas->dividaParcelas,
            "dividaValor" => $parcelas->dividaValor,
            "dividaIsPaga" => $parcelas->dividaIsPaga,
            "alunoId" => $parcelas->alunoId,
            "instituicaoId" => $parcelas->instituicaoId,
            "tipoPagamentoId" => $parcelas->tipoPagamentoId,
            "instituicaoCnpj" => $parcelas->instituicaoCnpj,
            "instituicaoNome" => $parcelas->instituicaoNome,
            "alunoNome" => $parcelas->alunoNome,
            "alunoCpf" => $parcelas->alunoCpf,
            "alunoEmail" => $parcelas->alunoEmail,
            "tipoPagamentoNome" => $parcelas->tipoPagamentoNome
        );
    
        http_response_code(200);
        echo json_encode($parcelas_arr);
    }
    
    else{
        http_response_code(404);
        echo json_encode(array("message" => "Registro não existe."));
    }
?>