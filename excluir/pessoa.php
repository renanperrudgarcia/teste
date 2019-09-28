<?php 

	// Excluir registro
	if ( isset ( $p[2] ) ) {

		$id = (int)$p[2];
	
		$sql = "DELETE FROM pessoa WHERE id = :id LIMIT 1";
		$consulta = $pdo->prepare( $sql );
		$consulta->bindValue(":id",$id);

		// Verificar se o registro foi excluido
		if ( $consulta->execute() ) {
            echo "<script>alert('Registro excluído com sucesso');location.href='listar/pessoa';</script>";
		} else {
            echo "<script>alert('Erro ao excluir registro');history.back();</script>";
		}

	} else {
		echo "<script>alert('Ocorreu um erro ao excluir');history.back();</script>";
	}