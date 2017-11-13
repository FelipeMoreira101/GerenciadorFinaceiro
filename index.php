<?php
	include "funcoes/conexao.php";
	$sql = "SELECT * FROM tb_lancamentos";
	$listar = $conn -> prepare($sql);	
	$listar -> execute();	
	
	$sql = "SELECT SUM(valor) AS saldo FROM tb_lancamentos WHERE tipo = 'R'";
	$rec = $conn -> prepare($sql);
	$rec -> execute();
	foreach($rec as $guarda){
		$saldo = $guarda['saldo'];
	}

	$sql = "SELECT SUM(valor) AS despAtual FROM tb_lancamentos WHERE tipo = 'D'";
	$rec = $conn -> prepare($sql);
	$rec -> execute();
	foreach($rec as $guarda){
		$despAtual = $guarda['despAtual'];
	}
	
	$saldoAtual = $saldo - $despAtual;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="estilo.css">
		<title>Gerenciador Financeiro</title>
	</head>
	<body>
		<header class="header">
			<nav class="navBar">
				<ul class="ulB">
					<li class="liB"><a href="#">HOME</a></li>
					<li class="liB"><a href="pags/categorias.php">CATEGORIA</a></li>					
				</ul>
			</nav>
		</header>
		<div class="menu">
			<div class="icones">
				<a href="pags/despesa.php"><img src="img/minus.png"></a>
				<a href="pags/receita.php"><img src="img/add.png"></a>
				<h1 class="saldo">Saldo Atual:<?php echo $saldoAtual;?></h1>
			</div>
		</div>
		<div id="container">
			<table class="tabGerencia">
				<tr>
					<td>Tipo</td>
					<td>Data Prevista</td>
					<td>Data Efetuada</td>
					<td>Valor</td>
					<td>Data de envio</td>
					<td>Descrição</td>
					<td colspan=3>Operações</td>
				</tr>
				<?php
					
					foreach($listar as $mostrar){
						$id        = $mostrar['id_lanc'];
						$dt_prev   = $mostrar['dt_prevista'];
						$dt_efet   = $mostrar['dt_efetiva'];
						$valor     = $mostrar['valor'];
						$descricao = $mostrar['descricao'];
						$dt_envio  = $mostrar['dt_envio'];
						$tipo      = $mostrar['tipo'];
						$excluir   = "<a href='funcoes/excluir.php?id=$id&descricao=$descricao'><img src='img/lixeira.png' height='25px' widht='25px'></a>";
						$edit      = "<a href='pags/edit.php?id=$id'><img src='img/edit.png' height='25px' widht='25px'></a>";
						$pagar     = "<a href='funcoes/pagar.php?id=$id'><img src='img/pagar.png' height='25px' widht='25px'></a>";	
						$hj = date('Ymd');
						$efe = str_replace("-","",$dt_efet);	
							
						if($efe < $hj){
							$class = "atrasado";
						}
						if($efe == $hj){
							$class = "pagar";
						}
						if($efe > $hj){
							if($efe <= $hj + 7){
								$class = "semana";
							}
						}	
						if($tipo == 'R'){
							$img = "add.png";
						}else if($tipo == 'D'){
							$img = "minus.png";
						}
						
						echo "
							<tr>
								<td><img src='img/$img' height='32px' widht='32px'></td>
								<td class='$class'>$dt_prev</td>
								<td class='$class'>$dt_efet</td>
								<td class='$class'>$valor</td>
								<td class='$class'>$dt_envio</td>
								<td class='$class'>$descricao</td>
								<td class='$class'>$excluir</td>
								<td class='$class'>$pagar</td>
								<td class='$class'>$edit</td>
							</tr>
						";
					}
				?>
			</table>	
		</div>
	</body>
</html>