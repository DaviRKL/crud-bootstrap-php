<?php
  require_once('functions.php');
  edit();

  include(HEADER_TEMPLATE);
  
  function CriaData($data){
      $d = new DateTime ($data);
      return $d->format ("Y-m-d");  
  }      
?>



<h2>Atualizar carro</h2>



<form action="edit.php?  id=<?php echo $carro['id']; ?>" method="post" enctype="multipart/form-data">
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="modelo">Modelo</label>
      <input type="text" class="form-control" name="carro['modelo']" value="<?php echo $carro['modelo']; ?>">
    </div>



   <div class="form-group col-md-3">
      <label for="marca">Marca</label>
      <input type="text" class="form-control" name="carro['marca']" value="<?php echo $carro['marca']; ?>">
    </div>



   <div class="form-group col-md-2">
      <label for="ano">Ano</label>
      <input type="number" class="form-control" name="carro['ano']" value="<?php echo $carro['ano']; ?>">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-5">
      <label for="datacad">Data de Cadastro</label>
      <input type="date" class="form-control" name="carro['datacad']" value="<?php echo $carro['datacad']; ?>">
    </div>
	<div class="form-group col-md-5">
      <label for="foto">Foto</label>
      <input type="file" class="form-control" name="carro['foto']" value="<?php echo '<img src="'.$carro['foto'].''; ?>">
    </div>
  </div>
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-secondary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

  


<?php include(FOOTER_TEMPLATE);
		
 ?>