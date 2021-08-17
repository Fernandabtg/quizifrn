<?php
session_start();

#verifica se o usuario ja estiver logado
if ( isset($_SESSION['email']) == true && isset($_GET['idUsuario']) == false ){
  Header("Location:menu_adm.php");
}

include 'conexao.php';



?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> QUIZ IFRN</title>
<link href="CSS.css" rel="stylesheet" type="text/css" media="all" />
<script text="text/javascript" src="validacaoCadastro.js"></script>
</head>
<body onload="carregarVariaveis()">
<div id="cima">
    <div id="logo">
        <a href="index.php"> <img  src="images/qilogo.png"></a>
    </div>
    
</div>
   <div id="centro">

      <?php
        include 'ceusuarios.php';
       
        ?>
</div>
  
</body>
</html>