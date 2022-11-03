<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>CRUD com Bootstrap</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
		<style>
			body {
				padding-top: 50px;
				padding-bottom: 20px;
			}
			.btn-light, .btn-default, input, select {
				color: #FFF;
				background-color:#7914C7;
			}
			.btn-light:hover, .btn-default:hover {
				color: #FFF;
				background-color: #8916E0;
			}
			.btn-secondary {
				color: #FFF;
				background-color:  #6210A1 ;
			}
			.btn-secondary:hover {
				color: #FFF;
				background-color: #9118ED;
			}
			.btn-dark{
				color: #FFF;
				background-color:#6A0599 ;
			}
			.btn-dark:hover {
				color: #FFF;
				background-color: #8916E0;
			}
			header, #actions, h2{
				margin-top: 10px;
				
			}
			.navbar, li{
				background-color: #6210A1;
				align: center;
			}
			.dropdown-item{
				color: white;
			}
			table{ 
				background:#6210A1; 
				border-style: solid; 
			}
			td,th{
				color: #FFF;
			}
			
			
		</style>
		
		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
	</head>
	<body>
		
		<nav class="navbar navbar-expand-sm  navbar-dark fixed-top">
		  <div class="container-fluid">
		  
			<a class="navbar-brand" href="<?php echo BASEURL; ?>"><i class="fa-solid fa-house-chimney"></i> Início</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
			  <ul class="navbar-nav">
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-users"></i>  Clientes</a>
				  <ul class="dropdown-menu">
					<li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers/add.php"><i class="fa-solid fa-user-plus"></i>Adicionar usuários</a></li>
					<li><a class="dropdown-item"  href="<?php echo BASEURL; ?>customers"><i class="fa-solid fa-users"></i> Clientes</a></li>
				  </ul>
				</li>
			  </ul>
			  <ul class="navbar-nav">
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-car"></i> Carros</a>
				  <ul class="dropdown-menu">
					<li><a class="dropdown-item" href="<?php echo BASEURL; ?>carro/add.php"><i class="fa-solid fa-car-on"></i>Adicionar carros</a></li>
					<li><a class="dropdown-item"  href="<?php echo BASEURL; ?>carro"><i class="fa-solid fa-car"></i> Carros</a></li>
				  </ul>
				</li>
			  </ul>
			</div>
			
			  
			
			
		  </div>
		</nav>
		
    <main class="container">