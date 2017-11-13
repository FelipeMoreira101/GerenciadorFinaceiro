<?php
	$concluido  = 0;
	@$concluido = $_GET['concluido'];
	
	include "../funcoes/conexao.php";
	$sql = "SELECT * FROM tb_categoria";
	$listar = $conn -> prepare($sql);
	$listar -> execute();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../estilo.css">
		<title>Categorias</title>
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
		<h1 class="titulo esp">Categorias</h1>
			<table class="tabGerencia">
					<tr>
						<td>Nome</td>
						<td>Tipo</td>
						<td colspan=2>Operações</td>
					</tr>
					<?php
						foreach($listar as $mostrar){
							$id   = $mostrar['id_cat'];
							$tipo = $mostrar['tipo'];
							$nome = $mostrar['descricao'];
							$excluir   = "<a href='../funcoes/excluirCat.php?id=$id&descricao=$nome'><img src='../img/lixeira.png' height='25px' widht='25px'></a>";
							$edit      = "<a href='editCat.php?id=$id'><img src='../img/edit.png' height='25px' widht='25px'></a>";
							
							if($tipo == "R"){
								$tipo      = "Receita";
								$tipoclass = "Receita";
							}else if($tipo == "D"){
								$tipo      = "Despesa";
								$tipoclass = "Despesa";
							}else if($tipo == "A"){
								$tipo      = "Ambos";
								$tipoclass = "Ambos";
							}
							echo "
								<tr>
									<td class='$tipoclass'>$nome</td>
									<td class='$tipoclass'>$tipo</td>
									<td>$excluir</td>
									<td>$edit</td>
								</tr>";	
						}
					?>
			</table>	
			<!-- tabela para adicionar nova categoria -->
			<h1 class="titulo esp">Adicionar Categoria</h1>
			<form action="../funcoes/categoria.php" method="POST">
				<table class="cat">
					<tr>
						<td>Nome da categoria</td>
					</tr>	
					<tr>
						<td><input type="text" name="nome_cat" required></td>
					</tr>	
					<tr>
						<td>Tipo</td>
					</tr>
					<tr>
						<td>
							<select name="tipo" class="selecionar" required>
								<option value="R">Receita</option>
								<option value="D">Despesa</option>
								<option value="A">Ambos</option>
							</select>
						</td>
							<td><input class="btn" type="submit" name="Enviar"></td>
					</tr>
				</table>	
			</form>
			<a href="../index.php"><input class="btn" type="button" value="Voltar"></a>
		</div>
		<?php
			if($concluido == "foi"){
				echo "<script>alert('Concluido');</script>"; 
			}
		?>
	</body>
</html>