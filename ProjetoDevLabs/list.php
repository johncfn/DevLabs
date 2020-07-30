<?php 
	include("connection.php");
	//include("select.php");
	
	$sql = $pdo->prepare("SELECT * FROM user ");
	$sql->execute();
	$info = $sql->fetchAll(PDO::FETCH_ASSOC);

	$sql2 = $pdo->prepare("SELECT * FROM mensagem");
	$sql2->execute();
	$info2 = $sql2->fetchAll();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Listar</title>
 	<link href="estilo/updateStyle.css" rel="stylesheet" />
 </head>
 <body>
 	<section>
 		<h3>Lista de Usuários Cadastrados:</h3>
 		<form>
 			<?php 
 				foreach ($info as $key => $value) {
					echo "Nome: ".$value["nome"];
					echo "<br>";
					echo "Email: ".$value["email"];
					echo "<br>";	
					foreach ($info2 as $key => $value2) {
						if($value2['id_user'] == $value['id_user']){
							echo "Mensagem: ".$value2["texto"];
							echo "<br>";							
						}
												
					}
					echo "<hr>";			
				}
				
			
				
 			?>

 		</form>
 	</section>
 	<section>
 		<form method="POST">
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