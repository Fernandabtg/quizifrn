<?php
session_start();

#verifica se o usuario ja estiver logado
if (isset($_SESSION['email'])){
    Header("Location:menu.php");
}

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
       <a href="index.php"> <img  src="images/qilogo.png"></a>
    </div>
     
</div>
   <div id="centro">
        <div class="title">
            <h2>FAÇA SEU LOGIN</h2>
      <br> </div>
        <div id="form">
            <form action="verificarLogin.php" method="POST">
                <label>Email:</label>
                <input type="text" name="email"> <br>
                <br>
                <label>Senha:</label>
                <input type="password" name="senha"> <br>
             <br>
<a id="red" href="cadastro.php"> Ainda não possui cadastro? </a>
              
 </div> 
        <div id="botoes">
                <button class="Button">Entrar</button>
             </div>
  
</form>
</div> 
</body>
</html>