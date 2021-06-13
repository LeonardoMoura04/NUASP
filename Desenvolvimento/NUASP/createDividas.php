<?php
    // Include config file
    require_once "config.php";
    
    // Define variables and initialize with empty values
    $numeroParcelas = $valorTotal = $alunoId = $instituicaoId = $tipoPagamentoId = "";
    $numeroParcelas_err = $valorTotal_err = $alunoId_err = $instituicaoId_err = $tipoPagamentoId_err = "";
    $alunosSelectId = $alunosSelectNome = $instituicoesSelectId = $instituicoesSelectNome = $tiposPagamentoSelectId = $tiposPagamentoSelectNome = array();
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validações
        $input_numeroParcelas = trim($_POST["numeroParcelas"]);
        if (empty($input_numeroParcelas)){
            $numeroParcelas_err = "Por favor, insira um número de parcelas.";
        }else{
            $numeroParcelas = $input_numeroParcelas;
        }
        
        $input_valorTotal = trim($_POST["valorTotal"]);
        if (empty($input_valorTotal)){
            $valorTotal_err = "Por favor, insira o valor total.";
        }else{
            $valorTotal = $input_valorTotal;
        }

        $input_alunoId = trim($_POST["alunoId"]);
        if (empty($input_alunoId)){
            $alunoId_err = "Por favor, insira o aluno.";
        }else{
            $alunoId = $input_alunoId;
        }

        $input_instituicaoId = trim($_POST["instituicaoId"]);
        if (empty($input_instituicaoId)){
            $instituicaoId_err = "Por favor, insira a insituição.";
        }else{
            $instituicaoId = $input_instituicaoId;
        }

        $input_tipoPagamentoId = trim($_POST["tipoPagamentoId"]);
        if (empty($input_tipoPagamentoId)){
            $tipoPagamentoId_err = "Por favor, insira o tipo de pagamento.";
        }else{
            $tipoPagamentoId = $input_tipoPagamentoId;
        }

        $anoAtual = date('Y');
        $mesAtual = date('m');

        // Check input errors before inserting in database
        if(empty($numeroParcelas_err) && empty($valorTotal_err) && empty($alunoId_err) && empty($instituicaoId_err) && empty($tipoPagamentoId_err)){
            $sql = "CALL CreateDivida(" . $numeroParcelas . ", " . $valorTotal . ", " . $alunoId . ", " . $instituicaoId . ", " . $tipoPagamentoId . ", " . ($valorTotal / $numeroParcelas) . ", '" . date('Y-m-d', strtotime($anoAtual . '-' . $mesAtual . '-01')) . "');";
            if(mysqli_query($link, $sql)){
                header("location: listagemDividas.php");
                exit();
            }
        }
        
        // Close connection
        if (is_resource($link) && get_resource_type($link)==='mysql link'){
            mysqli_close($link);
        }
    } else{
        // Attempt select query execution
        $sql = 'SELECT a.Id, a.Nome, "Aluno" tipo FROM Aluno a
        UNION
        SELECT i.Id, i.nome, "Instituicao" tipo FROM Instituicao i
        UNION
        SELECT tp.Id, tp.nome, "TipoPagamento" tipo FROM TipoPagamento tp;';

        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    if($row["tipo"] == "Aluno"){
                        array_push($alunosSelectId, $row["Id"]);
                        array_push($alunosSelectNome, $row["Nome"]);
                    }
                    else if ($row["tipo"] == "Instituicao"){
                        array_push($instituicoesSelectId, $row["Id"]);
                        array_push($instituicoesSelectNome, $row["Nome"]);
                    }
                    else if ($row["tipo"] == "TipoPagamento"){
                        array_push($tiposPagamentoSelectId, $row["Id"]);
                        array_push($tiposPagamentoSelectNome, $row["Nome"]);
                    }
                }
                // Free result set
                mysqli_free_result($result);
            } else{
                echo '<div class="alert alert-danger"><em>Registros não encontrados.</em></div>';
            }
        } else{
            echo 'Oops! Something went wrong. Please try again later.';
        }

        // Close connection
        if (is_resource($link) && get_resource_type($link)==='mysql link'){
            mysqli_close($link);
        }
    }
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Titulo -->
    <title>Nuasp Inicio</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/LogoMiniatura/Ativo 25.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--Importando Script Jquery-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
        $(function() {
            $("#Header").load("Header.html");
            $("#Footer").load("Footer.html");
        });

        function successCadastro() {
            Swal.fire(
                'Cadastro',
                'realizado com sucesso',
                'success'
            )
        };
    </script>

    <?php
    if (isset($_GET["response"])) {
        if ($_GET["response"] == "Sucesso") {
            //echo "<script>successCadastro();</script>";
            echo "<script>alert('Sucesso');</script>";
        }
    }
    ?>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- começo da Header -->
    <header class="header-area">
        <!-- Search Form -->
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="robertoNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.php"><img style="width: 156px;" src="./img/core-img//LogoCompleta/LogoPadrao.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li><a href="#">Administração</a>
                                        <ul class="dropdown">
                                            <li><a href="./listagemAlunos.php">- Alunos</a></li>
                                            <li><a href="./listagemDividas.php">- Divídas</a></li>
                                            <li><a href="./listagemFuncionarios.php">- Funcionários</a></li>
                                            <li><a href="./listagemInstituicoes.php">- Instituições</a></li>
                                            <li><a href="./listagemTipoPagamentos.php">- Tipos de Pagamento</a></li>
                                        </ul>
                                    
                                </ul>

                                <!-- Book Now -->
                                <div class="book-now-btn ml-3 ml-lg-5">
                                    <a href="index.php">Sair <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Fim da Header -->


    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/4.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Cadastro de Dívidas</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Dívidas</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Listagem de Dívidas</li>
                                <li class="breadcrumb-item active" aria-current="page">Cadastro de Dívidas</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Cadastro de Dívidas</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-group">
                            <label>Numero de Parcelas</label>
                            <input type="text" name="numeroParcelas" class="form-control <?php echo (!empty($numeroParcelas_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $numeroParcelas; ?>">
                            <span class="invalid-feedback"><?php echo $numeroParcelas_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Valor Total</label>
                            <input type="text" name="valorTotal" class="form-control <?php echo (!empty($valorTotal_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $valorTotal; ?>">
                            <span class="invalid-feedback"><?php echo $valorTotal_err;?></span>
                        </div>

                        <div class='form-group'>
                            <label>Aluno</label>
                            <select name='alunoId' class='form-control <?php echo (!empty($alunoId_err)) ? 'is-invalid' : ''; ?>'>
                                <?php 
                                    for ($i = 0; $i < count($alunosSelectId); $i++) {
                                        echo '<option value="' . htmlspecialchars($alunosSelectId[$i]) . '">' 
                                            . htmlspecialchars($alunosSelectNome[$i]) 
                                            . '</option>';
                                    }
                                ?>
                            </select>
                            <span class='invalid-feedback'><?php echo $alunoId_err;?></span>
                        </div>
                        <br><br>
                        <div class='form-group'>
                            <label>Instituição</label>
                            <select name='instituicaoId' class='form-control <?php echo (!empty($instituicaoId_err)) ? 'is-invalid' : ''; ?>'>
                                <?php 
                                    for ($i = 0; $i < count($instituicoesSelectId); $i++) {
                                        echo '<option value="' . htmlspecialchars($instituicoesSelectId[$i]) . '">' 
                                            . htmlspecialchars($instituicoesSelectNome[$i]) 
                                            . '</option>';
                                    }
                                ?>
                            </select>
                            <span class='invalid-feedback'><?php echo $instituicaoId_err;?></span>
                        </div>
                        <br><br>
                        <div class='form-group'>
                            <label>Tipo de Pagamento</label>
                            <select name='tipoPagamentoId' class='form-control <?php echo (!empty($tipoPagamentoId_err)) ? 'is-invalid' : ''; ?>'>
                                <?php 
                                    for ($i = 0; $i < count($tiposPagamentoSelectId); $i++) {
                                        echo '<option value="' . htmlspecialchars($tiposPagamentoSelectId[$i]) . '">' 
                                            . htmlspecialchars($tiposPagamentoSelectNome[$i]) 
                                            . '</option>';
                                    }
                                ?>
                            </select>
                            <span class='invalid-feedback'><?php echo $tipoPagamentoId_err;?></span>
                        </div>
                        <br><br>
                        <input type="submit" class="btn btn-primary" value="Cadastrar">
                        <a href="listagemDividas.php" class="btn btn-secondary ml-2">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    <br>

    <!-- Footer Area Start -->
    <footer class="footer-area section-padding-80-0">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row align-items-baseline justify-content-between">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-80">
                            <div class="row">
                                <span style="width: 10%;" class="col-3"><img src="img/core-img/icon-3.png" alt=""></span>
                                <span class="col-9" data-img-url="img/img-core/icon-3.png">Whatsapp<br> (19) 99593-7087</span>
                            </div>
                            <div class="row">
                                <span style="width: 10%;" class="col-3"><img src="img/core-img/icon-2.png" alt=""></span>
                                <span class="col-9" data-img-url="img/img-core/icon-3.png">Telefone<br> (19) 99593-7087</span>
                            </div>
                            <div class="row">
                                <span style="width: 10%;" class="col-3"><img src="img/core-img/icon-4.png" alt=""></span>
                                <span class="col-9" data-img-url="img/img-core/icon-3.png">E-mail<br>ma.santos@nuasp.org.br</span>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-80">
                            <!-- Footer Logo -->
                            <br>
                            <a href="#" class="footer-logo"><img style="width: 220px;" src="img/core-img/LogoCompleta/Ativo 3.png" alt=""></a>
                        </div>
                    </div>

                    <!-- Single Footer Widget Area -->
                    <div class="col-12 col-sm-4 col-lg-2">
                        <div class="single-footer-widget mb-80">
                            <!-- Widget Title -->
                            <h5 class="widget-title">Links</h5>

                            <!-- Footer Nav -->
                            <ul class="footer-nav">
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Sobre Nós</a></li>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Negociar</a></li>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Entrar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="container">
            <div class="copywrite-content">
                <div class="text-center col-12 copywrite-text">
                    <p>Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> Todos os direitos reservados |
                        NUASP</a>
                    </p>
                </div>
            </div>
        </div>
        </div>
    </footer>
    <!-- Footer Area End -->
    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="js/roberto.bundle.js"></script>
    <!-- Active -->
    <script src="js/default-assets/active.js"></script>
    <!-- Chat -->
    <script src="//code-sa1.jivosite.com/widget/mu3gyOPnYJ" async></script>
</body>

</html>