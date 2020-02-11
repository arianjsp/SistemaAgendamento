<?php
	session_start();
	
	unset(
		$_SESSION['usuarioId'],		
		$_SESSION['permissao'],
		$_SESSION['logado'],
		$_SESSION['usuario_nome'],
		//$_SESSION['usuarioEmail'],
		//$_SESSION['usuarioSenha'],
		$_SESSION['fim_semestre'],
		$_SESSION['id_fim_semestre'],
		$_SESSION['nivel_ensino'],
		$_SESSION['serie'],
		$_SESSION['nome_turma'],
		$_SESSION['start'],
		$_SESSION['end'],
		$_SESSION['title'],
		$_SESSION['vagas'],
		$_SESSION['color'],
		$_SESSION['id'],
		$_POST['email'],
		$_POST['senha'],
		$_POST['turmas'],
		$_POST["nomes_alunos"],
		$_POST["idades_alunos"],
		$_POST['nivel_ensino'],
		$_POST['series'],
		$_POST['nome_turma']
					// VER SE NÃO TEM OUTROS SESSIOS ALÉM DESSE PRA APAGAR QUANDO DESLOGAR.
	);										// EU SEI QUE TEM O START E O END DOS HORARIOS DOS EVENTOS. VERIFICAR DEPOIS NOS ARQUIVOS.
	
	$_SESSION['logoff_message'] = "AGUARDAMOS VOCÊ ";

	//redirecionar o usuario para a página de login
	//header("Location: t_login.php");
	session_unset();
	//session_destroy(); // SE ATIVADA NÃO APARECE A MENSAGEM DE DESPEDIDA E SAUDADE
	$_SESSION['msg'] = "<div align='right'> <div class='alert alert-primary col-2 alert-dismissible fade show' align='center' role='alert'> SENTIREMOS SUA FALTA  " . $_SESSION['usuario_nome'] . "! <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div> </div>";
	header("Location:../index.php");
	//exit;
?>