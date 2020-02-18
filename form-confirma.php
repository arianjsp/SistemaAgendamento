
<?php

session_start();

$id_agendamento = $_GET['id_agendamento'];
$data = $_GET['data'];
$hora = $_GET['hora'];
$evento = $_GET['evento']; // ID evento
$title = $_GET['title']; // titulo evento
$escola = $_GET['escola']; // ID ESCOLA
$nome = $_GET['nome']; // NOME da escola
$turma = $_GET['turma']; // ID turma
$nivel_ensino = $_GET['nivel_ensino']; // nive de ensino
$serie = $_GET['serie']; // serie
$nome_turma = $_GET['nome_turma']; // nome da turma

$_SESSION['id_agendamento'] = $id_agendamento;
$_SESSION['data'] = $data;
$_SESSION['hora'] = $hora;
$_SESSION['escola'] = $escola;
$_SESSION['turma'] = $turma;
$_SESSION['evento'] = $evento;

$frase = "";

require_once("escola/compara-to-string.php");
traduzDadosTurma (); // FUNÇÃO DEFINIDA NO ARQUIVO INCLUIDO ACIMA

//include_once("../db/conexao.php");      
include_once("db/conexao.php");      

if (isset($_SESSION['msg']))
{
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="../css/index.css" rel="stylesheet">  <!-- PARA CEU DE TELA INTEIRA NO FUNDO -->
        <link href="../css/meu-css.css" rel="stylesheet">  <!-- PARA AUMENTAR TAMNANHO DO RADIO BUTTON -->
        <title> Confirmar Visita</title>        
        <link href='../css/bootstrap.min.css' rel='stylesheet'>
        <link href='../css/personalizado.css' rel='stylesheet' />
        <script src='../js/jquery.min.js'></script>
        <script src='../js/bootstrap.min.js'></script>
        <script src='../js/moment.min.js'></script>
        <script src='../locale/pt-br.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style>
            .form-group{
                padding: 10px;
            }
        </style>
    </head>
    <body>                
        <div class="fluid-container" id="">
            <div id="" class="text-center" style="color:#000">
                <div id="ceu" class="img_fundo" style="padding-bottom: 28.5%; padding-top: 0%">
                    <font color="white">
                        <a href="../index.php"> HOME </a>        
                        <h1>Confirmação da Visita</h1>
                    </font>
                    <form id="form-confirma-visita" method="POST" action="confirma.php">
                        <font color="white">
                            <?php
                            //echo "DADOS DO SEU AGENDAMENTO: ";
                            echo "Olá! ". $nome . " você fez um agendamento para o evento " . $title . " no dia " . $data . " as " . $hora . " com a sua turma de " . $frase . $nome_turma;
                            ?>
                            <h3> Marque a resposta que melhor se adequa a tua situação: </h3>                            
                            <!-- Diga-nos se você e sua turma ainda pretendem fazer-nos uma visita -->
                            <div>
                                <input type="radio" id="sim" name="resposta" value="1" class="radio-grande" required=""> Sim, nós iremos! 
                            </div>
                            <div>
                                <input type="radio" id="nao" name="resposta" value="0" class="radio-grande" required=""> Não podemos ir. 
                            </div>
                        </font>
                        <div class="form-group">                            
                            <input type="submit" value="RESPONDER">                
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </body>
</html>