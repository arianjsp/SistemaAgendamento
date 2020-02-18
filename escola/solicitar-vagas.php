<?php
session_start();
include_once("../db/conexao.php");
//echo " ". $_SESSION['id-evento'] ."<BR>";
//echo " ". $_SESSION['turma'] ."<BR>";

$turma = $_SESSION['turma'];
$id = $_SESSION['id-evento'];
$escola = $_SESSION['usuarioId'];

$QTD_alunos = $_SESSION['QTD_alunos'];
// se QTD_VAGAS = 0, então o pedido é para entrar na lista de espera, caso contrário, então o pedido é de abertura de mais vagas

//$query = "SELECT COUNT(id) AS ja_fez FROM solicitar_vagas WHERE (evento='$id' AND escola='$escola' AND turma='$turma' AND qtd_vagas ='$QTD_alunos')";
$query = "SELECT COUNT(id) AS ja_fez FROM pedidos WHERE (evento='$id' AND escola='$escola' AND turma='$turma' AND qtd_vagas ='$QTD_alunos')";
$result_query = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result_query);
$ja_fez = $row['ja_fez'];


if($ja_fez == 0)
{
	//$result_events = "INSERT INTO solicitar_vagas (evento, escola, turma, qtd_vagas) VALUES ('$id', '$escola', '$turma', '$QTD_alunos')";
	$result_events = "INSERT INTO pedidos (evento, escola, turma, qtd_vagas) VALUES ('$id', '$escola', '$turma', '$QTD_alunos')";
	$resultado_events = mysqli_query($conn, $result_events);
	
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Seu pedido será analisado. Aguarde nossa resposta. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	header("Location: t-c-escola.php");
}
else
{
	$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'> Você já fez um pedido para este mesmo evento e mesma turma <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	header("Location: t-c-escola.php");
}

?>