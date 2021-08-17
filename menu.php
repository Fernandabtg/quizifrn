<?php
session_start();

#verifica se o usuario realmente esta logado
if ( isset($_SESSION['email']) == false ){
    Header("Location:login.php");
}



include 'conexao.php';
?>
<html>
<head>
	<meta charset="utf-8">
		<title>QUIZ IFRN</title>
		<link rel="stylesheet" type="text/css" href="CSS.css">

</head>
<body>
<div id="cima">
	<div id="logo">
		<img src="images/qilogo.png">
	</div>
	 <div id="main" class="fix">
        	<ul class="clear">
        		<li><a href="historico.php"><span>Historico</span></a> </li>
				<?php
				print '<li><a href="cadastro.php?idUsuario='.$_SESSION['id'].'"><span>Editar meus dados</span></a></li>';
				?>                
                 <li><a href="sobre.php"><span>Sobre nós</span></a></li>
                <li><a href="sair.php"><span>Sair</span></a></li>
             	
            </ul>
        </div>
</div>
<div id="centro">
		<div class="title">
			<h2>MENU</h2>
	</div> 

	<div id="menu">
			 <ul class="menu">
        <li><a href="portugues.php">Português</a></li>
        <li><a href="matematica.php">Matemática</a></li>
        <li><a href="simulado.php">Simulado</a></li>                
</ul>	
</div>
	</div>
</body>
</html>