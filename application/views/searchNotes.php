<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>Boletim de Avisos</title>
</head>
<body>
	<div id="container" class="container">
		<header class="my-5 d-flex justify-content-between align-items-center">
			<h1>Boletim de Avisos</h1>

			<div class="d-flex gap-3 align-items-center w-50 justify-content-end">
				<form action="<?php echo base_url()?>home/searchNotes" class="w-50" id="formPermission" method="POST">
					<div class="col-md">
				    <div class="form-floating">
				      <select class="form-select" id="floatingSelectGrid" name="permissionNote" onchange="this.form.submit()">
				        <option disabled selected value="">Permissão</option>
				        <option name="optionType" value="Geral">Geral</option>
				        <option name="optionType" value="Funcionários">Funcionários</option>
				        <option name="optionType" value="Diretoria">Diretoria</option>
				      </select>

				      <label for="floatingSelectGrid">Tipo de permissão</label>
				    </div>
					</div>
				</form>

				<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#searchNote">Pesquisar aviso</button> -->
				<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#createNote">Criar aviso</button>
			</div>
		</header>

		<div class="bg-danger" align="center" style="color: #FFF">
			<?php if($this->session->flashdata('error'));?>
			<?php echo $this->session->flashdata('error');?>
		</div>

		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">Nº do Aviso</th>
		      <th scope="col">Título</th>
		      <th scope="col">Tipo de Aviso</th>
		      <th scope="col">Permissões</th>
		      <th scope="col"></th>
		      <th scope="col">Editar</th>
		    </tr>
		  </thead>

		  <tbody>
		  	<?php foreach ($resultNotes as $notes):?>
		  		<tr>
			      <th scope="row"><?php echo $notes->id_boletim ?></th>
			      <td><?php echo $notes->title_boletim ?></td>
			      <td><?php echo $notes->type_user ?></td>
			      <td><?php echo $notes->permissions_user ?></td>
			      <td>
			      	<a href="<?php echo base_url()?>home/viewNote/<?php echo $notes->id_boletim ?>" class="btn btn-sm btn-success">Visualizar</a>
			      </td>
			      <td>
			      	<a href="<?php echo base_url()?>home/editNotes/<?php echo $notes->id_boletim ?>" class="btn btn-sm btn-outline-primary">Editar</a>
			      	<a href="<?php echo base_url()?>home/removeNotes/<?php echo $notes->id_boletim ?>" class="btn btn-sm btn-outline-danger">Excluir</a>
			      </td>
		    	</tr>
		  	<?php endforeach ?>
		  </tbody>
		</table>

		<nav aria-label="Page navigation example">
		  <ul class="pagination">
		    <li class="page-item"><a class="page-link" href="#">1</a></li>
		    <li class="page-item"><a class="page-link" href="#">2</a></li>
		    <li class="page-item"><a class="page-link" href="#">3</a></li>
		    <li class="page-item"><a class="page-link" href="#">Next</a></li>
		  </ul>
		</nav>
	</div>

	<div class="modal fade" id="createNote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <form action="<?php echo base_url()?>home/addNotes" method="POST" class="needs-validation" novalidate>
	      	<div class="modal-header">
		        <h1 class="modal-title fs-5" id="exampleModalLabel">Criar novo aviso</h1>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>

		      <div class="modal-body">
		      	<div class="form-group">
		      		<div class="input-group mb-3">
				    		<input type="text" name="titleNote" class="form-control" id="validationCustom01" placeholder="Título do aviso" required>
				  		</div>

				  		<div class="form-floating">
				  			<textarea name="contentNote" class="form-control" id="floatingTextarea2" placeholder="Leave a comment here" minlength="1" required style="height: 250px"></textarea>
							  <label for="floatingTextarea2">Contéudo</label>
				  		</div>
		      	</div>

		      	<div class="row g-2 mt-1">
		      		<div class="col-md">
		      			<span class="d-block mb-1">Tipos de aviso</span>

								<div class="form-check form-switch">
								  <input name="typeNote[]" value="Urgente" class="form-check-input" type="checkbox" role="switch" id="urgente">
								  <label class="form-check-label" for="urgente">Urgente</label>
								</div>

								<div class="form-check form-switch">
								  <input name="typeNote[]" value="Noticias" class="form-check-input" type="checkbox" role="switch" id="noticias">
								  <label class="form-check-label" for="noticias">Notícias</label>
								</div>

								<div class="form-check form-switch">
								  <input name="typeNote[]" value="Atividades" class="form-check-input" type="checkbox" role="switch" id="atividades">
								  <label class="form-check-label" for="Atividades">Atividades</label>
								</div>

								<div class="form-check form-switch">
								  <input name="typeNote[]" value="Dúvidas" class="form-check-input" type="checkbox" role="switch" id="duvidas">
								  <label class="form-check-label" for="duvidas">Dúvidas</label>
								</div>
		      		</div>

		      		<div class="col-md">
						    <div class="form-floating">
						      <select class="form-select" id="floatingSelectGrid" name="permissionNote" required>
						        <option disabled selected value="">Permissão</option>
						        <option value="Geral">Geral</option>
						        <option value="Funcionários">Funcionários</option>
						        <option value="Diretoria">Diretoria</option>
						      </select>

						      <label for="floatingSelectGrid">Tipo de permissão</label>
						    </div>
							</div>
		      	</div>
		      </div>

				  <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
		        <input type="submit" class="btn btn-primary" name="insert" value="Criar aviso">
		      </div>
				</form>
	    </div>
	  </div>
	</div>

	<!-- Pesquisar avisos -->
	<div class="modal fade" id="searchNote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	    	<form action="<?php echo base_url()?>home/searchNotes" method="POST">
		      <div class="modal-header">
		        <h1 class="modal-title fs-5" id="exampleModalLabel">Pesquisar aviso</h1>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		        <div class="form-group">
		        	<div class="input-group mb-3">
							  <input type="text" name="titleNote" class="form-control" placeholder="Título do aviso" aria-label="titulo">
							</div>

							<div class="row g-2 mt-1">
							  <div class="col-md">
							    <div class="form-floating">
							      <select class="form-select" id="floatingSelectGrid" name="permissionNote">
							        <option disabled selected>Todas</option>
							        <option value="Geral">Geral</option>
							        <option value="Funcionários">Funcionários</option>
							        <option value="Diretoria">Diretoria</option>
							      </select>
							      <label for="floatingSelectGrid">Tipo de permissão</label>
							    </div>
							  </div>
							</div>
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
		        <input type="submit" class="btn btn-primary" name="insert" value="Pesquisar">
		      </div>
	      </form>
	    </div>
	  </div>
	</div>
	<script src="../resoucers/js/app.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>