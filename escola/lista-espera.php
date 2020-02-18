<?php
session_start();
include_once("../db/conexao.php");
//echo " ". $_SESSION['id-evento'] ."<BR>";
//echo " ". $_SESSION['turma'] ."<BR>";

$turma = $_SESSION['turma'];
$id = $_SESSION['id-evento'];
$escola = $_SESSION['usuarioId'];

// se QTD_VAGAS = 0, então o pedido é para entrar na lista de espera, caso contrário, então o pedido é de abertura de mais vagas

//$query = "SELECT COUNT(id) AS ja_fez FROM lista_espera WHERE (evento='$id' AND escola='$escola' AND turma='$turma' AND qtd_vagas = 0)";
$query = "SELECT COUNT(id) AS ja_fez FROM pedidos WHERE (evento='$id' AND escola='$escola' AND turma='$turma' AND qtd_vagas = 0)";
$result_query = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result_query);
$ja_fez = $row['ja_fez'];

if($ja_fez == 0)
{
	//$result_events = "INSERT INTO lista_espera (evento, escola, turma, qtd_vagas) VALUES ('$id', '$escola', '$turma',  0)";
	$result_events = "INSERT INTO pedidos (evento, escola, turma, qtd_vagas) VALUES ('$id', '$escola', '$turma',  0)";
	$resultado_events = mysqli_query($conn, $result_events);
	
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Você foi adicionado na Lista de Espera deste Evento! Em caso de desistencia para os agendamentos dele, você será informado. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	header("Location: t-c-escola.php");
}
else
{
	$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'> Você já está na Lista de Espera deste Evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	header("Location: t-c-escola.php");
}
?>