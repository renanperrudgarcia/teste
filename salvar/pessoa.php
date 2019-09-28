<?php
include "../config/conexao.php";
include "../config/funcoes.php";

// Verificar POST
if ($_POST) {

	// Laço pra recuperar vararivariaveis por POST
	foreach ($_POST as $key => $value) {
		// $key - nome do campo
		// $value - valor do campo (digitado)
		if (isset($_POST[$key])) {
			$$key = trim($value);
		}
	}

	// Formatando a data utilizando funcao dentro da pasta "config/funcoes.php"
	$datanascimento = Data($datanascimento);

	// 
	if (empty($id)) {

		//se existe alguem, qualquer um, com o mesmo cpf
		$sql = "select id, nome from pessoa where cpf = :cpf limit 1";
		$consulta = $pdo->prepare($sql);
		$consulta->bindValue(":cpf", $cpf);
	} else {

		//se existe alguem, menos ele mesmo, com o mesmo cpf
		$sql = "select id, nome from pessoa where cpf = :cpf and id <> :id limit 1";
		$consulta = $pdo->prepare($sql);
		$consulta->bindValue(":cpf", $cpf);
		$consulta->bindValue(":id", $id);
	}

	//executar o sql
	$consulta->execute();
	$dados = $consulta->fetch(PDO::FETCH_OBJ);



	//se receber dados do id da um alerta
	if (isset($dados->id)) {
		echo "<script>alert('já existe um $dados->nome cadastrada com o mesmo CPF !');history.back();</script>";
		exit;
	}


	if (empty($id)) {
		//insert

		$sql = "INSERT INTO pessoa (id, nome, cpf, email, datanascimento)
					    VALUES (NULL, :nome, :cpf, :email, :datanascimento)";
		$consulta = $pdo->prepare($sql);
		$consulta->bindValue(":nome", $nome);
		$consulta->bindValue(":cpf", $cpf);
		$consulta->bindValue(":email", $email);
		$consulta->bindValue(":datanascimento", $datanascimento);
	} else {
		//update
		$sql = "UPDATE pessoa SET nome = :nome,cpf = :cpf, email = :email, 
					datanascimento = :datanascimento WHERE id = :id LIMIT 1";
		$consulta =  $pdo->prepare($sql);
		$consulta->bindValue(":id", $id);
		$consulta->bindValue(":nome", $nome);
		$consulta->bindValue(":cpf", $cpf);
		$consulta->bindValue(":email", $email);
		$consulta->bindValue(":datanascimento", $datanascimento);
	}
}

if ($consulta->execute()) {
	// persiste no banco
	echo "<script>alert('Registro inserido com sucesso!');location.href='../listar/pessoa';</script>";
} else {
	echo $consulta->errorInfo()[2];
	echo "<script>alert('Erro ao Salvar');history.back();</script>";
	exit;
}
