<?php
header("Content-type: application/json; charset=utf-8");

$json = array();

if(isset($_GET)){

	$nome = $_GET["nome"];
	$senha = $_GET["senha"];
	$email = $_GET["email"];

	if($nome != "" && $senha != "" && $email != ""){

			include ("../inc.conexao.php");

			$query = "insert into usuario (email, senha, nome) values ('$email','$senha','$nome')";
			$link = mysqli_query($conexao, $query);

			if($conexao){
				$json[] = "Usuário Cadastrado";
			}
			else{
				$json = "Aconteceu o seguinte erro: " . mysqli_error();
			}

	}else{
		$json[] = "Preencha todos os campos";
	}



	echo json_encode($json);

}

 ?>