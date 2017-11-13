<?php	
	$id = $_GET['id'];
	
	include "../funcoes/conexao.php";
    $sqlEdit = "SELECT * FROM tb_lancamentos WHERE id_lanc = $id";
    $crud = $conn -> prepare($sqlEdit);	
    $crud -> execute();
	
    foreach($crud as $edit){
      if(isset($_POST['action'])){
		$dt_efetiva  = $_POST['dt_efetiva'];
		$dt_prevista = $_POST['dt_prevista'];
		$valor       = $_POST['valor'];
		$descricao   = $_POST['descricao'];
		
		include "../funcoes/conexao.php";
		$sql = "UPDATE tb_lancamentos SET dt_efetiva = ?, dt_prevista = ?, valor = ?, descricao = ? WHERE id_lanc = '$id';";
		$crud = $conn -> prepare($sql);	
		$crud -> execute(array($dt_efetiva,$dt_prevista ,$valor, $descricao));
		header("Location: ../index.php");
      }
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../estilo.css">
		<title>Editar lançamento</title>
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
		<h1 class="titulo esp">Editar lançamento</h1>
		<div id="container">
			<form action="" method="POST">
				<table class="cat">
					<tr>
						<td>Data Efetivada</td>
						<td>Data Prevista</td>
					</tr>	
					<tr>
						<td><input type="date" name="dt_efetiva" value="<?php echo $edit['dt_efetiva'];?>" ></td>
						<td><input type="date" name="dt_prevista" value="<?php echo $edit['dt_prevista'];?>" ></td>			
					</tr>
					<tr>
						<td>Valor</td>
						<td>Descrição</td>
					</tr>	
					<input type="hidden" name="R">					
					<tr>
						<td><input type="number" name="valor" value="<?php echo $edit['valor'];?>" ></td>
						<td><input type="text" name="descricao" value="<?php echo $edit['descricao'];?>" ></td>
						<td><input class="btn" type="submit" name="action" value="Enviar"></td>
					</tr>
				</table>	
			</form>
			<a href="../index.php"><input class="btn" type="button" value="Voltar"></a>
		</div>
	</body>
</html>