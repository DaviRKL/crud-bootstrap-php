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
	<dd><?php echo $usuario['password']; ?></dd>

	<dt>Foto:</dt>
	<?php
		if (empty($usuario['foto'])){
			$foto = 'SemImagem.png';
		}else{
			$foto = $usuario['foto'];
		}
		?>
		<td><?php echo "<img src='imagens/$foto' width='400px' heigth='100px'>"; ?></td>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-secondary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>