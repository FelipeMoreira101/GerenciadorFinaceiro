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
		<title>Receita</title>
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
		<h1 class="titulo esp">Adicionar Receita</h1>
		<div id="container">
			<form action="../funcoes/lancRec.php" method="POST">
				<table class="cat">
					<tr>
						<tr>
						<td>Data Efetivada</td>
						<td>Data Prevista</td>
						<td>Categoria</td>
					</tr>	
					<tr>
						<td><input type="date" name="dt_ef" required></td>
						<td><input type="date" name="dt_prev" required></td>			
						<input type="hidden" name="tipo">	
						<td>
							<select name="cat" required>
								<?php 
									include "../funcoes/conexao.php";
									$sql = "SELECT * FROM tb_categoria";
									$receber = $conn -> prepare($sql);
									$receber -> execute();

									foreach($receber as $listar){
										$id_cat  = $listar['id_cat'];
										$cat = utf8_encode($listar['descricao']);
										
										echo "<option value='$id_cat'>$cat</option>";
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Valor</td>
						<td>Descrição</td>
					</tr>		
					<tr>
						<td><input type="number" name="valor" required></td>
						<input type="hidden" name="R">
						<td><input type="text" name="desc" required></td>
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