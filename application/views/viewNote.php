<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>Aviso</title>
</head>
<body>
	<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: block">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">
	        	#<?php echo $note->id_boletim?> - <?php echo $note->title_boletim ?>
	        </h1>

	        <a href="../../" class="btn-close"></a>
	      </div>

	      <div class="modal-body">
	        <?php echo $note->description_boletim ?>
	      </div>

	      <div class="modal-footer">
	      	<a href="../../" class="btn btn-secondary">Fechar</a>
	      </div>
	    </div>
	  </div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>