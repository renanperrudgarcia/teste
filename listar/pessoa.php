<?php
    include "./config/conexao.php";
?>
<div class="container">
	<div class="coluna">

		<h1>Listagem de Pessoa</h1>


		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<td width="5%">ID</td>
					<td width="20%">Nome </td>
                    <td width="20%">Cpf</td>
                    <td width="20%">E-mail</td>
                    <td width="15%">Data Nascimento:</td>
					<td>Opções</td>
				</tr>
			</thead>
			<tbody>
				<?php
					//selecionar os dados do editora
					$sql = "select * , date_format(datanascimento, '%d/%m/%Y')datanascimento from pessoa
						order by nome";
					$consulta = $pdo->prepare($sql);
					$consulta->execute();

					//laço de repetição para separar as linhas
					while ( $linha = $consulta->fetch(PDO::FETCH_OBJ)) {

						//separar os dados
						$id 	        = $linha->id;
						$nome 	        = $linha->nome;
                        $cpf 	        = $linha->cpf;
                        $email 	        = $linha->email;
                        $datanascimento = $linha->datanascimento;

						//montar as linhas e colunas da tabela
						echo "<tr>
							<td>$id</td>
							<td>$nome</td>
                            <td>$cpf</td>
                            <td>$email</td>
                            <td>$datanascimento</td>
							<td>
								<a href='cadastro/pessoa/$id' class='btn btn-success btn-sm'>
                                    Editar
								</a>

								<a href='javascript:excluir($id)' class='btn btn-danger btn-sm'>
									Excluir
								</a>
							</td>
						</tr>";

					}

				?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	//funcao em javascript para perguntar se quer mesmo excluir
	function excluir(id) {
		//perguntar
		if ( confirm("Deseja mesmo excluir? Tem certeza?" ) ) {
			//chamar a tela de exclusão
			location.href = "excluir/pessoa/"+id;
		}
	}

	$(document).ready( function () {
	    $('.table').DataTable( {
        "language": {
			"lengthMenu": "Exibindo _MENU_ resultados por página",
                "zeroRecords": "Nenhum registro encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro adiciondo!",
                "infoFiltered": "(filtrando de _MAX_ em um total de registros)",
                "search":"Buscar",
                paginate: {
                    previous: 'Anterior',
                    next:     'Próximo'
				},
				responsive: {
        			details: true
    			}
        }
    });
	});
</script>