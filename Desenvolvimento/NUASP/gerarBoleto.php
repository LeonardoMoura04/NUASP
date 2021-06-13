<?php
    // +----------------------------------------------------------------------+
    // | BoletoPhp - Vers�o Beta                                              |
    // +----------------------------------------------------------------------+
    // | Este arquivo est� dispon�vel sob a Licen�a GPL dispon�vel pela Web   |
    // | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
    // | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
    // | esse pacote; se n�o, escreva para:                                   |
    // |                                                                      |
    // | Free Software Foundation, Inc.                                       |
    // | 59 Temple Place - Suite 330                                          |
    // | Boston, MA 02111-1307, USA.                                          |
    // +----------------------------------------------------------------------+

    // +----------------------------------------------------------------------+
    // | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
    // | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
    // | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa			       	  |
    // | 																	                                    |
    // | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
    // | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
    // +----------------------------------------------------------------------+

    // +----------------------------------------------------------------------+
    // | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
    // | Desenvolvimento Boleto Bradesco: Ramon Soares						            |
    // +----------------------------------------------------------------------+


    // ------------------------- DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
    // Os valores abaixo podem ser colocados manualmente ou ajustados p/ formul�rio c/ POST, GET ou de BD (MySql,Postgre,etc)	//

        
    if(isset($_GET["valor"]) && !empty($_GET["valor"]) && 
        isset($_GET["data"]) && !empty($_GET["data"]) && 
        isset($_GET["nome"]) && !empty($_GET["nome"]) &&
        isset($_GET["cpf"]) && !empty($_GET["cpf"])){
            
        $valor = trim($_GET["valor"]);
        $dataVencimento = trim($_GET["data"]);
        $nomeCliente = trim($_GET["nome"]);
        $cpfCliente = trim($_GET["cpf"]);

        // DADOS DO BOLETO PARA O SEU CLIENTE
        $dias_de_prazo_para_pagamento = 5;
        $taxa_boleto = 2.95;
        $valor_cobrado = str_replace(",", ".", $valor);
        $valor_boleto = number_format($valor + $taxa_boleto, 2, ',', '');

        $dadosboleto["nosso_numero"] = "75896452";  // Nosso numero sem o DV - REGRA: M�ximo de 11 caracteres!
        $dadosboleto["numero_documento"] = $dadosboleto["nosso_numero"];	// Num do pedido ou do documento = Nosso numero
        $dadosboleto["data_vencimento"] = $dataVencimento; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
        $dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
        $dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
        $dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula

        // DADOS DO SEU CLIENTE
        $dadosboleto["sacado"] = $nomeCliente . " - CPF: " . $cpfCliente;
        $dadosboleto["endereco1"] = "Rua Pastor Hugo Gegembauer, 265";
        $dadosboleto["endereco2"] = "Hortolândia - SP -  CEP: 13184-010";

        // INFORMACOES PARA O CLIENTE
        $dadosboleto["demonstrativo1"] = "Pagamento de Pagamento na NUASP";
        $dadosboleto["demonstrativo2"] = "Mensalidade referente a pagamento da mensalidade do curso<br>Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
        $dadosboleto["demonstrativo3"] = "BoletoPhp - http://www.boletophp.com.br";
        $dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
        $dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
        $dadosboleto["instrucoes3"] = "- Em caso de dívidas entre em contato conosco: ma.santos@nuasp.org.br";
        $dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

        // DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
        $dadosboleto["quantidade"] = "001";
        $dadosboleto["valor_unitario"] = $valor_boleto;
        $dadosboleto["aceite"] = "";
        $dadosboleto["especie"] = "R$";
        $dadosboleto["especie_doc"] = "DS";


        // ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //


        // DADOS DA SUA CONTA - Bradesco
        $dadosboleto["agencia"] = "1100"; // Num da agencia, sem digito
        $dadosboleto["agencia_dv"] = "0"; // Digito do Num da agencia
        $dadosboleto["conta"] = "0102003"; 	// Num da conta, sem digito
        $dadosboleto["conta_dv"] = "4"; 	// Digito do Num da conta

        // DADOS PERSONALIZADOS - Bradesco
        $dadosboleto["conta_cedente"] = "0102003"; // ContaCedente do Cliente, sem digito (Somente N�meros)
        $dadosboleto["conta_cedente_dv"] = "4"; // Digito da ContaCedente do Cliente
        $dadosboleto["carteira"] = "06";  // C�digo da Carteira: pode ser 06 ou 03

        // SEUS DADOS
        $dadosboleto["identificacao"] = "NUASP - Negociações Universitárias Adventista de São Paulo";
        $dadosboleto["cpf_cnpj"] = "";
        $dadosboleto["endereco"] = "Rua Pastor Hugo Gegembauer, 265 - Parque Ortolândia, Hortolândia - SP, 13184-010";
        $dadosboleto["cidade_uf"] = "Hortolândia / SP";
        $dadosboleto["cedente"] = "NUASP";

        // N�O ALTERAR!
        include("include/funcoes_bradesco.php");
        include("include/layout_bradesco.php");
    } else{
        header("location: error.php");
        exit();
    }
?>
