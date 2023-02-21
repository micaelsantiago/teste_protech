<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>Editar boletim</title>
</head>
<body>
	<div class="modal" id="editNote" aria-labelledby="exampleModalLabel" aria-hidden="false" style="display: block;">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	    	<form action="../<?php base_url() ?>updateNote/<?php echo $singleNote->id_boletim ?>" method="POST">
		      <div class="modal-header">
		        <h1 class="modal-title fs-5" id="exampleModalLabel">#<?php echo $singleNote->id_boletim ?> - Editar aviso	</h1>
		      </div>
		      <div class="modal-body">
		        <div class="form-group">
		        	<div class="input-group mb-3">
							  <input type="text" name="titleNote" class="form-control" placeholder="Título do aviso" aria-label="titulo" value="<?php echo $singleNote->title_boletim ?>">
							</div>
		        	
		        	<div class="form-floating">
							  <textarea name="contentNote" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 250px"><?php echo $singleNote->description_boletim ?></textarea>
							  <label for="floatingTextarea2">Contéudo</label>
							</div>

							<div class="row g-2 mt-1">
							  <div class="col-md">
							  	<span class="d-block mb-1">Tipos de aviso</span>
							  	<div class="form-check form-switch">
								  	<input name="typeNote" value="Urgente" class="form-check-input" type="checkbox" role="switch" id="urgente">
								  	<label class="form-check-label" for="urgente">Urgente</label>
									</div>

									<div class="form-check form-switch">
								  	<input name="typeNote" value="Notícias" class="form-check-input" type="checkbox" role="switch" id="noticias">
								  	<label class="form-check-label" for="noticias">Notícias</label>
									</div>

									<div class="form-check form-switch">
								  	<input name="typeNote" value="Atividades" class="form-check-input" type="checkbox" role="switch" id="atividades">
								  	<label class="form-check-label" for="atividades">Atividades</label>
									</div>

									<div class="form-check form-switch">
								  	<input name="typeNote" value="Dúvidas" class="form-check-input" type="checkbox" role="switch" id="duvidas">
								  	<label class="form-check-label" for="duvidas">Dúvidas</label>
									</div>
							  </div>

							  <div class="col-md">
							    <div class="form-floating">
							      <select class="form-select" id="floatingSelectGrid" name="permissionNote">
							        <option disabled selected>Permissão</option>
							        <option value="Geral" <?php echo $singleNote->permissions_user == 'Geral' ? "selected" : ""?>>Geral</option>
							        <option value="Funcionários" <?php echo $singleNote->permissions_user == 'Funcionários' ? "selected" : ""?>>Funcionários</option>
							        <option value="Diretoria" <?php echo $singleNote->permissions_user == 'Diretoria' ? "selected" : ""?>>Diretoria</option>
							      </select>
							      <label for="floatingSelectGrid">Tipo de permissão</label>
							    </div>
							  </div>
							</div>
		        </div>
		      </div>
		      <div class="modal-footer">
		      	<a href="../../" class="btn btn-secondary">Cancelar</a>
		        <input type="submit" class="btn btn-primary" name="insert" value="Editar aviso">
		      </div>
	      </form>
	    </div>
	  </div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>