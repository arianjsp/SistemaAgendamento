<?php

// IDEIA: UMA TELA SÓ PRA SELECIONAR A DATA DO FIM DO SEMESTRE E OUTRA TELA FAZ O CADASTRO E AS REPETIÇÕES.

include_once("../db/conexao.php");

$data_atual_start = $_SESSION['start'];	
$data_atual_end = $_SESSION['end'];	

$title = $_SESSION['title'];
$descricao = $_SESSION['descricao'];
$vagas = $_SESSION['vagas'];
$color = $_SESSION['color'];

$id_fim_semestre = $_SESSION['id_fim_semestre'];
$fim_semestre = $_SESSION['fim_semestre'];

$separa = explode(" ", $fim_semestre);	//DEIXAR SÓ A DATA PORQUE NA COMPARAÇÃO DE HORAS E MINUTOS PODE NÃO PASSAR NA CONDIÇÃO MESMO ESTANDO TUDO CERTO.
list($data_fim_semestre, $hora_fim_semestre) = $separa;

while(strtotime($data_atual_start) <= strtotime($fim_semestre))
{	
	//repeteEventos ($data_fim_semestre, $conn); //CHAMADAS RECURSIVAS PARA NÃO TER RETRABALHO DE REPETIR MESMOS HORARIOS TODOS OS DIAS. FAZ SÓ UMA VEZ E O ALGORITIMO REPLICA
	repeteEventos (); //CHAMADAS RECURSIVAS PARA NÃO TER RETRABALHO DE REPETIR MESMOS HORARIOS TODOS OS DIAS. FAZ SÓ UMA VEZ E O ALGORITIMO REPLICA
}

function repeteEventos ()
{
	global $data_atual_start, $data_atual_end, $data_fim_semestre, $id_fim_semestre, $title, $descricao, $vagas, $color, $conn; // VARIÁVEIS GLOBAIS

	$proxima_data = strtotime($data_atual_start . "+7 days"); 
	//$to_sql_datetime_start = date('Y-m-d H:i:s', $proxima_data);// TO MYSQL DATETIME FORMAT			
	$to_sql_datetime_start = date('Y-m-d H:i:s', $proxima_data);// TO MYSQL DATETIME FORMAT			
	$data_atual_start = $to_sql_datetime_start;

	$proxima_data = strtotime($data_atual_end . "+7 days"); 
	//$to_sql_datetime_end = date('Y-m-d H:i:s', $proxima_data);// TO MYSQL DATETIME FORMAT
	$to_sql_datetime_end = date('Y-m-d H:i:s', $proxima_data);// TO MYSQL DATETIME FORMAT
	$data_atual_end = $to_sql_datetime_end;

	$separa = explode(" ", $to_sql_datetime_start);	//DEIXAR SÓ A DATA PORQUE NA COMPARAÇÃO DE HORAS E MINUTOS PODE NÃO PASSAR NA CONDIÇÃO MESMO ESTANDO TUDO CERTO.
	list($data, $hora) = $separa;	

	//if (strtotime($to_sql_datetime_start) <= strtotime($fim_semestre))
	if (strtotime($data) <= strtotime($data_fim_semestre)) //DEIXAR SÓ A DATA PORQUE NA COMPARAÇÃO DE HORAS E MINUTOS PODE NÃO PASSAR NA CONDIÇÃO MESMO ESTANDO TUDO CERTO.
	{			
		$query = "UPDATE eventos SET title='$title', descricao='$descricao', vagas='$vagas', color='$color' WHERE (start = '$to_sql_datetime_start' AND id <> '$id_fim_semestre')";
		$resultado = mysqli_query($conn, $query);				
		repeteEventos ();
	}
	//buscar no BD se tem o horario cadastrado, caso não tenha ele cadastra, e quando for repetir para inserir as datas futuras vai tudo cair no else. 
	// no caso tem que inverter essa logica aqui. alem de apagar os echos //PASSAR TODAS AS DATAS PELA VARIAVEL SESSION EM VEZ DE LER DO BD	
}

?>