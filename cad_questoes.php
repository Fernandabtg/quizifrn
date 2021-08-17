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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> QUIZ IFRN</title>
<link href="CSS.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div id="cima">
    <div id="logo">
     <a href="menu_adm.php"> <img  src="images/qilogo.png"></a>
    </div>
     
</div>
   <div id="centro">
   
        <?php
        include 'cequestoes.php';
       
        ?>
           
         
    </div>
  
    
    
</body>
</html>