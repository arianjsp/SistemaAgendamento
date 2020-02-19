<?php  
	include("conexao.php");

	function getAlunos($id_turma) : array{
		$sql 	= "select nome from alunos where turma = ". $id_turma;
		$result = mysqli_query($sql);
		$row	= mysql_fetch_assoc($result);

		return $row;
	}

	function getEstagiarios(){
		$sql 	= "select nome from usuarios where permissao = 1";
		$result = mysqli_query($sql);
		$row	= mysql_fetch_assoc($result);

		return $row;
	}

	function getEscolas(){
		$sql 	= "select nome, id from usuarios where permissao = 3";
		$result = mysqli_query($sql);
		$row	= mysql_fetch_assoc($result);

		return $row;
	}

	function getTurmas(): array{
		$sql 	= "select nome_turma, escola from turmas";
		$result = mysqli_query($sql);
		$row	= mysql_fetch_assoc($result);

		return $row;
	}

	function getTurmasFromEscola($id_escola): array{
		$sql 	= "select nome_turma from turmas where escola = ".$id_escola;
		$result = mysqli_query($sql);
		$row	= mysql_fetch_assoc($result);

		return $row;
	}

	function getEventos(): array{
		$sql 	= "select title, descricao, vagas from eventos";
		$result = mysqli_query($sql);
		$row	= mysql_fetch_assoc($result);

		return $row;
	}

	function getProfessores(){
		
	}

?>