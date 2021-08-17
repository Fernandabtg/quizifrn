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
        if (isset($_GET['idProva']) && $_GET['idProva'] != ""){
            
            print '<div class="title">';
            print "<h2>EDITAR PROVA</h2>";
            print "<br> <br></div>";
            ///include 'conexao.php';

            $sql = "select * from provas where id = ".$_GET['idProva'];
            $rs = mysqli_query($con, $sql);
        
            $ln = mysqli_fetch_assoc($rs);
            print '<div id="form">
            <form action="salvar_prova.php" method="POST">
            <input type="hidden" name="id" value="'.$_GET['idProva'].'">
            	<label>Instituição: </label>
            	<input type="text" name="instituicao" value="'.$ln["instituicao"].'"> <br> <br>
            	<label>Ano: </label>
            	<input type="text" name="ano" value="'.$ln["ano"].'"> <br> 
</div>

    <div id="botoes">
         <button class="Button" name="acao" value="editar">Editar</button>
    </div>
            </form>';
            
        
        } else{
            
            print '<div class="title">';
            print "<h2>CADASTRAR PROVA</h2>";
            print "<br> <br></div>";
        
            
            print '<div id="form">
            <form action="salvar_prova.php" method="POST">
            	<label>Instituição: </label>
            	<input type="text" name="instituicao"> <br> <br>
            	<label>Ano: </label>
            	<input type="text" name="ano"> <br> 
</div>

    <div id="botoes">
         <button class="Button" name="acao" value="cadastrar">Cadastrar</button>
    </div>
            </form>';
            
        }
        ?>
   
   
   
               
    </div>
    </div>

    
    
</body>
</html>