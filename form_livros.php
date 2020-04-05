<!doctype html>
<html class="no-js" lang="pt">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Sebo Cultural</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">

	<!-- Cusom css -->
   <link rel="stylesheet" href="css/custom.css">

	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="index.php">
								<img src="images/logo/logo.png" alt="logo images">
							</a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
								<li class="drop with--one--item"><a href="form_revistas.php">Cadastrar Revistas</a></li>
								<li class="drop with--one--item"><a href="mostraLivro.php">Listar Livros</a></li>
								<li class="drop with--one--item"><a href="mostraRevista.php">Listar Revistas</a></li>
								
								
								
								
								
						</nav>
					</div>
					
				<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
						
						
						
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->	
			</div>		
		</header>
	


<br><br><br><br>
<div class="row">
	<div class="col-lg-8 mx-auto">

		<table align="center">
	
	
			

		

					<legend>Cadastro de Livro</legend>
					  
		
	<div class="row">
	<div class="col-lg-8 mx-auto">

		<table align="center">
            <form  class="form-contact" method="post" tabindex="1" action="Factory.php?intens=livros"  >
			<div class="form-group">
                <input name="nome" class="form-control" placeholder="Nome do Livro" type="text" required>
			</div> 
			<div class="form-group">
                <input name="dataAq" class="form-control" placeholder="Data de Aquisição" type="date" required>
			</div> 
				<div class="form-group">
                <textarea name="listAutores" class="form-control" placeholder="Lista de autores" class="materialize-textarea" required></textarea>
			</div> 
				<div class="form-group">
                <input name="nomeEditora" class="form-control" placeholder="Nome Editora" type="text" required>
			</div> 

				<div class="form-group">
                <input name="anoPub" class="form-control" placeholder="Ano de publicação" type="text" required>
			</div> 

                <div class="botoes" >
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <button type="button" name="Voltar" onclick="history.back();" value="Voltar" class="btn btn-primary">Voltar</button>
			 </div>  
					 

				
			</form>
        </div>

        <?php
//factory Itens
if(isset($_COOKIE['cadastrouu'])){
   echo    "<script>alert('livro cadastrado com sucesso!');</script>";
}
?>



<!-- JS Files -->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>

    </body>
</html>