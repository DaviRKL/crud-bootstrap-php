<?php 
	require_once('functions.php'); 
	view($_GET['id']);
?>
<link rel="stylesheet" href="style.css">
<?php include(HEADER_TEMPLATE); ?>

<h2>Carro <?php echo $carro['id']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Modelo:</dt>
	<dd><?php echo $carro['modelo']; ?></dd>

	<dt>Marca:</dt>
	<dd><?php echo $carro['marca']; ?></dd>

	<dt>Ano:</dt>
	<dd><?php echo $carro['ano']; ?></dd>
</dl>

<dl class="dl-horizontal">
	<dt>Data de Cadastro:</dt>
	<dd><?php echo $carro['datacad']; ?></dd>
     <?php 
	 if (empty($carro['foto'])){
			$imagem = 'SemImagem.png';
		}else{
			$imagem = $carro['foto'];
		} 
	?>
	<dt>Foto:</dt>
	<dd><?php echo "<img src='imagens/$imagem'  >";  ?></dd>
</dl>
<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $carro['id']; ?>" class="btn btn-secondary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>