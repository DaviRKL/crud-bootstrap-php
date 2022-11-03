<?php
    require_once('functions.php');
    index();
	function FormataData($data){
      $da = new DateTime ($data);
      return $da->format ("d-m-Y");  
	}
?>

<?php include(HEADER_TEMPLATE); ?>
<style>

td,th{
	color: #FFF;
}
#cars{ 
border:4px solid #7914C7 ; width: 200px; 
}
label{
	align: left
}
 
</style>


<header >
	<div class="row">
		<div class="col-sm-6">
			<h2>Carros</h2>
		</div>
			<div class="col-sm-6 text-end h2" >
				<a class="btn btn-secondary" href="add.php"  ><i class="fa fa-plus"></i> Novo Carro</a>
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
<form align = "left" method="post" action="filtrogeral.php">
			<label for="cars" >Escolha uma marca de carro:</label>
		<div class="row">
    <div class="form-group col-md-2">
	
	  <input type="text" class="form-control" name="cars" id="cars" placeholder="Marca">
	  </div>
	  
	  <div class="form-group col-md-10">
<input type="submit" value="Selecionar">
</div>
</div>
</div>
</form>
<hr>

<table class="table table-hover">
<thead>
	<tr>
		<tr>
	<th width='30px' >Id</th>
	<th width='100px'>Modelo</th>
	<th width='250px'>Marca</th>
	<th width='100px'>Ano</th>
	<th width='100px'>Data de cadastro</th>
	<th width='100px'>Foto</th>
	<th width='100px'>Opções</th>
	<tr>
	</tr>
</thead>
<tbody>
<?php if ($carros) : ?>
<?php foreach ($carros as $carro) : ?>
	<tr>
		<td><?php echo $carro['id']; ?></td>
		<td><?php echo $carro['modelo']; ?></td>
		<td><?php echo $carro['marca']; ?></td>
		<td><?php echo $carro['ano']; ?></td>
		<td><?php echo FormataData($carro['datacad']);?></td>
		<?php
		if (empty($carro['foto'])){
			$foto = 'SemImagem.png';
		}else{
			$foto = $carro['foto'];
		}
		$id = base64_encode($carro['id']);
		?>
		<td><?php echo "<img src='imagens/$foto' width='400px' heigth='100px'>"; ?></td>
		
		
	
		<td class="actions text-start"> 
			<a href="view.php?id=<?php echo $carro['id']; ?>" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $carro['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-pen"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-modal" data-carro="<?php echo $carro['id']; ?>" >
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

<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>