<?php
session_start();

#verifica se o usuario realmente esta logado
if ( isset($_SESSION['email']) == false ){
    Header("Location:login.php");
} 



include 'conexao.php';
?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> QUIZ IF</title>
<link href="CSS.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div id="header" class="cima">
    <div id="logo">
        <img src="images/qilogo.png">
    </div>
     <div id="main" class="fix">
            <ul class="clear">
                <?php
                    if ($_SESSION["admin"]) {
                        $menu = "menu_adm.php";
                    } else {
                        $menu = "menu.php";
                    }
                ?>
                <li><a href="<?print $menu?>"><span>Inicio</span></a></li>
                <li><a href="?"><span>Sobre</span></a></li>
                <li><a href="?"><span>Contato</span></a></li>
              
            </ul>
        </div>
</div>
   <div id="centro">
    <div id="welcome" class="welc">
        <div class="title">
            <h2>Configurações</h2>
      <br> <br>  </div>
<h1>~em desenvolvimento~</h1>
 
</div>
</div>

    
    
</body>
</html>