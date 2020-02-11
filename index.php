<?php
session_start();
?>

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

    <title> Observatório Antares </title>

    <script src="js/jquery-latest.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src='./calendario/core/main.js'></script>
    <script src='./calendario/daygrid/main.js'></script>

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
            //if ($(document).scrollTop() > 580) {
                //$("nav").removeClass("nav_grande").addClass("nav_small");
                //$("#observatorio_nav").html("Observatório Antares");
            //}
            if ($(document).scrollTop() < 580) {
                $("nav").removeClass("nav_small").addClass("nav_grande");
                $("nav").removeClass("nav_cor").addClass("nav_transparente");
                $("li a.nav-link").addClass("branco");
                //$("#observatorio_nav").html("Observatório Astronômico Antares");
                $("#observatorio_nav").html("Observatório Antares");
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

</head>

<body style="background-color: #f5f5f5;" id="home">
    <!-- Navegacao -->
    <header class="home">

    	<?php        
	        require_once("navbar.php");	        
    	?>

    </header>        		

    <?php	    					
        //require_once("msg.php");
        require_once("inicio-espaco.php");       
        require_once("acesso.php");
        //require_once("bootstrap-login.php");
        require_once("agendamento.php");
        require_once("sobre.php");
        require_once("contato.php");
    ?>                       

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