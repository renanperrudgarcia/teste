<?php 
    include "config/conexao.php";
    include "config/funcoes.php";
    $porta = $_SERVER["SERVER_PORT"];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Teste</title>
	<meta charset="utf-8">

	<base href="http://<?=$_SERVER['SERVER_NAME']. ":$porta" . $_SERVER['SCRIPT_NAME']?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
	<link rel="stylesheet" type="text/css" href="css/summernote.min.css">
	<link rel="stylesheet" type="text/css" href="css/summernote-bs4.css">
	
	

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="js/jquery.flot.min.js"></script>
	<script type="text/javascript" src="js/lightbox.min.js"></script>
	<script type="text/javascript" src="js/parsley.min.js"></script>
	<script type="text/javascript" src="js/summernote.min.js"></script>
	<script type="text/javascript" src="js/summernote-bs4.min.js"></script>
	<script type="text/javascript" src="js/jasny-bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.maskMoney.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/datepicker-pt-BR.js"></script>

</head>
<body>

	<?php

		$pagina = "cadastro/pessoa";

		if ( isset ( $_GET["param"] ) ) {
			$pagina = trim ( $_GET["param"] );
		}

		$p = explode("/", $pagina);
		// p 0 é a pasta
		// p 1 é o arquivo
		// p 2 é o id
		$pasta = $p[0];
		$arquivo = $p[1];

		$pagina = "$pasta/$arquivo.php";

		// Incluir main
		include "main.php";
	?>
</body>
</html>