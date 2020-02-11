<?php
session_start();

//Incluir conexao com BD
include_once("../db/conexao.php");

$start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_STRING);
$end = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_STRING);

if(!empty($start) && !empty($end))
{
	//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
	
	$data = explode(" ", $start);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$start_sem_barra = $data_sem_barra . " " . $hora;	
	
	$data = explode(" ", $end);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$end_sem_barra = $data_sem_barra . " " . $hora;	

	if (strtotime($end_sem_barra) > strtotime($start_sem_barra))
	{
		$_SESSION['start']=$start_sem_barra;
		$_SESSION['end']=$end_sem_barra;
		$estagiario = $_SESSION['usuarioId']; //ID do estagiário

		$query = "SELECT COUNT(id) AS ja_fez FROM eventos WHERE (estagiario='$estagiario' AND start='$start_sem_barra' AND end='$end_sem_barra')";
		$result_query = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result_query);
		$ja_fez = $row['ja_fez'];

		if ($ja_fez == 0)
		{
			$query = "INSERT INTO eventos (estagiario, start, end) VALUES ('$estagiario', '$start_sem_barra', '$end_sem_barra')";
			$result_query = mysqli_query($conn, $query);	
			//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
			if(mysqli_insert_id($conn))
			{
				require_once("repete-cad-evento-estagiario.php");
				$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Seu Horário foi Registrado com Sucesso! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: t-c-estagiario.php");
			}
			else
			{
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>ERRO! seu horário NÃO foi registrado.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: t-c-estagiario.php");
			}
		}
		else
		{
			$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Esta Data e Horário já foi registrado. Tente outra Data e Hora diferentes. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			header("Location: t-c-estagiario.php");
		}
	}
	else
	{
		$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'> a Data/Hora do FIM do evento precisa ser depois ou maior do que a Data/Hora do INICIO do evento. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: t-c-estagiario.php");
	}			
}
else
{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>ERRO! seu horário NÃO foi registrado<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	header("Location: t-c-estagiario.php");
}

?>