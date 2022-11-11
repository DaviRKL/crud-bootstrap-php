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
<form name = "filtro" method="post" action="index.php">
			<div class="row">
				<div class = "form-group col-md-4">
					<div class ="input-group mb-3">
						<input type="text" class="form-control" maxlength="80" name="name" required>
						<button type="submit" class="btn btn-secondary"><i class='fas fa-search'></i> Consultar</button>
					</div>
				</div>
			</div>
		</form>
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
		<th>CPF/CNPJ</th>
		<th>Telefone</th>
		<th>Atualizado em</th>
		<th>Data</th>
		<th>Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($customers) : ?>
<?php foreach ($customers as $customer) : ?>
	<tr>
		<td><?php echo $customer['id']; ?></td>
		<td><?php echo $customer['name']; ?></td>
			<?php
			$cpf = $customer['cpf_cnpj'];

			$parte_um     = substr($cpf, 0, 3);
			$parte_dois   = substr($cpf, 3, 3);
			$parte_tres   = substr($cpf, 6, 3);
			$parte_quatro = substr($cpf, 9, 2);

			$monta_cpf = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";
			?>
		<td><?php echo $monta_cpf; ?></td>
		<?php
			$telefone = $customer['phone'];

			$parte_umt     = substr($telefone, 0, 2);
			$parte_doist   = substr($telefone, 2, 7);
			$parte_trest     = substr($telefone, 7, 11);
			

			$monta_telefone = "($parte_umt)$parte_doist-$parte_trest";
			?>
		<td><?php echo $monta_telefone; ?></td>
		<?php $d = new Datetime($customer['modified']);?>
		<td><?php echo FormataData($customer['modified']);?></td>
		<td><?php echo FormataData($customer['modified']); ?></td>
		<td class="actions text-start"> 
			<a href="view.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-pen"></i> Editar</a>
		    <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-modal" data-customer="<?php echo $customer['id']; ?>">
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
<?php include('modalCustomers.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>