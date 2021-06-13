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
        $(function(){
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
        if (isset($_GET["response"])){
            if($_GET["response"] == "Sucesso"){
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

    <!-- Inicio Modal de Login -->
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Acesso ao sistema</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <input type="email" id="defaultForm-email" class="form-control validate">
                        <label for="defaultForm-email">E-mail</label>
                    </div>

                    <div class="md-form mb-4">
                        <input type="password" id="defaultForm-pass" class="form-control validate">
                        <label for="defaultForm-pass">Senha</label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn roberto-btn btn-3">Entrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal de Login -->

    <!-- Inicio Modal de Cadastro de Instituição -->
    <div class="modal fade" id="modalCadastroInst" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Cadastrar instituição</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <section class="get-in-touch">
                        <form role="form" action="php/nuasp/instituicao/create.php" method="post">
                            <div class="row">
                                <div class="form-group col-12">
                                    <input id="nomeInst" type="text" class="form-control validate" placeholder="Nome">
                                </div>
                                <div class="form-group col-12">
                                    <input id="cnpjInst" type="text" class="form-control validate" placeholder="cnpj">
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn roberto-btn btn-3">Entrar</button>
                            </div>
                        </form>
                    </section>
                </div>

            </div>
        </div>
    </div>
    <!-- Fim Modal de Cadastro de Instituição -->


    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/4.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Cadastro de Aluno</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Alunos</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cadastrar Aluno</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Blog Area Start -->
    <section class="roberto-blog-area section-padding-100-0">
        <div class="container">
            <section class="get-in-touch">
                <form role="form" action="php/nuasp/aluno/create.php" method="post">
                    <div class="row">
                        <div class="form-group float-label-control col-md-6 col-sm-12">
                            <input id="nome" name="nome" type="text" class="form-control" placeholder="Nome">
                        </div>
                        <div class="form-group float-label-control col-md-6 col-sm-12">
                            <input id="sobrenome" name="sobrenome" type="text" class="form-control" placeholder="Sobrenome">
                        </div>
                        <div class="form-group float-label-control col-md-2 col-sm-2">
                            <input id="ddd" name="ddd" type="text" class="form-control" placeholder="DDD">
                        </div>
                        <div class="form-group float-label-control col-md-4 col-sm-10">
                            <input id="telefone" name="telefone" type="text" class="form-control" placeholder="Telefone">
                        </div>
                        <div class="form-group float-label-control col-md-3 col-sm-12">
                            <input id="cpf" name="cpf" type="text" class="form-control" placeholder="CPF">
                        </div>
                        <div class="form-group float-label-control col-md-3 col-sm-12">
                            <input id="dataNasc" name="dataNasc" type="date" class="form-control" placeholder="">
                        </div>
                        <div class="form-group float-label-control col-md-6 col-sm-12">
                            <input id="email" name="email" type="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group float-label-control col-md-6 col-sm-12">
                            <input id="senha" name="senha" type="password" class="form-control" placeholder="Senha">
                        </div>
                        <div class="text-center form-group float-label-control col-md-12 col-sm-12">
                          <button class="roberto-btn btn-3" type="submit">Cadastrar</button>
                        </div>
                    </div>
                    <!-- <a href="#" class="roberto-btn btn-3" data-animation="fadeInUp" data-delay="800ms" type="submit">Cadastrar</a> -->
                </form><br><br><br><br><br>
             </section>           
        </div>
    </section>
    <!-- Blog Area End -->

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
                        <a href="#" class="footer-logo"><img style="width: 220px;"
                                src="img/core-img/LogoCompleta/Ativo 3.png" alt=""></a>
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
                    <script>document.write(new Date().getFullYear());</script> Todos os direitos reservados |
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