
 <?php 
	include("connection.php");
	include("select.php");
	/*	
	$sql = $pdo->prepare("SELECT * FROM users");
	$sql->execute();
	$info = $sql->fetchAll();*/


	
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Deletar</title>
 	<link href="estilo/deleteStyle.css" rel="stylesheet" />
 </head>
 <body>
 	<h3>Selecione o usuário para ser deletado</h3>
 	<form method="POST">
	 	<select name="dados">
	 		<?php 
	 			foreach ($info as $dados) {
	 		 ?>
	 		<option name="dados" value="<?php echo $dados['nome'] ?>"><?php echo $dados['nome'] ?></option>
	 		<?php  } ?>
	 	</select>
	 	<input type="submit" name="delete" value="Deletar" />
 	</form>
 	<form method="POST">
 		<br />
 			<input type="submit" name="voltar" value="Voltar para Página Inicial" />
 			<?php 
 				if(isset($_POST["voltar"])){
 					header("Location: index.php");
 				}
 			 ?>
 		</form>
 
 </body>
 </html>

<?php 


	if(isset($_POST['delete'])){
		$valorDeletar = @$_POST["dados"];

		//echo $valorDeletar;

		$sql = $pdo->prepare("DELETE FROM `user` WHERE nome = ? ");
		if($sql->execute(array($valorDeletar))){
			echo "Usuário Deletado com Sucesso";
		}

		
	}

 ?>
