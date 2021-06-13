<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Titulo -->
    <title>Entre em contato - Nuasp</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/LogoMiniatura/Ativo 25.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

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
                                <a data-toggle="modal" data-target="#modalLoginForm" href="#">Entrar <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
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
    <div class="breadcrumb-area contato-breadcrumb bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center mt-100">
                        <h2 class="page-title">Fale Conosco por nossos canais</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contato</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Google Maps & contato Info Area Start -->
    <section class="google-maps-contato-info">
        <div class="container-fluid">
            <div class="google-maps-contato-content">
                <div class="row">
                    <!-- Single contato Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contato-info">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <h4>Telefone</h4>
                            <p>(19) 9593-7087</p>
                        </div>
                    </div>
                    <!-- Single contato Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contato-info">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <h4>Endereço</h4>
                            <p>Rua Pastor Hugo Gegembauer <br> nº265, Parque Ortolândia <br> Hortolândia - SP, 13184-010</p>
                        </div>
                    </div>
                    <!-- Single contato Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contato-info">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <h4>Aberto</h4>
                            <p>08:0AM até 20:00PM</p>
                        </div>
                    </div>
                    <!-- Single contato Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contato-info">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <h4>Email</h4>
                            <p>ma.santos@nuasp.org.br</p>
                        </div>
                    </div>
                </div>

                <!-- Google Maps -->
                <div class="google-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d459.498034657919!2d-47.2270033!3d-22.8770392!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfe92e21c82b0104e!2sAcademia%20UNASP-HT!5e0!3m2!1spt-BR!2sbr!4v1621398534877!5m2!1spt-BR!2sbr" allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- Google Maps & contato Info Area End -->

    <!-- contato Form Area Start -->
    <div class="roberto-contato-form-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <h6>Contato</h6>
                        <h2>Nos deixe uma mensagem</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Form -->
                    <div class="roberto-contato-form">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="text" name="message-name" class="form-control mb-30" placeholder="Nome">
                                </div>
                                <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="email" name="message-email" class="form-control mb-30" placeholder="Email">
                                </div>
                                <div class="col-12 wow fadeInUp" data-wow-delay="100ms">
                                    <textarea name="message" class="form-control mb-30" placeholder="Digite sua mensagem"></textarea>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
                                    <button type="submit" class="btn roberto-btn mt-15">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contato Form Area End -->


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
    <script src="//code-sa1.jivosite.com/widget/dyTFLPdSAj" async></script>


</body>

</html>