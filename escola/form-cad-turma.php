<?php

session_start();

include_once("../db/conexao.php");      

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
        <title> Cadastrar Turmas</title>        
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
                        <h1>Informe os dados da Turma</h1>
                    </font>
                        
                    <form id="form-info-turma" method="POST" action="form-cad-alunos.php">
                        <font color="white">
                            Nível de Ensino:
                        </font>
                        <select name='nivel_ensino'>
                            <option value='0'>Selecione</option>
                            <option value='1'>Educação Infantil</option>
                            <option value='2'>Ensino Fundamental</option>
                            <option value='3'>Ensino Médio</option>
                        </select>      

                        <font color="white">
                            Série:
                        </font>
                        <select name='series'>
                        </select>

                        <div class="hidden opcoes-s1">
                            <option value='10'>Selecione</option>
                            <option value='11'>N1</option>
                            <option value='12'>N2</option>
                            <option value='13'>N3</option>
                        </div>

                        <div class="hidden opcoes-s2">
                            <option value='20'>Selecione</option>
                            <option value='21'>1º ano</option>
                            <option value='22'>2º ano</option>
                            <option value='23'>3º ano</option>
                            <option value='24'>4º ano</option>
                            <option value='25'>5º ano</option>
                            <option value='26'>6º ano</option>
                            <option value='27'>7º ano</option>
                            <option value='28'>8º ano</option>
                            <option value='29'>9º ano</option>
                        </div>

                        <div class="hidden opcoes-s3">
                            <option value='30'>Selecion</option>
                            <option value='31'>1º ano</option>
                            <option value='32'>2º ano</option>
                            <option value='33'>3º ano</option>
                        </div>
                        
                        <BR>
                        <BR>

                        <font color="white">
                            Nome da Turma:
                        </font>
                        <input type="text" name="nome_turma" maxlength="1" size="35" placeholder="Insira apenas uma letra pra diferenciar">
                        <BR>                                                
                        <!-- <hr></hr> --> <!-- DIVISÃO https://pt.stackoverflow.com/questions/175450/mudar-um-select-baseado-na-sele%C3%A7%C3%A3o-de-outro-select-a-partir-de-dados-no-bd -->
                        <BR>
                        <font color="white">
                            <P >OBS. 1: Se o grupo de alunos for composto por menores de idade, deverá ter no mínimo 4 (quatro) professores ou responsáveis durante a visita. </P>
                            <P>OBS. 2: Serão permitidos no máximo 6 (seis) professores ou responsáveis para cada visita. </P>                                        
                            <H4> Informe os Professores ou Responsáveis pela turma: </H4>                   
                        </font>                        
                        
                        <div id="campos">
                            <font color="white">
                                Nome:
                            </font>
                            <input type="text" name="nomes_prof_resp[]" maxlength="250" size="44" placeholder="Professor/Responsável">                                
                            <div>
                                <font color="white">
                                    <label> Função: </label>
                                    <input type="radio" id="p" name="cargo_funcao[]" value="1" class="radio-grande"> Professor 
                                    <input type="radio" id="r" name="cargo_funcao[]" value="2" class="radio-grande"> Responsável 
                                </font>
                            </div>
                        </div>                        
                        <H4>
                            <div id="demo"></div>
                        </H4>
                        <div class="form-group">
                            <button type="button" id="add-campo"> ADICIONAR OUTRO PROFESSOR/RESPONSÁVEL </button>
                            <input type="submit" value="OK">                
                        </div>
                        <!--  <P>"OBS. 3: Caso a quantidade de Professores / Responsáveis forem menor do que a quantidade de campos, eles podem ficar em branco. " </P> -->
                    </form>
                    </font>
                </div>
            </div>
        </div>

        <script>            
            $(function()
            {

                $('.hidden').hide();
              
                $('select[name=series]').html($('div.opcoes-s1').html());
                

                $('select[name=nivel_ensino]').change(function()
                { 
                    var id = $('select[name=nivel_ensino]').val();

                    $('select[name=series]').empty();
                    
                    $('select[name=series]').html($('div.opcoes-s' + id).html());

                });
                
            });
        </script>

        <script>
            var cont = 1;
            $(document).ready(function ()
            {                
                //https://api.jquery.com/click/
                $('#add-campo').click(function ()
                {
                    if (cont < 6)
                    {
                        cont++;                    
                        //https://api.jquery.com/append/                    
                        $('#campos').append('<BR> <div id="campo' + cont + '"> <div> <font color="white"> Nome: </font> <input type="text" name="nomes_prof_resp[]" maxlength="250" size="44" placeholder="Professor/Responsável"> <button type="button" id="' + cont + '" class="btn-apagar"> remover </button> <div> <font color="white"> <label> Função: </label> <input type="radio" id="p' + cont + '" name="cargo_funcao[]' + cont + '[]" value="1" class="radio-grande"> Professor <input type="radio" id="r' + cont + '" name="cargo_funcao[]' + cont + '[]" value="2" class="radio-grande"> Responsável </font> </div> </div> </div>');
                    }
                    else
                    {
                        document.getElementById("demo").innerHTML = '<font color="red"> são permitidos no máximo 6 (seis) acompanhantes por visita </font>';                        
                    }
                });                

                $('form').on('click', '.btn-apagar', function () 
                {                    
                    if(cont == 6)
                    {
                        document.getElementById("demo").innerHTML = '';
                    }
                    var button_id = $(this).attr("id");
                    $('#campo' + button_id + '').remove();                                        
                    cont--;                    
                });                
            });
        </script>
    </body>
</html>