<?php
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Include config file
        require_once "config.php";
        
        // Prepare a select statement
        $sql = "SELECT * FROM TipoPagamento WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = trim($_GET["id"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
        
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $nome = $row["nome"];
                } else{
                    // URL doesn't contain valid id parameter. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    } else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
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
                                    <li><a href="#">Vamos Negociar</a>
                                        <ul class="dropdown">
                                            <li><a href="https://api.whatsapp.com/send?phone=${encodeURIComponent(5519995937087)}&text=Olá, quero negociar!">- Por Whatsapp</a></li>
                                            <li><a href="tel:551995937087">- Por Ligação</a></li>
                                            <li><a href="./ListagemBoletos.php">- 2ª via Boleto</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="./contato.php">Contato</a></li>
                                    <li><a href="./about.php">Sobre</a></li>
                                </ul>

                                <!-- Book Now -->
                                <div class="book-now-btn ml-3 ml-lg-5">
                                    <a href="#">Sair</a>
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
                        <h2 class="page-title">Consultar Tipos de Pagamento</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Tipos de Pagamento</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Listagem de Tipos de Pagamento</li>
                                <li class="breadcrumb-item active" aria-current="page">Consultar Tipos de Pagamento</li>
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
                    <h1 class="mt-5 mb-3">Tipo de Pagamento: <?php echo $row["nome"]; ?></h1>
                    <div class="form-group">
                        <label>Nome</label>
                        <p><b><?php echo $row["nome"]; ?></b></p>
                    </div>
                    <p><a href="listagemTipoPagamentos.php" class="btn btn-primary">Back</a></p>
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