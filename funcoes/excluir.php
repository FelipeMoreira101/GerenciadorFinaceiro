<!DOCTYPE html>
<?php	
	$id        = $_GET['id'];
	$descricao = $_GET['descricao'];
	
	if(isset($_POST['sim'])){
		$sql = "DELETE FROM tb_lancamentos WHERE id_lanc = $id";
		include "conexao.php";
		$contatos = $conn -> prepare($sql);	
		$contatos -> execute();	
		header("Location: ../index.php");
	}
?>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../estilo.css">
		<title>
			Deletar
		</title>
	</head>
	<body>		
		<div class="excluir">
			<h3><p>Deseja excluir <?php echo $descricao; ?></p></h3>	
			<form action="" method="POST">
				<input class="btn" type="submit" name="sim" value="sim">
				<a href="../index.php">
					<input class="btn" type="button" value="não">
				</a>
			</form>
		</div>
	</body>
</html>