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
                                    <?php 
                                        if(trim($_GET["type"]) == "f"){
                                            echo '<li><a href="#">Administração</a>';
                                                echo '<ul class="dropdown">';
                                                    echo '<li><a href="./listagemAlunos.php">- Alunos</a></li>';
                                                    echo '<li><a href="./listagemDividas.php">- Divídas</a></li>';
                                                    echo '<li><a href="./listagemFuncionarios.php">- Funcionários</a></li>';
                                                    echo '<li><a href="./listagemInstituicoes.php">- Instituições</a></li>';
                                                    echo '<li><a href="./listagemTipoPagamentos.php">- Tipos de Pagamento</a></li>';
                                                echo '</ul>';
                                            echo '</li>';
                                        }
                                    ?>
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
                        <h2 class="page-title">Listagem de Parcelas</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Parcelas</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Listagem de Parcelas</li>
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
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Parcelas</h2>
                    </div>
                    <?php

                        if(isset($_GET["id"]) && !empty(trim($_GET["id"])) && isset($_GET["type"]) && !empty(trim($_GET["type"]))){
                            // Include config file
                            require_once "config.php";
                            
                            // Attempt select query execution
                            $sql = "";
                            if(trim($_GET["type"]) == "f"){
                                $sql = "SELECT p.*, a.cpf alunoCpf, a.nome alunoNome FROM Parcelas p
                                        INNER JOIN Divida d ON d.Id = p.dividaId
                                        INNER JOIN Aluno a ON a.Id = d.alunoId
                                        WHERE dividaId = " . $_GET["id"] . " AND p.isPaga = 0 ORDER BY p.Id;";
                            } else {
                                $sql = "SELECT p.*, a.cpf alunoCpf, a.nome alunoNome FROM Parcelas p
                                        INNER JOIN Divida d ON d.Id = p.dividaId
                                        INNER JOIN Aluno a ON a.Id = d.alunoId
                                        WHERE d.alunoId = " . $_GET["id"] . " AND p.isPaga = 0 ORDER BY p.Id;";
                            }

                            if($result = mysqli_query($link, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    echo '<table class="table table-bordered table-striped">';
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>#</th>";
                                                echo "<th>Número da Dívida</th>";
                                                echo "<th>Número da Parcela</th>";
                                                echo "<th>Data de Vencimento</th>";
                                                echo "<th>Valor da Parcela</th>";
                                                if(trim($_GET["type"]) == "f"){
                                                    echo "<th>Ações</th>";
                                                }
                                                echo "<th>Download Boleto</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<tr>";
                                                echo "<td>" . $row['id'] . "</td>";
                                                echo "<td>" . $row['dividaId'] . "</td>";
                                                echo "<td>" . $row['numeroParcela'] . "</td>";
                                                echo "<td>" . date("d/m/Y", strtotime($row["dataVencimento"])) . "</td>";
                                                echo "<td>" . $row['valorParcela'] . "</td>";
                                                if(trim($_GET["type"]) == "f"){
                                                    echo "<td>";
                                                        echo '<a href="confirmarPagamento.php?id='. $row['id'] .'&dividaId=' . trim($_GET["id"]) . '" class="mr-3" title="Confirmar Pagamento" data-toggle="tooltip"><span class="fa fa-check-circle"></span></a>';
                                                    echo "</td>";
                                                }
                                                echo "<td>";
                                                    echo '<a href="gerarBoleto.php?valor='. $row['valorParcela'] .'&data='. date("d/m/Y", strtotime($row["dataVencimento"])) .'&nome='. $row['alunoNome'] .'&cpf='. $row['alunoCpf'] .'" class="mr-3" title="Consultar Registro" data-toggle="tooltip"><span class="fa fa-download"></span></a>';
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                    echo "</table>";
                                    // Free result set
                                    mysqli_free_result($result);
                                } else{
                                    echo '<div class="alert alert-danger"><em>Registros não encontrados.</em></div>';
                                }
                            } else{
                                echo "Oops! Something went wrong. Please try again later.";
                            }
        
                            // Close connection
                            mysqli_close($link);
                        } else{
                            // URL doesn't contain id parameter. Redirect to error page
                            header("location: error.php");
                            exit();
                        }
                    ?>
                </div>
            </div>        
        </div>
    </div>

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