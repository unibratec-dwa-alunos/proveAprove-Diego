<?php
header("Content-type: application/json; charset=utf-8");

$json = array();

if(isset($_POST)){

	$senha = $_POST["senha"];
	$nova_senha = $_POST["novasenha"];
	$email = $_POST["email"];

	if($senha == $nova_senha){
		$json[] = "Senhas correspondem";

		include ("../inc.conexao.php");
		$query = "update usuario set senha='$senha' where email='$email'";
		$link = mysqli_query($conexao, $query);

		if($link){
			$json[] = "A senha foi alterada";
			$json[] = "Que legal!";
		}
		else{
			$json[] = "Aconteceu o seguinte erro: " . mysqli_error();
		}
		
	}else{
		$json[] = "As senhas nao correspondem!";
		
	}
	echo json_encode($json);
} 

 ?>