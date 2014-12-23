<?php
header("Content-type: application/json; charset=utf-8");

include ("../inc.conexao.php");

$query = "INSERT INTO `usuario_receita`(`email`, `receita_id`, `favorito`, `gostou`, `nota`) VALUES ('','','','','')";

$link = mysqli_query($conexao, $query);
$registros = mysqli_num_rows($link);
$json = array();

if($link){
	$json[] = "Você curtiu a receita";
}
else{
	$json[] = "Aconteceu o seguinte erro: " . mysqli_error();
}

echo json_encode($json);


 ?>