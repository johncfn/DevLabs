
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
 	<title>Adicionar Nova Mensagem</title>
 	<link href="estilo/addMensagemStyle.css" rel="stylesheet" />
 </head>
 <body>
 	<h3>Selecione o usuário para adicionar uma mensagem</h3>
 	<form method="POST">
	 	<select name="dados">
	 		<?php 
	 			foreach ($info as $dados) {
	 		 ?>
	 		<option name="dados" value="<?php echo $dados['nome'] ?>"><?php echo $dados['nome'] ?></option>
	 		<?php  } ?>
	 	</select>
	 	<input type="text" name="novaMensagem" />
	 	<input type="submit" name="addMensagem" value="Adicionar" />
 	</form>
 	<form method="POST">
 		<br />
 		<input type="submit" name="voltarCriar" value="Voltar Criar Usuário" />
 			<?php 
 				if(isset($_POST["voltarCriar"])){
 					header("Location: create.php");
 				}
 			 ?>
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

	if(isset($_POST['addMensagem'])){
		$user = $_POST['dados'];
		$mensagemNova = $_POST['novaMensagem'];
		foreach ($info as $key => $value) {
			if($user == $value['nome']){
				$idUser = $value['id_user'];
			}
		}
		//echo $idUser;
		//echo $user;
		$sql = $pdo->prepare("INSERT INTO mensagem(texto,id_user) VALUES(?,?)");
		$sql->execute(array($mensagemNova,$idUser));
		echo "Nova Mensagem Adicionada";
	}

	/*if(isset($_POST['delete'])){
		$valorDeletar = @$_POST["dados"];

		//echo $valorDeletar;

		$sql = $pdo->prepare("DELETE FROM `users` WHERE nome = ? ");
		if($sql->execute(array($valorDeletar))){
			echo "Usuário Deletado com Sucesso";
		}

		
	}*/

 ?>
