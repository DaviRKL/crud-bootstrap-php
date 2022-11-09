<?php 
	require_once('functions.php'); 
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Usuário <?php echo $usuario['id']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Nome</dt>
	<dd><?php echo $usuario['nome']; ?></dd>

	<dt>Usuário</dt>
	<dd><?php echo $usuario['user']; ?></dd>

	<dt>Senha:</dt>
	<dd><?php echo $usuario['PASSWORD']; ?></dd>

	<dt>Foto:</dt>
	<dd><?php
		if (empty($usuario['foto'])){
			echo  "<img src=\"fotos/" . $usuario['foto'] . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"300px\">";
		}else{
			echo  "<img src=\"fotos/SemImagem.jpg\" class\"shadow p-1 mb-1 bg-body rounded\" width=\"300px\">";
		}
		?>
		</dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-secondary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>