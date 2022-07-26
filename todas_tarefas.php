<?php

	$acao = 'recuperar';
	require 'tarefa.controller.php';
	//print_r($tarefas);
	

?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	
		<script>

			function editar(id, txt_tarefa) {
				
				//criar u form e edição
				let form = document.createElement('form')
				form.action = '#'
				form.method = 'post'
				form.className = 'row'

				//criar um input para entrada de texto
				let inputTarefa = document.createElement('input')
				inputTarefa.type = 'text'
				inputTarefa.type = 'name'
				inputTarefa.className = 'col-9 form-control'
				inputTarefa.value = txt_tarefa

				//criar um input hidden para guardar o ID da tarefa
				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id

				//criar um button
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-3 btn btn-info'
				button.innerHTML = 'Atualizar'

				form.appendChild(inputTarefa)
				form.appendChild(inputId)
				form.appendChild(button)

				//limpar o texto da tarefa
				let tarefa = document.getElementById('tarefa_' + id)
				tarefa.innerHTML = ''

				//incluir form na página
				tarefa.insertBefore(form, tarefa[0])

				//incluir input ID (hidden) no form
				form.appendChild(button)
			}

		</script>

	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />

								<?php foreach($tarefas as $indice => $tarefa) { ?>	
									<div class="row mb-3 d-flex align-items-center tarefa">
										<div id="tarefa_<?=$tarefa->id?>" class="col-sm-9"><!--usa o ID da tarefa do proprio banco para ser unico-->
											<?= $tarefa->tarefa ?> (<?= $tarefa->status?>)
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger"></i>
										<i class="fas fa-edit fa-lg text-info" onclick="editar(<?=$tarefa->id?>,'<?= $tarefa->tarefa ?>')"></i>
										<i class="fas fa-check-square fa-lg text-success"></i>
										</div>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>