
 <?php 
	include("connection.php");
	include("select.php");
	

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Atualizar</title>
 	<link href="estilo/updateStyle.css" rel="stylesheet" />
 </head>
 <body>
 	<section>
 	<h3>Selecione o usuário para ser atualizado</h3>
 	<form method="POST">
	 	<select name="dados">
	 		<?php 
	 			foreach ($info as $dados) {
	 		 ?>
	 		<option name="dados" value="<?php echo $dados['nome'] ?>"><?php echo $dados['nome'] ?></option>
	 		<?php  } ?>
	 	</select>
	 	<form method="POST">
 			<h4>Novo Nome</h4>
 			<input type="text" name="novoNome" />
 			<h4>Novo Email</h4>
 			<input type="text" name="novoEmail" />
 			<h4>Nova Senha</h4>
 			<input type="text" name="novaSenha" />
 			
 			<input type="submit" name="acao" value="Atualizar" />

 		</form>
 	</form>
 
 	</section>
 	<section> 		
 		<form method="POST">
 			<input type="submit" name="irMensgem" value="Adicionar Mensagem" />
 			<?php 
 				if(isset($_POST["irMensgem"])){
 					header("Location: addMensagem.php");
 				}
 			 ?>
 		
 			<input type="submit" name="voltar" value="Voltar para Página Inicial" />
 			<?php 
 				if(isset($_POST["voltar"])){
 					header("Location: index.php");
 				}
 			 ?>
 	</form>
 	</section>


 
 </body>
 </html>

<?php 

	if(isset($_POST['acao'])){
		$retorno = @$_POST['dados'];
		
		$novoNome = $_POST['novoNome'];
		$novoEmail = $_POST['novoEmail'];
		$novaSenha = $_POST['novaSenha'];
		$novaSenhaCripto = md5($novaSenha);
		//$novaMensagem = $_POST['novaMensagem'];
		$retornoValidacao = false;

		foreach ($info as $key => $value) {
			if($value["nome"] == $novoNome || $value["email"] == $novoEmail){
				$retornoValidacao = true;
			}
		}
		
		if($retornoValidacao == true){
			echo "Usuário ou Email já existem";
		}else{
			$atualiza = $pdo->prepare("UPDATE user SET nome='$novoNome', email='$novoEmail', senha='$novaSenhaCripto' WHERE nome = ?");
			$atualiza->execute(array($retorno));
			//echo $retorno;
			echo "Usuário $retorno foi Atualizado";
		}



		


	}

		
	

 ?>
