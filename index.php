<!doctype html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="sortcut icon" href="img/antares.png" type=".png">
    <link href="css/adm.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="./css/login-index.css" rel="stylesheet">
    <link href='./calendario/core/main.css' rel='stylesheet'>
    <link href='./calendario/daygrid/main.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Jomolhari&display=swap" rel="stylesheet">

    <title>Observatório Antares</title>

    <script src="js/jquery-latest.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src='./calendario/core/main.js'></script>
    <script src='./calendario/daygrid/main.js'></script>
    <?php
        session_start(); 
    ?>
    <script>
        new WOW().init();
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendario');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid'],
                defaultView: 'dayGridMonth',
                locale: 'pt-br',
                buttonText: {
                    today: "Hoje",
                    month: "Mês",
                    week: "Semana",
                    day: "Dia"
                },

            });

            calendar.setOption('locale', 'pt-br');
            calendar.render();
        });
    </script>
    <script type="text/javascript">
        /*var calendar = $('#calendario').fullCalendar({
                    ignoreTimezone: false,
                    monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                    titleFormat: {
                        month: 'MMMM yyyy',
                        week: "d[ MMMM][ yyyy]{ - d MMMM yyyy}",
                        day: 'dddd, d MMMM yyyy'
                    },
                    columnFormat: {
                        month: 'ddd',
                        week: 'ddd d',
                        day: ''
                    },
                    axisFormat: 'H:mm',
                    timeFormat: {
                        '': 'H:mm',
                        agenda: 'H:mm{ - H:mm}'
                    },
                    buttonText: {
                        prev: "&nbsp;&#9668;&nbsp;",
                        next: "&nbsp;&#9658;&nbsp;",
                        prevYear: "&nbsp;&lt;&lt;&nbsp;",
                        nextYear: "&nbsp;&gt;&gt;&nbsp;",
                        today: "Hoje",
                        month: "Mês",
                        week: "Semana",
                        day: "Dia"
                    }
                }); */
    </script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,header').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).on("scroll", function() {
            if ($(document).scrollTop() > 580) {
                $("nav").removeClass("nav_grande").addClass("nav_small");
                $("#observatorio_nav").html("Observatório Antares");
            }
            if ($(document).scrollTop() < 580) {
                $("nav").removeClass("nav_small").addClass("nav_grande");
                $("nav").removeClass("nav_cor").addClass("nav_transparente");
                $("li a.nav-link").addClass("branco");
                $("#observatorio_nav").html("Observatório Astronômico Antares");
            }
            if ($(document).scrollTop() > 15) {
                $("li a").removeClass("branco");
                $("nav").removeClass("nav_transparente").addClass("nav_cor");
            }
        });
    </script>

    <script type="text/javascript">
        $(document).on('scroll', function() {
            if ($(this).scrollTop() > $('header.home').position().top && $(this).scrollTop() < ($('#sobre').position().top) - 50) {
                $("a.home").addClass("branco");
            }
            if ($(this).scrollTop() > ($('#sobre').position().top - 50) && $(this).scrollTop() < ($('#agendamento').position().top) - 50) {
                $("a.sobre").addClass("branco");
            }
            if ($(this).scrollTop() > ($('#agendamento').position().top - 50) && $(this).scrollTop() < ($('#contato').position().top) - 80) {
                $("a.agendamento").addClass("branco");
            }
            if ($(this).scrollTop() > ($('#contato').position().top - 80)) {
                $("a.contato2").addClass("branco");
            }
        })
    </script>

    <script type="text/javascript">
        $(document).on('click', "#btn_login", function fazerLogin() {
            var dados = $("#form_login").serialize();
            console.log("entrou");
            $.ajax({
                type: "post",
                url: "./php/login.php",
                data: dados,
                beforeSend: function() {
                    $("#btn_login").html("Validando...");
                },
                success: function(data) {
                    console.log(data);
                    if (data == "sucesso") {
                        window.location.href = "home_adm.php";
                    } else {
                        $("#invalido").css("display", "inherit");
                        $("#btn_login").html("Entrar");
                    }
                }
            });
        });
    </script>

</head>

<body style="background-color: #f5f5f5;" id="home">
    <!-- Navegacao -->
    <header class="home">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark nav_grande nav_transparente">
            <div class="container">
                <a class="navbar-brand h1 mb-0 mr-5 " id="observatorio_nav" href="index.php" style="font-family: 'Jomolhari' ">
                    Observatório Astronômico Antares
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto ">
                        <li class="nav-item mr-2 ">
                            <a class="nav-link scroll branco home" href="#home"> Home </a>
                        </li>
                        <li class="nav-item  mr-2 ">
                            <a class="nav-link scroll branco sobre" href="#sobre"> Sobre </a>
                        </li>
                        <li class="nav-item  mr-2 ">
                            <a class="nav-link scroll branco agendamento" href="#agendamento"> Agendamento </a>
                        </li>
                        <li class="nav-item  mr-2 ">
                            <a class="nav-link scroll branco contato2" href="#contato"> Contato </a>
                        </li>
                        <li class="nav-item  mr-2 ">
                            <a class="nav-link branco " href="#"> - </a>
                        </li>
                        <?php if (!isset($_SESSION['logado'])) { ?>
                            <li class="nav-item  mr-2 ">
                                <a class="nav-link branco" href="#" data-toggle="modal" data-target="#login"> Efetuar Login  </a>
                            </li>
                            <?php } elseif ($_SESSION['permissao'] == 1 || $_SESSION['permissao'] == 2 ) { ?>
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="img-profile rounded-circle" src="img/logado.jpeg">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="home_adm.php">
                                            <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i> Area do adm
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item " href="#" data-toggle="modal" data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Sair
                                        </a>
                                    </div>
                                </li>
                                <?php } ?>
                    </ul>

                    <?php if(isset($_SESSION['nome'])){ ?>
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="img-profile rounded-circle" style="height: 32px; width: 32px;" src="img/antares.png">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="home_adm.php">
                                        <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i> Area do adm
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Sair
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <?php } ?>
                </div>
            </div>
        </nav>
    </header>

    <div class="fluid-container" id="">

        <div id="" class="text-center" style="color:#fff">
            <div id="ceu" class="img_fundo" style="padding-bottom: 6%; padding-top: 7%">
                <img src="img/antares2.png" class="img-fluid overlay logo wow zoomIn" alt="" data-wow-delay="0.2s" style="margin-top: 4%">
                <h1 style="padding-top: 1.5%" class="wow slideInLeft" data-wow-delay="0.3s">BEM VINDO AO <strong><span class="color">OBSERVATÓRIO ANTARES</span> </strong> </h1>
                <h3 style="padding-top: 1.5%" class=" wow slideInRight" data-wow-delay="0.5s">Contribuindo para o desenvolvimento, formação acadêmica e científica dos jovens baianos</h3>
                <p class="lead wow slideInUp" style="padding-top: 1.5%" data-wow-delay="0.2s">
                    <strong>Universidade Estadual de Feira de Santana </strong>
                    <br>
                    <strong>Departamento de Física </strong>
                </p>
                <h4 class="wow slideInUp" style="font-size: 1.5rem;">&darr;</h4>
            </div>

        </div>
    </div>

    <div class="container" id="sobre" style="padding-top: 6%;padding-bottom: 2%">
        <div class="row ">
            <div class="col-md-4">
                <img src="img/antares.png" class="img-fluid wow flipInY " data-wow-delay="0.6s" style="width: 100%; padding-top: 27%">
            </div>
            <div class="col-md-8">
                <div class="section-title">
                    <h4 class="topico wow bounceInRight text-center">A INSTITUIÇÃO</h4>
                </div>
                <div class="text-justify">
                    <p class="sobre_texto cinza">
                        O Observatório Astronômico Antares foi inaugurado em 25 de Setembro de 1971 e incorporado à UEFS em 27 de Março de 1992 como uma Unidade de Desenvolvimento Organizacional, passando a realizar e a colaborarar com os cursos de graduação e de pós-graduação da UEFS em atividades de ensino, pesquisa e extensão universitária.
                    </p>
                    <p class="sobre_texto cinza">
                        Em 2006, como resultado desse dinâmica acadêmica, o Observatório Astronômico Antares foi incluído na pesquisa nacional sobre a “Percepção Pública da Ciência e Tecnologia”, produzida pelo então Departamento de Popularização e Difusão da Ciência e Tecnologia, órgão da Secretaria de Ciência e Tecnologia para a Inclusão Social do Ministério da Ciência e Tecnologia. No relatório técnico elaborado, alcançamos 2% de participação dentre as diversas instituições que se dedicam a fazer pesquisa cientifica em nosso país, segundo o levantamento do interesse, grau de informação, atitudes, visões e conhecimento que os brasileiros têm da Ciência e Tecnologia.
                    </p>
                    <p class="sobre_texto cinza">
                        Este resultado ratifica o esforço e o compromisso que vem sendo realizado ao longo do tempo pela equipe qualificada do Observatório Astronômico Antares (professores e servidores técnicos-administrativos), visando consolidar o mesmo como uma reconhecida e conceituada instituição de ensino, pesquisa e extensão universitária no país.
                    </p>
                    <p class="sobre_texto cinza">
                        Em 24 de Setembro de 2009, como fruto desse crescimento institucional, implantamos através do projeto “Eras e Épocas”, o Museu Antares de Ciência e Tecnologia , na qual objetiva através de 10 sub-projetos temáticos, contribuir para a melhoria do ensino de ciências nas escolas e a difusão científica e tecnológica para a população em geral.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div id="agendamento">
        <div class="fluid-container img_fundo" id="observatorio" style="padding-top: 5%;padding-bottom: 4%">
            <div class="container" id="" style="margin-top: 0;margin-bottom: 0;padding-top: 2%;padding-bottom: 2%">
                <div class="row" id="">
                    <div class="col-md-6">
                        <h3 class="topico branco wow bounceInLeft ">AGENDAMENTO</h3>
                    </div>
                    <div class="col-md-6">
                        <div id="calendario" class="wow slideInRight" data-wow-delay="0.3s"></div>
                        <button type="button" class="btn btn-block btn_mensagem wow slideInRight" data-wow-delay="0.3s" style="color: #fff" data-toggle="modal" data-target="#login">Agendar um horario</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="contato" style="padding-top: 4%; padding-bottom: 2%">

        <div class="row " id="">
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <h3 class="topico ">CONTATO</h3>
                <br>
                <div class="row ">
                    <div class="col-md-1">
                        <i class="fas fa-map-marker-alt fa-2x "></i>
                    </div>
                    <div class="col-md-10">
                        <h4 class="contato">ENDEREÇO:</h4>
                    </div>
                </div>
                <p class="ml-4 info_contato cinza">R. Barra, 925 - Jardim Cruzeiro,
                    <br> Feira de Santana - BA, 44015-430</p>
                <div class="row ">
                    <div class="col-md-1">
                        <i class="fas fa-phone fa-2x"></i>
                    </div>
                    <div class="col-md-10">
                        <h4 class="contato">TELEFONE:</h4>
                    </div>
                </div>
                <p class="ml-4 info_contato cinza ">(75) 3624-1921</p>
                <div class="row ">
                    <div class="col-md-1">
                        <i class="fas fa-envelope fa-2x"></i>
                    </div>
                    <div class="col-md-10">
                        <h4 class="contato">EMAIL:</h4>
                    </div>
                </div>
                <p class="cinza"></p>
            </div>
            <div class="col-md-6">
                <form method="post" action="#">
                    <div class="row wow slideInRight" data-wow-delay="0.2s">
                        <label for="nome" class="form_contato">Nome Completo:</label>
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite seu nome" value="<?php if (isset($_SESSION['nome'])){ echo $_SESSION['nome']; } ?>" required="">
                        <label for="email" class="form_contato" style="margin-top: 1%">E-mail:</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Digite seu e-mail" value="<?php if (isset($_SESSION['email'])){ echo $_SESSION['email']; } ?>" required="">
                        <label for="assunto" class="form_contato" style="margin-top: 1%">Assunto:</label>
                        <input type="text" id="assunto" name="assunto" class="form-control" placeholder="Digite o assunto " required="">
                        <label for="mensagem" class="form_contato" style="margin-top: 1%">Mensagem:</label>
                        <textarea name="mensagem" id="mensagem" class="lg-textarea form-control form_contato" rows="6" required=""></textarea>
                        <button type="submit" class="btn btn-block btn_mensagem ">ENVIAR MENSAGEM</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tem certeza que deseja sair?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="php/logout.php">Sair</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade login" id="login">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="content">
                            <div>
                                <img src="img/antares_modal.png" alt="icone" class="icone_antares" style="margin-top: -5px;">
                            </div>
                            <div class="error"></div>
                            <div class="form loginBox">
                                <form method="" action="" accept-charset="UTF-8" id="form_login">
                                    <span style="display: none; color: red" class="text-center mb-2" id="invalido">Usuário/senha inválidos</span>
                                    <input id="email" class="form-control" type="text" placeholder="Email" name="login">
                                    <input id="senha_login" class="form-control" type="password" placeholder="Senha" name="senha_login">
                                    <input class="btn btn-primary btn-block" type="button" value="Entrar" id="btn_login">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="forgot login-footer">
                        <span>Deseja <a href="#" data-toggle="modal" data-target="#cadastro" data-dismiss="modal" >criar uma conta</a>?</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cadastro">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cadastro</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="content">
                            <div class="form loginBox">
                                <form method="" action="" accept-charset="UTF-8" id="form_cadastro">
                                    <div class="form-row">
                                        <div class="col">
                                            <label>Nome da escola</label>
                                            <input type="text" class="form-control" name="escola" placeholder="Nome da escola">
                                        </div>
                                    </div>
                                    <div class="form-row mt-3 mb-2">
                                        <div class="col-5">
                                            <label>Endereço</label>
                                            <input type="text" class="form-control" name="endereco" placeholder="Endereço">
                                        </div>
                                        <div class="col-3">
                                            <label>Número</label>
                                            <input type="text" class="form-control" name="endereco" placeholder="Número">
                                        </div>
                                        <div class="col-4">
                                            <label>Complemento</label>
                                            <input type="text" class="form-control" name="endereco" placeholder="Complemento">
                                        </div>
                                    </div>
                                    <div class="form-row mt-3 mb-2">
                                        <div class="col">
                                            <label>Telefone 1</label>
                                            <input type="text" class="form-control" name="tel1" placeholder="Telefone">
                                        </div>
                                        <div class="col">
                                            <label>Telefone 2</label>
                                            <input type="text" class="form-control" name="tel2" placeholder="Telefone">
                                        </div>
                                        <div class="col">
                                            <label>Celular</label>
                                            <input type="text" class="form-control" name="cel" placeholder="Celular">
                                        </div>
                                    </div>
                                    <div class="form-row mt-3 mb-2">
                                        <div class="col">
                                            <label>Escola municipal</label>
                                            <input type="radio" class="form-control radio" name="tipo_escola" value="municipal">
                                        </div>
                                        <div class="col">
                                            <label>Escola estadual</label>
                                            <input type="radio" class="form-control radio" name="tipo_escola" value="estadual">
                                        </div>
                                        <div class="col">
                                            <label>Escola particular</label>
                                            <input type="radio" class="form-control radio" name="tipo_escola" value="particular">
                                        </div>
                                        <div class="col">
                                            <label>Universidade</label>
                                            <input type="radio" class="form-control radio" name="tipo_escola" value="universidade">
                                        </div>
                                    </div>
                                    <div class="form-row mt-3 mb-2">
                                        <div class="col">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email_escola" placeholder="Email">
                                        </div>
                                        <div class="col">
                                            <label>Senha</label>
                                            <input type="password" class="form-control" name="senha_cadastro" placeholder="Senha">
                                        </div>
                                        <div class="col">
                                            <label>Repita a senha</label>
                                            <input type="password" class="form-control" name="senha_rep_cadastro" placeholder="Repita a senha">
                                        </div>
                                    </div>
                                    <input class="btn btn-primary btn-block mt-3 mb-0" type="button" value="Entrar" onclick="cadastro()">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="forgot login-footer">
                        <span>Deseja <a href="#" data-toggle="modal" data-target="#login" data-dismiss="modal">fazer login</a>?</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<footer class="navbar navbar-fixed-bottom mb-0 mt-3" style="background-color: #006A9D">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="text-left text-light small" style="margin-bottom:0">Todos os direitos reservados. COPYRIGHT &copy; 2019</p>
            </div>
        </div>
    </div>

</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>