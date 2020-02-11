<?php

session_start();
include_once("../db/conexao.php");

$id = $_SESSION['usuarioId'];

if (isset($_SESSION['fim_semestre']))
{
	//echo "SEMESTRE ACABA EM: " . $_SESSION['fim_semestre'] . "<BR> ";
	//echo "HORA FINAL: " . $_SESSION['HORAFINAL'] . "<BR> ";
	//echo "hora inicio: ". $_SESSION['start'];
	//echo "hora fim: ". $_SESSION['end'];
}
else
{	
	$start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_STRING);
	$end = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_STRING);
	$_SESSION['HORAFINAL'] = $end;	

	$data = explode(" ", $start);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);	
	$start_sem_barra = $data_sem_barra . " " . $hora;
	
	$_SESSION['fim_semestre'] = $start_sem_barra;		
	//	$id = $_SESSION['usuarioId'];

	$data = explode(" ", $end);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$end_sem_barra = $data_sem_barra . " " . $hora;

	$descricao = "Data em que acaba o as aulas deste estagiário específico. Essa informação é importante para todas as verificações no sistema.";
	
	$query = "INSERT INTO eventos (estagiario, title, descricao, vagas, start, end, color) VALUES ('$id', 'Fim do Semestre', '$descricao', 0, '$start_sem_barra', '$end_sem_barra', '#8B0000')";	
	$result_query = mysqli_query($conn, $query);

	//echo "SEMESTRE ACABA EM: " . $_SESSION['fim_semestre'] . " ";
}

//$query = "SELECT id, estagiario, title, start, end, color FROM eventos";
$query = "SELECT id, estagiario, title, descricao, vagas, start, end, color FROM eventos WHERE (estagiario='$id')";
$result_query = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset='utf-8' />
		<link href="../css/index.css" rel="stylesheet">  <!-- PARA CEU DE TELA INTEIRA NO FUNDO -->
		<title>Gerenciar Horários de Visitação</title>
		<link href='../css/bootstrap.min.css' rel='stylesheet'>
		<link href='../css/fullcalendar.min.css' rel='stylesheet' />
		<link href='../css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<link href='../css/personalizado.css' rel='stylesheet' />		
		<script src='../js/jquery.min.js'></script>
		<script src='../js/bootstrap.min.js'></script>
		<script src='../js/moment.min.js'></script>
		<script src='../js/fullcalendar.min.js'></script>
		<script src='../locale/pt-br.js'></script>
		
		<script>
			$(document).ready(function() {
				$('#calendar').fullCalendar({
					defaultView: 'agendaWeek',
					header: {						
						left: 'today',
						center: 'title',						
						right: 'agendaWeek'
					},					
					defaultDate: Date(),
					navLinks: false, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					eventClick: function(event) {
						
						$('#visualizar #id').text(event.id);
						$('#visualizar #id').val(event.id);						
						$('#visualizar #estagiario').text(event.estagiario);
						$('#visualizar #estagiario').val(event.estagiario);
						$('#visualizar #title').text(event.title);
						$('#visualizar #descricao').text(event.descricao);
						$('#visualizar #vagas').text(event.vagas);
						$('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #start').val(event.start.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #end').val(event.end.format('DD/MM/YYYY HH:mm:ss'));						
						$('#visualizar #color').val(event.color);
						$('#visualizar').modal('show');
						return false;

					},
					
					selectable: true,
					selectHelper: true,
					select: function(start, end){
						$('#cadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
						$('#cadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'));
						$('#cadastrar').modal('show');						
					},
					events: [
						<?php
							while($row = mysqli_fetch_array($result_query)){
								?>
								{
								id: '<?php echo $row['id']; ?>',
								estagiario: '<?php echo $row['estagiario']; ?>',
								title: '<?php echo $row['title']; ?>',
								descricao: '<?php echo $row['descricao']; ?>',
								vagas: '<?php echo $row['vagas']; ?>',
								start: '<?php echo $row['start']; ?>',
								end: '<?php echo $row['end']; ?>',
								color: '<?php echo $row['color']; ?>',								
								},<?php
							}
						?>
					]
				});
			});
			
			//Mascara para o campo data e hora
			function DataHora(evento, objeto){
				var keypress=(window.event)?event.keyCode:evento.which;
				campo = eval (objeto);
				if (campo.value == '00/00/0000 00:00:00'){
					campo.value=""
				}
			 
				caracteres = '0123456789';
				separacao1 = '/';
				separacao2 = ' ';
				separacao3 = ':';
				conjunto1 = 2;
				conjunto2 = 5;
				conjunto3 = 10;
				conjunto4 = 13;
				conjunto5 = 16;
				if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19)){
					if (campo.value.length == conjunto1 )
					campo.value = campo.value + separacao1;
					else if (campo.value.length == conjunto2)
					campo.value = campo.value + separacao1;
					else if (campo.value.length == conjunto3)
					campo.value = campo.value + separacao2;
					else if (campo.value.length == conjunto4)
					campo.value = campo.value + separacao3;
					else if (campo.value.length == conjunto5)
					campo.value = campo.value + separacao3;
				}else{
					event.returnValue = false;
				}
			}
		</script>
	</head>
	<body>

		<div class="fluid-container" id="">
    		<div id="" class="text-center" style="color:#000">
        		<div id="ceu" class="img_fundo" style="padding-bottom: 10%; padding-top: 0%">
		
					<a href="../index.php"> HOME </a><br>

					<div class="container">
						<font color="white">
							<h1 class="text-center"> Registre seus Dias e Horários de Estágio </h1>
						</font>
						<BR>
						
						<?php
						
						if(isset($_SESSION['msg']))
						{
							echo $_SESSION['msg'];
							unset($_SESSION['msg']);
						}
						
						?>

						<div id='calendar'></div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title text-center">Dados do Horário</h4>
					</div>
					<div class="modal-body">
						<div class="visualizar">
							<dl class="dl-horizontal">
								<dt> ID do Horário </dt>
								<dd id="id"></dd>								
								<dt> ID do Estagiário </dt>
								<dd id="estagiario"></dd>								
								<dt> Data e Hora de Inicio </dt>
								<dd id="start"></dd>
								<dt> Data e Hora do Fim </dt>
								<dd id="end"></dd>								
							</dl>
							<button class="btn btn-canc-vis btn-warning">Editar</button>
						</div>
						<div class="form">
							<form class="form-horizontal" method="POST" action="proc-edit-evento-estagiario.php">								

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label"> Data e Hora do Início </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label"> Data e Hora do Fim </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
									</div>
								</div>								
								<input type="hidden" class="form-control" name="id" id="id">
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="button" class="btn btn-canc-edit btn-primary">Cancelar</button>
										<button type="submit" class="btn btn-warning">Salvar Alterações</button>
									</div>
								</div>

							</form>						
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title text-center"> Cadastrar Seus Horários </h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="POST" action="proc-cad-evento-estagiario.php">

							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label"> Data e Hora de Início </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label"> Data e Hora do Fim </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
								</div>
							</div>	

							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-success">ADICIONAR</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			$('.btn-canc-vis').on("click", function() {
				$('.form').slideToggle();
				$('.visualizar').slideToggle();
			});
			$('.btn-canc-edit').on("click", function() {
				$('.visualizar').slideToggle();
				$('.form').slideToggle();
			});
		</script>
	</body>
</html>
