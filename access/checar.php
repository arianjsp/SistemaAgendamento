<?php
session_start();	
//Incluindo a conexão com banco de dados
include_once("../db/conexao.php");	
//O campo usuário e senha preenchido entra no if para validar
if((isset($_POST['email'])) && (isset($_POST['senha'])))
{
	$usuario = mysqli_real_escape_string($conn, $_POST['email']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
	$senha = mysqli_real_escape_string($conn, $_POST['senha']);
	//$senha = md5($senha);
		
	//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
	$result_usuario = "SELECT * FROM usuarios WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	//var_dump($resultado_usuario);
	$resultado = mysqli_fetch_assoc($resultado_usuario);
	//var_dump($resultado);
	//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
	if(isset($resultado))
	{
		$_SESSION['usuarioId'] = $resultado['id'];
		$_SESSION['usuario_nome'] = $resultado['nome'];			
		$_SESSION['permissao'] = $resultado['permissao'];
		$_SESSION['logado'] = 'logado';
		//echo "PEGOU: " . $_SESSION['permissao'];

		$_SESSION['msg'] = "<div align='right'> <div class='alert alert-success col-2 alert-dismissible fade show' align='center' role='alert'> Bem vindo " . $_SESSION['usuario_nome'] . "! <a href='access/sair.php' class='alert-link'>SAIR</a> <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div> </div>";

		header("Location: ../index.php");	
		
	//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
	//redireciona o usuario para a página de login
	}
	else
	{	
		//Váriavel global recebendo a mensagem de erro			
		$_SESSION['msg'] = "<div align='right'> <div class='alert alert-warning col-2 alert-dismissible fade show' align='center' role='alert'> Usuário ou senha Inválido! <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div> </div>";
		header("Location: ../index.php");
	}
//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
}
else
{	
	$_SESSION['msg'] = "<div align='right'> <div class='alert alert-danger col-2 alert-dismissible fade show' align='center' role='alert'> Usuário ou senha Inválido! <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div> </div>";
	header("Location: ../index.php");
}
?>