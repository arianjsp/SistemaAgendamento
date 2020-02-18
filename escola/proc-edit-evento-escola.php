<?php
session_start();

//Incluir conexao com BD
include_once("../db/conexao.php");

$turma = $_POST['turmas'];
$_SESSION['turma'] = $turma;
//echo "<BR>$turma = TURMA<BR>";

$query = "SELECT COUNT(*) AS total_alunos FROM alunos WHERE turma='$turma'";// CONTAR QUANTIDADE DE ALUNOS QUE TEM NA TURMA
$result_query = mysqli_query($conn, $query); //RETORNA RESULTADO DA CONSULTA
$row = mysqli_fetch_array($result_query);
$QTD_alunos = $row['total_alunos'];//RETORNA E ATRIBUI QUANTIDADE DE ALUNOS PRA VARIÁVEL
//echo "<BR>$QTD_alunos = QTD_alunos<BR>";
$_SESSION['QTD_alunos'] = $QTD_alunos;

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);//ID do evento
//echo "<BR>$id  = ID EVENTO<BR>";
$vagas = filter_input(INPUT_POST, 'vagas', FILTER_SANITIZE_NUMBER_INT);//vagas do evento
//echo "<BR>$vagas  = vagas EVENTO<BR>";

$_SESSION['id-evento'] = $id;
$_SESSION['vagas'] = $vagas;
$escola = $_SESSION['usuarioId']; //ID da escola

//echo "<BR>$escola  = usuario <BR>";

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
		/*
		$result_events = "SELECT vagas FROM eventos WHERE id='$id'"; // IDEIA PASSAR O DADO DE VAGAS COMO INPUT HIDDEN E PEGAR AQUI. NESSE CASO NEM PRECISA DE FAZER ESSA QUERY
		$resultado_events = mysqli_query($conn, $result_events);
		while($row_events = mysqli_fetch_array($resultado_events))
		{
			$vagas = $row_events['vagas'];//TENTAR MUDAR PARA O JEITO QUE TÁ EM CIMA NA PRIMEIRA QUERY
		}
		*/

		if($QTD_alunos <= $vagas )
		{
			//echo "<BR>PRIMEIRO<BR>";
			$vagas -= $QTD_alunos; //SUBTRAI QUANTIDADE DE ALUNOS DO TOTAL DE VAGAS PARA ATUALIZAR O CAMPO DA TABELA EVENTOS

			$result_events = "INSERT INTO agendamentos (evento, escola, turma, confirmado) VALUES ('$id', '$escola', '$turma', 0)";
			$resultado_events = mysqli_query($conn, $result_events);

			$result_events = "UPDATE eventos SET vagas = '$vagas' WHERE id = '$id'";			
			$resultado_events = mysqli_query($conn, $result_events);


			$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Agendamento realizado com sucesso! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			header("Location: t-c-escola.php");
		}
		else
		{
			//echo "<BR>SEGUNDO<BR>";
			//$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'> a quantidade de Alunos é maior do que a quantidade de Vagas <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			//$_SESSION['msg'] = "<div class='text-center alert alert-warning' role='alert'> <H7> A turma informada tem mais alunos do que a quantidade de vagas. <BR> Se você ainda quiser agendar para este evento específico você ainda tem duas opções: ENTRAR NA LISTA DE ESPERA. ou SOLICTAR + VAGAS. <BR> como funciona: <BR> Lista de Espera: quem desejar entrar na lista de espera, será informado por nós quando outras escolas desistirem daquele agendamento, liberando assim, as vagas existentes para sua escola. <BR> Solicitar Mais Vagas: caso a sua turma seja maior do que a quantidade de vagas do evento, a nossa equipe fárá a análise, e após isso, entramos em contato para responder. <BR> <div class='text-center'> <a href='lista-espera.php' class='btn btn-primary pull-center'>Lista Espera </a> <a href='mais-vagas.php' class='btn btn-warning pull-center'>Solicitar Vagas</a> </div> </H7> </div>";
			//$_SESSION['msg'] = "<div class='text-center alert alert-warning' role='alert'> <H7> A turma informada tem mais alunos do que a quantidade de vagas. <BR> Para continuar tentando agendar neste evento específico, só restam duas opções: <BR> 1ª - Lista de Espera: quem estiver na lista de espera será informado se outra Escola liberar suas vagas ocupadas. <BR> 2ª - Solicitar Mais Vagas: se a turma tem mais de 40 alunos, a nossa equipe fárá a análise entrará em contato para dizer se existe essa possíbilidade. </H7> </div>";
			//header("Location: t-c-escola.php");
			header("Location: outras-opcoes.php");
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