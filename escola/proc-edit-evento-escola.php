<?php
session_start();

//Incluir conexao com BD
include_once("../db/conexao.php");

$turma = $_POST['turmas'];
//echo "<BR>$turma<BR>";

$query = "SELECT COUNT(*) AS total_alunos FROM alunos WHERE turma='$turma'";// CONTAR QUANTIDADE DE ALUNOS QUE TEM NA TURMA
$result_query = mysqli_query($conn, $query); //RETORNA RESULTADO DA CONSULTA
$row = mysqli_fetch_array($result_query);
$QTD_alunos = $row['total_alunos'];//RETORNA E ATRIBUI QUANTIDADE DE ALUNOS PRA VARIÁVEL

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);//ID do evento
$escola = $_SESSION['usuarioId']; //ID da escola

if(!empty($id) && !empty($QTD_alunos) && $turma != 0){
	//Converter a data e hora do formato brasileiro para o formato do Banco de Dados		
	
	//SELECT COUNT(id_agendamento) AS ja_tem FROM agendamentos WHERE (id_evento=9 AND id_escola = 58 AND id_turma=13);
	$query = "SELECT COUNT(id) AS ja_fez FROM agendamentos WHERE (evento='$id' AND escola='$escola' AND turma='$turma')";
	$result_query = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result_query);
	$ja_fez = $row['ja_fez'];
	//var_dump($ja_fez);
	//echo "<BR>JA FEZ = $ja_fez<BR>";

	if($ja_fez == 0)
	{
		$result_events = "SELECT vagas FROM eventos WHERE id='$id'";
		$resultado_events = mysqli_query($conn, $result_events);
		while($row_events = mysqli_fetch_array($resultado_events))
		{
			$vagas = $row_events['vagas'];//TENTAR MUDAR PARA O JEITO QUE TÁ EM CIMA NA PRIMEIRA QUERY
		}

		if($QTD_alunos <= $vagas )
		{
			//echo "<BR>PRIMEIRO<BR>";
			$vagas -= $QTD_alunos; //SUBTRAI QUANTIDADE DE ALUNOS DO TOTAL DE VAGAS PARA ATUALIZAR O CAMPO DA TABELA EVENTOS

			$result_events = "INSERT INTO agendamentos (evento, escola, turma) VALUES ('$id', '$escola', '$turma')";
			$resultado_events = mysqli_query($conn, $result_events);

			$result_events = "UPDATE eventos SET vagas = '$vagas' WHERE id = '$id'";			
			$resultado_events = mysqli_query($conn, $result_events);


			$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Agendamento realizado com sucesso! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			header("Location: t-c-escola.php");
		}
		else
		{
			//echo "<BR>SEGUNDO<BR>";
			$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'> a quantidade de Alunos é maior do que a quantidade de Vagas <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			header("Location: t-c-escola.php");
		}		
	}
	else
	{
		//echo "<BR>TERCEIRO<BR>";
		$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'> Você já fez um Agendamento para este Evento, com a mesma Turma e mesma Data. Para continuar com novo Agendamento, escolha, outro Evento, ou então outra Turma, ou então, noutra Data. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: t-c-escola.php");		
	}
}
else
{
	//echo "<BR>QUARTO<BR>";		
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> ERRO! NÃO foi reaizado o Agendamento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: t-c-escola.php");
}

?>