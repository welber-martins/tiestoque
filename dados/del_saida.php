<?php

	$id = $_GET['id'];

	include_once "../conexao/db_banco.php";

	$sql = "DELETE FROM saida WHERE id = $id ";
	$result = $conn->query($sql);

	$conn = null;

	header("location: ../total_h_saida.php");

 ?>