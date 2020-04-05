



<!DOCTYPE html>
<html>
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
	
	
	
	
	
	
      
        <link rel="stylesheet" type="text/css" href="css/style.css">
    
        <script src="js/tabelaDados.js"></script>
        <script src="js/bibliotecaAjax.js"></script>

		
		
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
								<li class="drop with--one--item"><a href="form_livros.php">Cadastrar Livros</a></li>
								<li class="drop with--one--item"><a href="form_revistas.php">Cadastrar Revistas</a></li>
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
		

    </head>
	
    <body>
        
		 <br><br>
		 
        <div id="modal-wrapper" class="modal inputPoup popup">

            <form id="formPopup" class="modal-content animate" action='javascript:Atualizar("livro");'>

                <div class="imgcontainer">
                    <span onclick="popup();Cancelar()" class="close" title="Close PopUp">&times;</span>
                </div>

                <div class="container">
                    <input  type="text" placeholder="Nome do Livro" name="nome" required>  
                    <input  type="text" placeholder="Nome do Autor" name="autor" required> 
                    <input  type="text" placeholder="Editora" name="editora" required>           
                 
                    <input  type="text" placeholder="Ano de Publicação" name="anoPublicacao" required>        
                    <input  type="date" placeholder="Data de Aquisição" name="dataAquisicao" required>
                         
                    
                    <a  ><button type="submit" >ALTERAR LIVRO</button></a>

                </div>

            </form>

        </div>
       



        <div class="container">

        </div>

        <div id="livros"    align="center">
            <div id="avisos"></div>
            <form>
                <table id="minhaTabela" class="Table">

                    <tr class="cabecalho" >
                        <td><strong>LISTA DE LIVROS</strong></div>
                        </td>
                    </tr>
                    <tr class="cabecalho">
                        <td><strong >Código</strong></td>
                        <td><strong>Nome</strong></td>
                        <td><strong>Autor</strong></td>
                        <td><strong>Editora</strong></td>
                        <td><strong>Ano Publicação</strong></td>
                        <td ><strong>Data Aquisição</strong></td>

                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    <?php
                    include "conecta.php";

                    $res = mysqli_query($con, "SELECT * FROM livros");
                    $total = mysqli_num_rows($res);
                    for ($i = 0; $i < $total; $i++) {

                        $dados = mysqli_fetch_row($res);
                        $codigo = $dados[0];
                        $nome = $dados[1];
                        $autor = $dados[2];
                        $editora = $dados[3];
                        $anoPublicacao = $dados[4];
                        $dataAquisicao = $dados[5];

                        $idLinha = "linha$i";
                        echo "<tr id=\"$idLinha\" class='corLinha'>";
                        echo " <td>$codigo</td>";
                        echo " <td>$nome</td>";
                        echo " <td>$autor</td>";
                        echo " <td>$editora</td>";
                        echo " <td>$anoPublicacao</td>";
                        echo " <td>$dataAquisicao</td>";

                        echo " <td ><a href=\"#\" onclick=\"popup();EditarLinha('$idLinha','livro');\"><font size=5 color=#0000ff>✎</font></a></td>";
                        echo " <td ><a  href=\"#\" onclick=\"ExcluirLinha('$idLinha','livro');\"><font size=5 color=#FF0000>✖</a></td>";
                        echo "</tr>";
                    }
                    ?>

                </table>
            </form>
        </div>
        <div id="vazio" class="vazio"   >
            <script>
                Alert();
            </script>
            <a >Lista Vazia!</a>
        </div>

  
	
	</body>
</html>