<?php
session_start();

#verifica se o usuario realmente esta logado
if ( isset($_SESSION['email']) == false ){
    Header("Location:login.php");
} else{
	if ($_SESSION['admin'] == 0) {
		Header("Location:menu.php");
	}
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
           	
            <li><a href="sair.php"><span> Sair </span></a></li>
              
            </ul>
        </div>
</div>
<div id="centro">
			<div class="title">
			<h2>MENU - ADMIN</h2>
	</div> 
	
		<div id="menu">
			 <ul class="menu">
        <li><a href="usuario.php">Usuários</a></li>
        <li><a href="questoes.php">Questões</a></li>
        <li><a href="provas.php">Provas</a></li>
            <li><a href="#">Cadastrar</a>
                     <ul>
                      <li><a href="cad_questoes.php">Questões</a></li>
                      <li><a href="cad_provas.php">Provas</a></li>
					  <?php
					  /*<li><a href="cad_resolucoes.php">Resolução</a></li>*/
					  ?>                    
                </ul>
            </li>
  </ul>
</div>
	</div>
</body>
</html>