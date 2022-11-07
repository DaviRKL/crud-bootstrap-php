<?php
    require_once('functions.php');
    index();
function FormataData($data){
	$da = new Datetime ($data);
	return $da->format ("d-m-Y"); 
}

       
      
?>

<?php include(HEADER_TEMPLATE); ?>
<style>
#name{ 
border:4px solid #7914C7 ; width: 200px; 
}
</style>
<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Clientes</h2>
		</div>
		<div class="col-sm-6 text-end h2">
	    	<a class="btn btn-secondary" href="add.php"><i class="fa fa-plus"></i> Novo Cliente</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
	
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th width="30%">Nome</th>
		<th>Usuario</th>
		<th>Senha</th>
		<th>Foto</th>
		<th>Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($usuarios) : ?>
<?php foreach ($usuarios as $usuario) : ?>
	<tr>
		<td><?php echo $usuario['id']; ?></td>
		<td><?php echo $usuario['nome']; ?></td>
		<td><?php echo $usuario['user']; ?></td>
		<td><?php echo $usuario['password'] ?></td>
		<?php
		if (empty($usuario['foto'])){
			$foto = 'SemImagem.png';
		}else{
			$foto = $usuario['foto'];
		}
		?>
		<td><?php echo "<img src='imagens/$foto' width='400px' heigth='100px'>"; ?></td>
		<td class="actions text-start"> 
			<a href="view.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-pen"></i> Editar</a>
		    <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-modal" data-usuario="<?php echo $usuario['id']; ?>">
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>
<?php include('modalusuarios.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>