<?php
session_start();
include_once("../db/conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); //EMAIL
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$fone = filter_input(INPUT_POST, 'fone', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
$ponto_referencia = filter_input(INPUT_POST, 'ponto_referencia', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$pais = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";
$permissao = 3;
//$result_usuario = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
$result_usuario = "INSERT INTO usuarios (nome, email, senha, permissao, fone, cep, rua, numero, bairro, complemento, ponto_referencia, cidade, estado, pais)
								VALUES ('$nome', '$email', '$senha', '$permissao', '$fone', '$cep', '$rua', '$numero', '$bairro', '$complemento', '$ponto_referencia', '$cidade', '$estado', '$pais')";
$resultado_usuario = mysqli_query($conn, $result_usuario);
//var_dump($resultado_usuario);
if(mysqli_insert_id($conn))
{
	//$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	$_SESSION['msg'] = "<div align='right'> <div class='alert alert-success col-2 alert-dismissible fade show' align='center' role='alert'> Usuário cadastrado com sucesso! Agora você já pode Acessar o Sistema. <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div> </div>";
	header("Location: ../index.php");
}
else
{
	//$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	$_SESSION['msg'] = "<div align='right'> <div class='alert alert-danger col-2 alert-dismissible fade show' align='center' role='alert'> Usuário não foi cadastrado. <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div> </div>";
	header("Location: ../index.php");
}
?>