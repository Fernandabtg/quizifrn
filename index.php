<?php
session_start();

#se o usuario ja estiver logado
if (isset($_SESSION['email'])){
	if ($_SESSION['admin']) {
		    Header("Location:menu_adm.php");
	} else {
	    Header("Location:menu.php");
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> QUIZ IFRN</title>
		<link href="CSS.css" rel="stylesheet" type="text/css" media="all" />
	</head>
	<body>
		<div id="cima">
			<div id="logo">
				<img src="images/qilogo.png">
			</div>
			
		</div>
		<div id="centro">
					
					<div class="title">
						<h2>Bem-vindo ao QUIZ IFRN</h2>
						<span class="byline">Estude português e matemática de forma prática e rápida</span>
					</div>
			
			<div id="botoes">
					<a href="login.php" class="Button">Entrar</a>
					<a href="cadastro.php" class="Button">Cadastrar</a>
				</div>
			</div>
		
	</body>
</html>
