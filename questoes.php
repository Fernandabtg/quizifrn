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

/*if (isset($_GET["materia"]) && $_GET['materia'] != ""){
    #busco no banco s questoes dessa disciplina
    #$sql = "select * from ".$_GET["materia"];
    if($_GET["materia"] == "qPortugues"){
#        isset($_GET["pesquisa"]) && $_GET['pesquisa'] != ""
    } else {

    }
}*/

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
          
            <div class="title1">
                <h2>
                    <a href='questoes.php?materia=qPortugues'>PORTUGUÊS</a>
                    OU
                    <a href='questoes.php?materia=qMatematica'>MATEMÁTICA</a>
                    </h2>
                    <hr>
            </div>
            
            <form action="questoes.php?" method="GET">
	        <div>
		        <input name="pesquisa" placeholder="Pesquisar questão" />
                <label> <input type="radio" name="materia" value="qPortugues" >Português  </label>
            	<label> <input type="radio" name="materia" value="qMatematica" >Matemática </label>
                <button type="submit" id="del">Pesquisar</button>
	        </div>
            </form>
            <br>
            <br>
            <hr>
            <br>
            <br>
            

<?php

include 'pesquisa.php';


/*print "<div id='text'>";
print "<table class='lista'>";
print "<tr>";
print "<th> Editar </th>";
#print "<th> Materia </th> ";
print "<th> Pergunta </th>";
print "<th> Deletar </th>";
print "</tr>";

if(isset($_GET['materia'])){
    if($_GET['materia'] == 'qPortugues'){
        print "\n<div class='title'><h2>Questões de Português</h2><br/><br/></div>";
    } else{
        print "\n<div class='title'><h2>Questões de Matemática</h2><br/><br/></div>";
    }
    #$sql = "select * from (qPortugues inner join provas on qPortugues.idProva = provas.id)inner join rPortugues on qPortugues.id = rPortugues.idQuestao ";

$rs = mysqli_query($con, $sql); 
while( $ln = mysqli_fetch_assoc($rs) ) {
#id 	questao 	alt1 	alt2 	alt3 	alt4 	alt5 	altCorreta 	idProva 	imagem 	id 	instituicao 	ano 	idQuestao 	explicacao 	dificuldade 	
/*if ($ln["dificuldade"] == "f") {
	$dificuldade = "Facil";
} elseif ($ln["dificuldade"] == "m") {
	$dificuldade = "Media";
} else {
	$dificuldade = "Dificil";
}
print "<tr>";
print "<td><a href='questoes.php?questao={$ln["id"]}?materia={$_GET['materia']}'> Editar </a></td>";
print "<td>".substr($ln["questao"],0,100)."</td>";
print "<td><a href='deletar.php?questao={$ln["id"]}?materia={$_GET['materia']}'> Deletar </a></td>";
print "</tr>";


}

}
print "</table> </div>";*/
?> 
        
            <div id="botoes">     
                <a href="menu_adm.php"><button class="Button" >Voltar</button></a>
            </div> 
        </div> 
    </body>
</html>

          




