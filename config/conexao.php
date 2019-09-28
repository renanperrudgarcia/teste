<?php 
	// conexao com o banco de dados por pdo passando servidor usuario e senha nome do banco 
	$servidor = "localhost";
	$usuario = "root";
    $senha = "";
	$banco = "teste";
    
    $charset = "utf8";
    
	try {
		// PDO
		$pdo = new PDO("mysql:host=$servidor;dbname=$banco;charset=$charset", $usuario, $senha);
	} catch (PDOException $erro) {
		$msg = $erro -> getMessage();
		echo "<p>Erro ao conectar no Banco de Dados: $msg</p>";
	}
?>
