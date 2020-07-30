<?php 
	
	include("connection.php");
	include("select.php");

	

	

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Criar</title>
	<link href="estilo/createStyle.css" rel="stylesheet" />
</head>
<body>
	<h3>Criar Novos Usuários:</h3>
	<form method="POST">
		<h4>NOME</h4> 
		<input type="text" name="nome"  /> 
		<h4>EMAIL</h4> 
		<input type="text" name="email"  />
		<h4>SENHA</h4>  
		<input type="text" name="senha"  />
		<h4>MENSAGEM</h4> 
		<input type="text" name="mensagem"  />
		<input type="submit" name="acao" value="Criar" /> 
	</form>
	<form method="POST">
		<input type="submit" name="addMensagem" value="Adicionar Mensagem" />
		<?php 
			if(isset($_POST["addMensagem"])){
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
</body>
</html>

<?php 

	if (isset($_POST["acao"])) 
	{
		$nome = @$_POST["nome"];
		$email = @$_POST["email"];
		$senha = @$_POST["senha"];
		$senhaCripto = md5($senha);
		$mensagem = @$_POST["mensagem"];
		$retornoValidacao = false;

		//echo $mensagem;

		foreach ($info as $key => $value) {
			if($value["nome"] == $nome || $value["email"] == $email){
				$retornoValidacao = true;
			}
		}
		
		if($retornoValidacao == true){
			echo "Usuário ou Email já existem";
		}else{
			
			$insert = $pdo->prepare("INSERT INTO user(nome,email,senha) VALUES(?,?,?)");
			$insert->execute(array($nome,$email,$senhaCripto));
			

			$idUser = $pdo->lastInsertId();
			//echo $idUser;

			$insertMensagem = $pdo->prepare("INSERT INTO mensagem(texto,id_user) VALUES(?,?)");
			$insertMensagem->execute(array($mensagem,$idUser));
			//echo "Mensagem inserida com sucesso";

			echo "User inserido com sucesso!";

			
		}


	} 



 ?>




