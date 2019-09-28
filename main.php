<?php 
    if ( !isset ($pagina ) ) {
        header("location: index.php");
    }
?>
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
	<div class="container">
		<a class="navbar-brand text-uppercase" href="index.php"><img src="" width="40" height="40"  alt="" title="">Teste</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse mr-2" id="menu">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item  mr-2 mt-2">
					<a href="cadastro/pessoa" class="nav-link">
					Novo
					</a>
				</li>
				<li class="nav-item mr-2 mt-2">
					<a href="listar/pessoa" class="nav-link">
					Listar
					</a>
				</li>
			</ul>
		</div>
	</div>
	</nav>
</header>

<!-- CONTEÚDO PRINCIPAL -->
<main>
    <div class="container"  style="padding-top: 60px;">
        <?php
		   if ( file_exists ( $pagina ) ) 
		   		include $pagina;
		   else
		   		include "paginas/erro.php";
        ?>
    </div>
</main>

<footer class="bg-light fixed-bottom">	
	<p class="text-right text-dark p-2">&copy; Teste </p>
</footer>