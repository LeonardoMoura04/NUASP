<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Titulo -->
    <title>Nuasp Inicio</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/LogoMiniatura/Ativo 25.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

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
    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/16.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Financeiro</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">inicio</a></li>
                                <li class="breadcrumb-item active" aria-current="page">2ª via do Boleto</li>
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
            <div class="row">


                <div class="col-md-12">
                    <h4>Boletos</h4>
                    <div class="table-responsive">


                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>

                                <th><input type="checkbox" id="checkall" /></th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th></th>
                            </thead>
                            <tbody>

                                <tr>
                                    <td><input type="checkbox" class="checkthis" /></td>
                                    <td>Mohsin</td>
                                    <td>Irshad</td>
                                    <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
                                    <td>isometric.mohsin@gmail.com</td>
                                    <td>+923335586757</td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Pagar">
                                            <h4>Pago</h3>
                                    </td>
                                </tr>

                                <tr>
                                    <td><input type="checkbox" class="checkthis" /></td>
                                    <td>Mohsin</td>
                                    <td>Irshad</td>
                                    <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
                                    <td>isometric.mohsin@gmail.com</td>
                                    <td>+923335586757</td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Pagar">
                                            <button type="button" class="btn btn-light">Imprimir</button>
                                    </td>
                                </tr>





                            </tbody>

                        </table>

                        <div class="clearfix"></div>
                        <ul class="pagination pull-right">
                            <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                        </ul>

                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control " type="text" placeholder="Mohsin">
                        </div>
                        <div class="form-group">

                            <input class="form-control " type="text" placeholder="Irshad">
                        </div>
                        <div class="form-group">
                            <textarea rows="2" class="form-control"
                                placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>


                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span
                                class="glyphicon glyphicon-ok-sign"></span> Update</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>



        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you
                            sure you want to delete this Record?</div>

                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-success"><span
                                class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> No</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
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
                                <span style="width: 10%;" class="col-3"><img src="img/core-img/icon-3.png"
                                        alt=""></span>
                                <span class="col-9" data-img-url="img/img-core/icon-3.png">Whatsapp<br> (19)
                                    99593-7087</span>
                            </div>
                            <div class="row">
                                <span style="width: 10%;" class="col-3"><img src="img/core-img/icon-2.png"
                                        alt=""></span>
                                <span class="col-9" data-img-url="img/img-core/icon-3.png">Telefone<br> (19)
                                    99593-7087</span>
                            </div>
                            <div class="row">
                                <span style="width: 10%;" class="col-3"><img src="img/core-img/icon-4.png"
                                        alt=""></span>
                                <span class="col-9"
                                    data-img-url="img/img-core/icon-3.png">E-mail<br>ma.santos@nuasp.org.br</span>
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



    <script>
        $(document).ready(function () {
            $("#mytable #checkall").click(function () {
                if ($("#mytable #checkall").is(':checked')) {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", true);
                    });

                } else {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", false);
                    });
                }
            });

            $("[data-toggle=tooltip]").tooltip();
        });

    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
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
    <script src="//code-sa1.jivosite.com/widget/dyTFLPdSAj" async></script>


</body>

</html>