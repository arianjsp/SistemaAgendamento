<?php

session_start();
include_once ("../db/conexao.php");

$nomes_alunos = $_POST["nomes_alunos"];
$data_nascimento_alunos = $_POST["data_nascimento_alunos"];

$nivel = $_SESSION['nivel_ensino'];
$serie = $_SESSION['serie'];
$nome_turma = $_SESSION['nome_turma'];

$nomes_prof_resp = $_SESSION['nomes_prof_resp'];
$cargo_funcao = $_SESSION['cargo_funcao'];

$escola = $_SESSION['usuarioId'];

if(!empty($escola) && !empty($nivel) && !empty($serie) && !empty($nome_turma))
{
    $data_criacao = date("Y-m-d");

    $query = "SELECT COUNT(id) AS ja_fez FROM turmas WHERE (nivel='$nivel' AND serie='$serie' AND nome_turma='$nome_turma')";
    $result_query = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result_query);
    $ja_fez = $row['ja_fez'];

    if ($ja_fez == 0)
    {
        $query = "INSERT INTO turmas (escola, nivel, serie, nome_turma, data_criacao) VALUES ('$escola', '$nivel', '$serie', '$nome_turma', '$data_criacao')";
        $result_query = mysqli_query($conn, $query);
            
        $id_turma = mysqli_insert_id($conn);        

        while (current($nomes_prof_resp))
        {
            
            $prof_resp = current($nomes_prof_resp);
            $c_f = current($cargo_funcao);            

            $query = "SELECT COUNT(id) AS ja_fez FROM prof_resp WHERE (nome='$prof_resp' AND cargo_funcao='$c_f' AND escola='$escola' AND turma='$id_turma')"; //pesquisa se já tem aquele prof_resp na turma
            $result_query = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result_query);
            $ja_fez = $row['ja_fez'];

            if ($ja_fez == 0) // NÃO ISERE O MESMO professor / responsável DUAS VEZES
            {                
                $query = "INSERT INTO prof_resp (nome, cargo_funcao, escola, turma) VALUES ('$prof_resp', '$c_f', '$escola', '$id_turma')";
                $result_query = mysqli_query($conn, $query);
            }            
            next($nomes_prof_resp);
            next($cargo_funcao);
        }

        while (current($nomes_alunos))
        {
            
            $nome = current($nomes_alunos);
            $data_nascimento = current($data_nascimento_alunos);

            $data_sem_barra = array_reverse(explode("/", $data_nascimento));
            $data_sem_barra = implode("-", $data_sem_barra);

            $query = "SELECT COUNT(id) AS ja_fez FROM alunos WHERE (nome='$nome' AND data_nascimento='$data_sem_barra' AND turma='$id_turma')"; //PESQUISA SE JÁ TEM AQUELE ALUNO NESSA TURMA
            $result_query = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result_query);
            $ja_fez = $row['ja_fez'];

            if ($ja_fez == 0) // NÃO ISERE O MESMO ALUNO DUAS VEZES
            {                
                $query = "INSERT INTO alunos (nome, data_nascimento, escola, turma) VALUES ('$nome', '$data_sem_barra', '$escola', '$id_turma')";
                $result_query = mysqli_query($conn, $query);
            }            
            next($nomes_alunos);
            next($data_nascimento_alunos);
        }

        //echo "PRIMEIRO<BR>";
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Turma cadastrada com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        header("Location: form-cad-turma.php");
    }    
    else
    {
        //echo "SEGUNDO<BR>";
        $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'> ESSA TURMA JÁ FOI CADASTRADA <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        header("Location: form-cad-turma.php");
    }
}
else
{
    //echo "TERCEIRO<BR>";
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>ERRO ao cadastrar turma <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    header("Location: form-cad-turma.php");
}

?>
