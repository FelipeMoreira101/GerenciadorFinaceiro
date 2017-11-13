<?php
	$id      = "";
	$dt_ef   = $_POST["dt_ef"];
	$dt_prev = $_POST["dt_prev"];
	$cat     = $_POST["cat"];
	$valor   = $_POST["valor"];
	
	include "conexao.php";
	$sql = "INSERT INTO tb_lancamentos VALUES(?,?,?,?,?)";
	$img = $fusca -> prepare($sql);
	$img -> execute(array($id, $dt_ef, $dt_prev, $cat, $valor));
?>