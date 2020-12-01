 <?php
	session_start();
	include_once("../conexao/db_banco.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Saída</title>
	<head>
	<body>


		<?php
		//Está sendo enviado as informações
		if ($_SERVER['REQUEST_METHOD']=='SESSION') {
			
			$_SESSION['dispositivos'] = $dispositivo;
			$_SESSION['data1'] = $datadB;
			$_SESSION['data2'] = $dataDb;

			listar($dispositivo, $datadB, $dataDb, $conn);

		}elseif((isset($_SESSION['dispositivos'])) AND (isset($_SESSION['data1'])) AND (isset($_SESSION['data2']))){
				listar($_SESSION['dispositivos'], $_SESSION['data1'], $_SESSION['data2'], $conn);
			}

			function listar($dispositivo, $datadB, $dataDb, $conn){


			// Definimos o nome do arquivo que será exportado
			$arquivo = 'estoqueTI.xls';
			
			// Criamos uma tabela HTML com o formato da planilha
			$html = '';
			$html .= '<table border="1">';
			$html .= '<tr>';
			$html .= '<td colspan="7"><center>Total de Saida</center></tr>';
			$html .= '</tr>';
			
			
			$html .= '<tr>';
			$html .= '<td><b>ID</b></td>';
			$html .= '<td><b>Dispositivos</b></td>';
			$html .= '<td><b>Descricao</b></td>';
			$html .= '<td><b>Quantidade</b></td>';
			$html .= '<td><b>Data</b></td>';
			$html .= '<td><b>Setor</b></td>';
			$html .= '<td><b>Observacao</b></td>';
			$html .= '</tr>';


			//$result_empresas = "SELECT * FROM saida WHERE dispositivo LIKE  '$dispositivo' AND data BETWEEN '$datadB' AND '$dataDb'";
			$result_empresas = "SELECT h.id, ct.categoria_nome, sub.nome_subcategoria, h.quant, h.data, h.setor, h.observacao from saida as h, categoria as ct, subcategoria as sub  
								WHERE h.dispositivo = '$dispositivo' and h.dispositivo = ct.id  and data BETWEEN '$datadB' AND '$dataDb' and h.descricao = sub.id";	

			$resultado_empresas = mysqli_query($conn, $result_empresas);
				
				while ($row_empresas = mysqli_fetch_assoc($resultado_empresas)){

			      	$html .= '<tr>';
			      	$html .= '<td>'.$row_empresas["id"].'</td>';
					$html .= '<td>'.$row_empresas["categoria_nome"].'</td>';
					$html .= '<td>'.$row_empresas["nome_subcategoria"].'</td>';
					$html .= '<td>'.$row_empresas["quant"].'</td>';
					$data = date('d/m/Y',strtotime($row_empresas['data']));
					$html .= '<td>'.$data.'</td>';
					$html .= '<td>'.utf8_encode($row_empresas["setor"]).'</td>';
					$html .= '<td>'.utf8_encode($row_empresas['observacao']).'</td>';
					$html .= '</tr>';
			         }
			// Configurações header para forçar o download
			header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
			header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
			header ("Cache-Control: no-cache, must-revalidate");
			header ("Pragma: no-cache");
			header ("Content-type: application/x-msexcel");
			header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
			header ("Content-Description: PHP Generated Data" );
			// Envia o conteúdo do arquivo
			echo $html;
			exit;
		}
		
		?>
		
	
	</body>
</html>