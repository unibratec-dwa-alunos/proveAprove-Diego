<?php 
header("Content-type: application/json; charset=utf-8");

include ("../inc.conexao.php");

$query = "SELECT r.id, r.titulo, u.receita_id, u.gostou, COUNT( u.gostou ) 
FROM receita AS r
INNER JOIN usuario_receita AS u ON r.id = u.receita_id
GROUP BY (
u.receita_id
)
ORDER BY (
u.gostou
)
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