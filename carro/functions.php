<?php

require_once('../config.php');
require_once(DBAPI);


$carros = null;
$carro = null;

/**
 *  Listagem de Clientes
 */
function index() {
	global $carros;
	

  if (!empty($_POST['cars'])){
      $carros= filter("carros", "modelo like '%" . $_POST['cars'] . "%'");
  } else {
    $carros = find_all('carros');
  }
}


function add() {

  if (!empty($_POST['carro'])) {
    
    $today = new DateTime("now");
     // date_create('now', new DateTimeZone('America/Sao_Paulo'));

    $carro = $_POST['carro'];
    
    save('carros', $carro);
	//$target_dir = "imagens/";
	$target_dir = "C:\xampp\htdocs\crud-bootstrap-php\carro/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
$check = getimagesize($_FILES["foto"]["tmp_name"]);
if($check !== false) {
echo "O arquivo é uma imagem - " . $check["mime"] . ".";
$uploadOk = 1;
} else {
echo "O arquivo não é imagem.";
$uploadOk = 0;
}
}

// Check file size
if ($_FILES["foto"]["size"] > 5000000) {
echo "Desculpe, seu arquivo é muito grande.";
$uploadOk = 0;
}



// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Desculpe, somente arquivos JPG, JPEG, PNG & GIF são aceitos.";
$uploadOk = 0;
}





 if ($uploadOk == 1) {
if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
echo "O upload de ". htmlspecialchars( basename( $_FILES["foto"]["name"])). " foi concluído.<br>";
$foto = basename ( $_FILES["foto"]["name"]);
				 // criando a linha de INSERT
$sqlinsert =  "insert into carros( foto)values ( '$foto')";

} else {
echo "Desculpe, ocorreu um erro ao fazer o upload do seu arquivo.";
}
}

    header('location: index.php');
  }
}

function edit() {

  $today = new DateTime("now");
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  if (isset($_GET['id'])) {

    $id = $_GET['id'];
    if (isset($_POST['carro'])) {

      $carro = $_POST['carro'];
      update('carros', $id, $carro);
      header('location: index.php');
    } else {

      global $carro;
      $carro = find('carros', $id);
    } 
  } else {
    header('location: index.php');
  }
}

function view($id = null) {
  global $carro;
  $carro = find('carros', $id);
}
function filtro($marca = null) {
  global $carro;
  $carro = find('carros', $marca);
}

function delete($id = null) {

  global $carros;
  $carros = remove('carros', $id);
  header('location: index.php');
}


	function clear_messages() {

		$_SESSION['type'] = "";
		$_SESSION['message'] = "";
	}
?>