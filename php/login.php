<?php
  include 'conexao.php';
  
  $login = $_POST['login'];
  $senha = $_POST['senha_login'];

  // Validação do usuário/senha digitados
  $sql = "SELECT * FROM `usuarios` WHERE `login` = '$login ' ";
  $query = mysqli_query($conexao,$sql);
  // Salva os dados encontados na variável $resultado
  $resultado = mysqli_fetch_assoc($query);
 
  //verifica o resultado da busca
  if (mysqli_num_rows($query) == 1 && $senha == $resultado['senha']) {
    session_start();
  	$_SESSION['logado'] = 'logado';
    $_SESSION['permissao'] = $resultado['permissao'];
    echo "sucesso";
  } else {
  	// Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
  	echo "erro";
  }    
?>