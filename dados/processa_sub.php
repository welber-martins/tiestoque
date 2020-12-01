<?php
	include_once("../conexao/db_banco.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome_subcategoria = mysqli_real_escape_string($conn, $_POST['nome_subcategoria']);

/*
	$result_sub = "UPDATE subcategoria SET nome_subcategoria ='$categoria_nome' WHERE id = '$id'";
	$resultado_sub = mysqli_query($conn, $result_sub);


	//

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../exclui.php'>
				<script type=\"text/javascript\">
					alert(\"Categoria alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../exclui.php'>
				<script type=\"text/javascript\">
					alert(\"Categoria não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>

*/

echo "$id - $nome";