<?php
session_start();

//Incluir conexao com BD
include_once("../db/conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);//ID do evento
$start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_STRING);
$end = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_STRING);
$estagiario = $_SESSION['usuarioId']; //ID do estagiário
$_SESSION['id'] = $id;

if(!empty($id) && !empty($start) && !empty($end)){

	//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
	$data = explode(" ", $start);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$start_sem_barra = $data_sem_barra . " " . $hora;
	$_SESSION['start']= $start_sem_barra;		

	$data = explode(" ", $end);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$end_sem_barra = $data_sem_barra . " " . $hora;	
	$_SESSION['end']= $end_sem_barra;
	
	$query = "UPDATE eventos SET start='$start_sem_barra', end='$end_sem_barra' WHERE id='$id'"; 
	$result_query = mysqli_query($conn, $query);	
	
	//Verificar se alterou no banco de dados através "mysqli_affected_rows"
	if(mysqli_affected_rows($conn))
	{
		require_once("repete-edit-evento-estagiario.php");
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Seu Horário foi alterado com Sucesso! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: t-c-estagiario.php");
	}
	else
	{
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> ERRO! seu horário NÃO foi alterado <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: t-c-estagiario.php");
	}	
}
else
{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> ERRO! seu horário NÃO foi alterado <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	header("Location: t-c-estagiario.php");
}

?>