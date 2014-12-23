<?php 
header("Content-type: application/json; charset=utf-8");

include ("../inc.conexao.php");

$query = "select * 
FROM `receita` 
ORDER BY id DESC 
LIMIT 0 , 30";

$link = mysqli_query($conexao, $query);
$registros = mysqli_num_rows($link);
$json = array();

if($registros > 0){

	while($dados = mysqli_fetch_array($link)){
		$lista[] = $dados; 
	}

	$json[] = $lista;

}
else{
	$json[] = "Consulta não retornou nenhum dado";
}

echo json_encode($json);



 ?>