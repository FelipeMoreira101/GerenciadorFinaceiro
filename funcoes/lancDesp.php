<?php
	$id = "";
	$dt_ef   = $_POST['dt_ef'];
	$dt_prev = $_POST['dt_prev'];
	$valor   = $_POST['valor'];
	$desc    = $_POST['desc'];
	$cat     = $_POST['cat'];
	$tipo    = $_POST['tipo'];
	$envio   = date('Y-m-d');
	
	$tipo     = "D";
	
	include "conexao.php";
	$sql = "INSERT INTO tb_lancamentos VALUE (?,?,?,?,?,?,?,?)";
	$img = $conn -> prepare($sql);
	$img -> execute(array($id, $tipo, $valor, $desc, $dt_prev, $dt_ef, $envio , $cat));
	header("location: ../pags/despesa.php?concluido=foi");
?>