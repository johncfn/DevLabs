<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<link href="estilo/style.css" rel="stylesheet" />
</head>
<body>
	<h3>Selecione uma Opção</h3>
	<section class="teste" >
		<form method="POST">
			<input type="submit" name="create" value="Criar" />
			<?php 
				if(isset($_POST["create"])){
					header('Location: create.php');
			} ?>
			
		</form>
		<form method="POST">
			<input type="submit" name="update" value="Atualizar" />
			<?php 
				if(isset($_POST["update"])){
					header('Location: update.php');
			} ?>
		</form>	
		<form method="POST">
			<input type="submit" name="delete" value="Deletar" />
			<?php 
				if(isset($_POST["delete"])){
					header('Location: delete.php');
				}

			 ?>
		</form>
		<form method="POST">
			<input type="submit" name="list" value="Listar" />
			<?php 
			if(isset($_POST["list"])){
				header('Location: list.php');
			} ?>
		</form>
	</section>	
</body>
</html>

