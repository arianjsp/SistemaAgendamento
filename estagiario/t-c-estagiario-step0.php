<?php

session_start();
include_once("../db/conexao.php");

if (!isset($_SESSION['fim_semestre']))
{	
	$id = $_SESSION['usuarioId'];	
	//$query = "SELECT fim_semestre FROM usuarios WHERE id = '$id'";
	$query = "SELECT start FROM eventos WHERE (estagiario = '$id' AND title = 'Fim do Semestre')";
	$resultado = mysqli_query($conn, $query);	
	/*
	while($row = mysqli_fetch_array($resultado))
	{		
		$_SESSION['fim_semestre'] = $row['start'];		
	}	
	*/
	$row = mysqli_fetch_array($resultado);
	$_SESSION['fim_semestre'] = $row['start'];		

	if (isset($_SESSION['fim_semestre']))			
	{			
		// FAZER ISSO DEPOIS:		

		// SE FOR MENOR DO QUE A DATA ATUAL PEDIR PRA CADASTRAR NOVA DATA DE FIM DE SEMESTRE

		//CRIAR NOVO IF PRA ISSO E DEPOIS REDIRECIONAR

		header("Location: t-c-estagiario.php"); //ADICIONAR HORARIOS DE ESTAGIO					
	}
	else
	{		
		header("Location: t-c-estagiario-step1.php"); // DEFINIR O FIM DO SEMESTRE ATUAL.
	}	
}
else
{	
	header("Location: t-c-estagiario-step0.php"); //continua aqui					
}

?>