<!DOCTYPE html>
<?php	
	$id        = $_GET['id'];
	$descricao = $_GET['descricao'];
	
	if(isset($_POST['sim'])){
		$sql = "DELETE FROM tb_categoria WHERE id_cat = $id";
		include "conexao.php";
		$contatos = $conn -> prepare($sql);	
		$contatos -> execute();	
		header("Location: ../pags/categorias.php");
	}
?>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../estilo.css">
		<title>	Deletar	Categorias</title>
	</head>
	<body>		
		<div class="excluir">
			<h3><p>Deseja excluir <?php echo $descricao; ?></p></h3>	
			<p class="excAnuncio">Para excluir uma categoria não deve existir um lançamento com ela.</p>
			<form action="" method="POST">
				<input class="btn" type="submit" name="sim" value="sim">
				<a href="../pags/categorias.php">
					<input class="btn" type="button" value="não">
				</a>
			</form>
		</div>
	</body>
</html>