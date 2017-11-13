<?php	
	$id = $_GET['id'];
	
	include "../funcoes/conexao.php";
    $sqlEdit = "SELECT * FROM tb_categoria WHERE id_cat = '$id'";
    $crud = $conn -> prepare($sqlEdit);	
    $crud -> execute();
	
    foreach($crud as $edit){
      if(isset($_POST['action'])){
		$descricao  = $_POST['descricao'];
		
		include "../funcoes/conexao.php";
		$sql = "UPDATE tb_categoria	SET descricao = ? WHERE id_cat=$id;	";
		$crud = $conn -> prepare($sql);	
		$crud -> execute(array($descricao));
		header("Location: categorias.php");
      }
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../estilo.css">
		<title> Editar Categorias</title>
	</head>
	<body>
		<header class="header">
			<nav class="navBar">
				<ul class="ulB">
					<li class="liB"><a href="../index.php">HOME</a></li>
					<li class="liB"><a href="#">CATEGORIA</a></li>					
				</ul>
			</nav>
		</header>
		<div id="container">
		<h1 class="titulo esp">Editar Categoria</h1>
			<form action="" method="POST">
				<table class=" cat">
					<tr>
						<td>Nome da categoria</td>
					</tr>	
					<tr>
						<td><input type="text" name="descricao" value="<?php echo $edit['descricao'];?>"></td>
					</tr>	
						<td><input class="btn" type="submit" name="action"></td>
					</tr>
				</table>	
			</form>
			<a href="../index.php"><input class="btn" type="button" value="Voltar"></a>
		</div>
	</body>
</html>