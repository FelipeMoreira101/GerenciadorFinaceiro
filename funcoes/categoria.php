<?php
	$id       = "";
	$tipo     = $_POST['tipo'];
	$nome_cat = $_POST['nome_cat'];
	
	include "conexao.php";
	$sql = "INSERT INTO tb_categoria VALUES(?,?,?)";
	$cat = $conn -> prepare($sql);
	$cat -> execute(array($id, $nome_cat ,$tipo));
   	$cat = null;
   	header("location: ../pags/categorias.php?concluido=foi");
?>