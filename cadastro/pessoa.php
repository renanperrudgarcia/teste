<?php
    $id = $nome = $cpf = $email = $datanascimento = "";
    //verifica se esta recebendo algum parametro pela url
    if ( isset ( $p[2] ) ) {
		//se tiver o id recebe o que esta sendo passado
		$id = $p[2];

		// consulta no banco se tem uma pessoa com id 
		$sql = "SELECT *, 
			date_format(datanascimento, '%d/%m/%Y') datanascimento 
			FROM pessoa 
			WHERE id = :id LIMIT 1";
		$consulta = $pdo->prepare($sql);
		$consulta->bindValue(":id",$id);
		$consulta->execute();
        $dados = $consulta->fetch(PDO::FETCH_OBJ);
        //verifica se tem pessoa cadastrada com id se tiver pegas os dados do select
        if ( isset ( $dados->id ) ) {
            $id              = $dados->id;
            $nome		     = $dados->nome;
            $cpf	         = $dados->cpf;
            $email 		     = $dados->email;
            $datanascimento  = $dados->datanascimento;
        }else{
            echo "<script>alert('Não exite Pessoa cadastrada com esse ID !');history.back();</script>";
            
        }
	}
?>
    <div class="container">
      <h1 class="text-center">Cadastro Pessoa</h1>
            <form name="pessoa" method="POST" action="salvar/pessoa.php" data-parsley-validate>
                
            <div class="row">
                <div class="form-group col-md-1">
                <label for="id">ID:</label>
                <input type="text" name="id" class="form-control"  readonly value="<?=$id;?>">
                </div>

                <div class="form-group col-md-11">
                <label for="nome">Nome:</label>
                    <input type="text" name="nome" required class="form-control"
                     data-parsley-required-message="Preencha o Nome" value="<?=$nome;?>">
                </div>

            </div>
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" id="cpf" required class="form-control" data-mask="999.999.999-99"
                    data-parsley-required-message="Por favor Digite um CPF"value="<?=$cpf;?>" onblur="validarCpf(this.value)">
                </div>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" required class="form-control"
                    data-parsley-required-message="Preencha o Email"  value="<?=$email;?>">
                </div>	

                <div class="form-group">
                    <label for="datanascimento">Data de Nascimento:</label>
                    <input type="text" name="datanascimento" required class="form-control" data-mask="99/99/9999"
                    data-parsley-required-message="Preencha a Data" value="<?=$datanascimento;?>">
                </div>
                
                <div class="float-right">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i> Salvar
                    </button>
                </div>

            </form>
        
    </div>
<script type="text/javascript">
	function validarCpf(cpf) {
		$.get("validarCpf.php",{cpf:cpf},function(dados){
			if ( dados != 1 ) {
				alert(dados);
				// RESET
				$("#cpf").val("");
			}
		})
	}
</script>