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
<html >
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
  
        <div class="title">
            <h2>CADASTRAR RESOLUÇÃO</h2>
      <br/> <br/>  
        </div>
        <div id="form">
            <form action="salvar_resolucao.php" method="POST">
                <label>ID da questão: </label>
                <input type="text" name="idQuestao"> <br>
                 <br>
                <label>Disciplina:</label><br>
               <label> <input type="radio" name="disciplina" value ="rPortugues">Português </label>  <br>
               <label> <input type="radio" name="disciplina" value="rMatematica" >Matemática </label>
                <br><br>
            	<label>Explicação:</label> <br>
            	<textarea cols="30" rows="3" name="explicacao">  </textarea> <br> <br>
            	<label>Dificuldade: </label>
             <label>   <input type="radio" name="dificuldade" value="f">Fácil </label>  <br>
               <label>  <input type="radio" name="dificuldade" value="m">Mediana </label>
               <label>  <input type="radio" name="dificuldade" value="d">Dificil </label>
            	<br>
</div>

    <div id="botoes">
         <button class="Button">Cadastrar</button>
    </div>
            </form>  
    </div>
</body>
</html>