<?php
session_start();

//Incluir conexao com BD
include_once("../db/conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);//ID do evento
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$vagas = filter_input(INPUT_POST, 'vagas', FILTER_SANITIZE_NUMBER_INT);
$start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_STRING);
$end = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_STRING);
$estagiario = filter_input(INPUT_POST, 'estagiario', FILTER_SANITIZE_NUMBER_INT);//ID do estagiário
$color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);

$query = "SELECT id, start FROM eventos WHERE (estagiario = '$estagiario' AND title = 'Fim do Semestre')";
$result_query = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result_query);

$id_fim_semestre = $row['id'];
$_SESSION['id_fim_semestre'] = $row['id'];
$_SESSION['fim_semestre'] = $row['start'];

$_SESSION['title'] = $title;
$_SESSION['descricao'] = $descricao;
$_SESSION['vagas'] = $vagas;
$_SESSION['color'] = $color;

if(!empty($id) && !empty($title) && !empty($descricao) && !empty($vagas) && !empty($color))
{
	//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
	$data = explode(" ", $start);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$start_sem_barra = $data_sem_barra . " " . $hora;
	$_SESSION['start'] = $start_sem_barra;

	$data = explode(" ", $end);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$end_sem_barra = $data_sem_barra . " " . $hora;
	$_SESSION['end'] = $end_sem_barra;		
		
	$result_events = "UPDATE eventos SET title='$title', descricao='$descricao', vagas='$vagas', color='$color' WHERE (start = '$start_sem_barra' AND id <> '$id_fim_semestre')"; //SE FOR != VAI DAR ERRO. OLHE ABAIXO A RAZÃO:
	// A CLAUSULA DENTRO DOS PARANTESES CORRESPONDE A QUALQUER CHAVE PRIMARIA. SEM ELA ACONTECE ERRO 1175 PARA MUAR SAFE UPDATES NAS PREFERENCIAS DO BD.
	//UPDATE events SET title ='NOVO', vagas =777, color = "#1C1C1C" WHERE (start = "2020-01-28 22:00:00" AND id_evento <> 0);
	$resultado_events = mysqli_query($conn, $result_events);	
	
	//Verificar se alterou no banco de dados através "mysqli_affected_rows"
	if(mysqli_affected_rows($conn))
	{
		require_once("repete-edit-evento-funcionario.php");		
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>O Evento editado com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";				
		header("Location: t-c-funcionario.php");
	}
	else
	{
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>UM Erro ao editar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: t-c-funcionario.php");
	}	
}
else
{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>DOIS Erro ao editar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	header("Location: t-c-funcionario.php");
}

?>