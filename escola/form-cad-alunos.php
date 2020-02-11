<?php

session_start();

$_SESSION['nivel_ensino'] = $_POST['nivel_ensino'];
$_SESSION['serie'] = $_POST['series'];
$_SESSION['nome_turma'] = $_POST['nome_turma'];
$_SESSION['nomes_prof_resp'] = $_POST['nomes_prof_resp'];
$_SESSION['cargo_funcao'] = $_POST['cargo_funcao'];

?>


<!DOCTYPE HTML>
<html lang="pt-br">  
    <head>  
        <meta charset="utf-8">
        <link href="../css/index.css" rel="stylesheet">  <!-- PARA CEU DE TELA INTEIRA NO FUNDO -->
        <link href="../css/meu-css.css" rel="stylesheet">  <!-- PARA AUMENTAR TAMNANHO DO RADIO BUTTON -->
        <title>Cadastrar Alunos da Turma</title>
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
                <div id="ceu" class="img_fundo" style="padding-bottom: 38.5%; padding-top: 0%">
                    <font color="white">
                        <a href="../index.php"> HOME </a>
                        <h1>Informe os dados dos Alunos</h1>
                    </font>
                    <!-- <span id="msg"></span> -->
                    <form id="form-info-alunos" method="POST" action="proc-cad-turma.php">
                        <div id="campos">
                            <div class="form-group">
                                <font color="white">
                                    <label >Nome: </label>
                                </font>
                                <input type="text" name="nomes_alunos[]" maxlength="250" placeholder="Digite o Nome do Aluno">                    
                                <font color="white">
                                    <label>Data Nascimento: </label>
                                </font>
                                <input type="date" name="data_nascimento_alunos[]" maxlength="10">                    
                            </div>                
                        </div>            
                        <div class="form-group">
                            <button type="button" id="add-campo"> ADICIONAR OUTRO ALUNO </button>
                            <!-- <input type="button" name="CadAulas" id="CadAulas" value="Cadastrar"> -->
                            <input type="submit" name="CadAulas" id="CadAulas" value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                var cont = 1;
                //https://api.jquery.com/click/
                $('#add-campo').click(function () {
                    cont++;
                    //https://api.jquery.com/append/
                    $('#campos').append('<div class="form-group" id="campo' + cont + '"> <font color="white"> <label>Nome: </label> </font> <input type="text" name="nomes_alunos[]" placeholder="Digite o Nome do Aluno"> <font color="white"> <label> Data Nascimento: </label> </font> <input type="date" name="data_nascimento_alunos[]" maxlength="10" size="20"> <button type="button" id="' + cont + '" class="btn-apagar"> remover </button></div>');
                });

                $('form').on('click', '.btn-apagar', function () {
                    var button_id = $(this).attr("id");
                    $('#campo' + button_id + '').remove();
                });                
            });
        </script>
    </body>
</html>