<?php

session_start();
include_once("../db/conexao.php");

$result_events = "SELECT id, estagiario, title, descricao, vagas, start, end, color FROM eventos";
$resultado_events = mysqli_query($conn, $result_events);

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset='utf-8' />
		<link href="../css/index.css" rel="stylesheet">  <!-- PARA CEU DE TELA INTEIRA NO FUNDO -->
		<title>Agenda</title>
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

			$(document).ready(function()
			{
				$('#calendar').fullCalendar(
					{
						defaultView: 'agendaWeek',
						header: {						
							left: 'today',
							center: 'title',						
							right: 'agendaWeek'
						},
						defaultDate: Date(),
						navLinks: true, // can click day/week names to navigate views
						editable: true,
						eventLimit: true, // allow "more" link when too many events

						eventClick: function(event)
						{
								$('#visualizar #id').text(event.id);
								$('#visualizar #id').val(event.id);
								$('#visualizar #estagiario').text(event.estagiario);
								$('#visualizar #estagiario').val(event.estagiario);
								$('#visualizar #title').text(event.title);
								$('#visualizar #title').val(event.title);
								$('#visualizar #descricao').text(event.descricao);
								$('#visualizar #descricao').val(event.descricao);
								$('#visualizar #vagas').text(event.vagas);
								$('#visualizar #vagas').val(event.vagas);
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
						select: function(start, end)
						{
							$('#cadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
							$('#cadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'));
							$('#cadastrar').modal('show');						
						},

						events:
						[
							<?php
							while($row_events = mysqli_fetch_array($resultado_events))
							{
							?>
								{
									id: '<?php echo $row_events['id']; ?>',
									estagiario: '<?php echo $row_events['estagiario']; ?>',
									title: '<?php echo $row_events['title']; ?>',
									descricao: '<?php echo $row_events['descricao']; ?>',
									vagas: '<?php echo $row_events['vagas']; ?>',
									start: '<?php echo $row_events['start']; ?>',
									end: '<?php echo $row_events['end']; ?>',																											
									color: '<?php echo $row_events['color']; ?>',
									},
							<?php							
							}
							?>
						]
					});
			});

			//Mascara para o campo data e hora
			function DataHora(evento, objeto)
			{
				var keypress=(window.event)?event.keyCode:evento.which;
				campo = eval (objeto);
				if (campo.value == '00/00/0000 00:00:00')
				{
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

				if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19))
				{
					if (campo.value.length == conjunto1) campo.value = campo.value + separacao1;
					else if (campo.value.length == conjunto2) campo.value = campo.value + separacao1;
					else if (campo.value.length == conjunto3) campo.value = campo.value + separacao2;
					else if (campo.value.length == conjunto4) campo.value = campo.value + separacao3;
					else if (campo.value.length == conjunto5) campo.value = campo.value + separacao3;
				}
				else
				{
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
							<h1 class="text-center"> Agenda </h1>
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
						<h4 class="modal-title text-center">Dados do Evento</h4>
					</div>
					<div class="modal-body">
						<div class="visualizar">
							<dl class="dl-horizontal">
								<dt>ID do Evento</dt>
								<dd id="id"></dd>
								<dt>ID Estagiário</dt>
								<dd id="estagiario"></dd>
								<dt>Titulo do Evento</dt>
								<dd id="title"></dd>
								<dt>Descrição do Evento</dt>
								<dd id="descricao"></dd>
								<dt>quantidade VAGAS</dt>
								<dd id="vagas"></dd>
								<dt>Inicio do Evento</dt>
								<dd id="start"></dd>
								<dt>Fim do Evento</dt>
								<dd id="end"></dd>																
							</dl>
							<button class="btn btn-canc-vis btn-warning">Editar</button>
						</div>
						<div class="form">
							<form class="form-horizontal" method="POST" action="proc-edit-evento-funcionario.php">
								<div class="form-group">
									<label for="title" class="col-sm-2 control-label">Título</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="title" id="title" placeholder="Titulo do Evento">
									</div>
								</div>
								<div class="form-group">
									<label for="descricao" class="col-sm-2 control-label">Descrição</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição do Evento">
									</div>
								</div>
								<div class="form-group">
									<label for="vagas" class="col-sm-2 control-label">quantidade de VAGAS</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="vagas" id="vagas" placeholder="Informa a quantidade de alunos">
									</div>
								</div>	
								<!-- 							
								 -->
								<!-- -->
								<div class="form-group">
									<label for="color" class="col-sm-2 control-label">Cor</label>
									<div class="col-sm-10">
										<select name="color" class="form-control" id="color">
											<option value="">Selecione</option>			
											<option style="color:#FFD700;" value="#FFD700">Amarelo</option>
											<option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
											<option style="color:#FF4500;" value="#FF4500">Laranja</option>
											<option style="color:#8B4513;" value="#8B4513">Marrom</option>	
											<option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
											<option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
											<option style="color:#A020F0;" value="#A020F0">Roxo</option>
											<option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>										
											<option style="color:#228B22;" value="#228B22">Verde</option>
											<option style="color:#8B0000;" value="#8B0000">Vermelho</option>
										</select>
									</div>
								</div>
								<!-- -->
								<input type="hidden" class="form-control" name="id" id="id">
								<input type="hidden" class="form-control" name="estagiario" id="estagiario">  <!-- PARA PEGAR OS DADOS SEM EXIBIR NO FORMULÁRIO -->
								<input type="hidden" class="form-control" name="start" id="start">  <!-- PARA PEGAR OS DADOS SEM EXIBIR NO FORMULÁRIO -->
								<input type="hidden" class="form-control" name="end" id="end">  <!-- PARA PEGAR OS DADOS SEM EXIBIR NO FORMULÁRIO -->
								<!-- -->
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
		
		<script>

			$('.btn-canc-vis').on("click", function()
			{
				$('.form').slideToggle();
				$('.visualizar').slideToggle();
			});


			$('.btn-canc-edit').on("click", function()
			{
				$('.visualizar').slideToggle();
				$('.form').slideToggle();
			});

			

		</script>
	</body>
</html>
