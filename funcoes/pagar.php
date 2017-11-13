<?php
	$id = $_GET['id'];
	
	include "../funcoes/conexao.php";
	$data = date('Y-m-d');
	$sql = "UPDATE tb_lancamentos SET dt_efetiva = ? WHERE id_lanc = '$id'";
	$pagar = $conn -> prepare($sql);
	$pagar -> execute(array($data));
	header("Location: ../index.php");
?>