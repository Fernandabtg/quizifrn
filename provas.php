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

           
                <div class="title">
                    <h2>PROVAS </h2>
                </div>
                    <br>
                    <br>
                    	
<?php


print "\n<div id='text'>";
print "\n<table class='lista'>";
print "\n<tr>";
print "\n<th> Editar </th>";
print "\n<th> ID </th>";
print "\n<th> Instituição </th>";
print "\n<th> Prova </th>";
print "\n<th> Deletar </th>";
print "\n</tr>";

$sql = "SELECT * FROM provas";
$rs = mysqli_query($con, $sql); 
$nresultados = mysqli_num_rows($rs);

print "\n<tr>Total de resultados: $nresultados</tr>";


while( $ln = mysqli_fetch_assoc($rs) ) {

print "\n<tr>";
print "\n<td><a href='cad_provas.php?idProva={$ln['id']}'> Editar </a></td>";
print "\n<td>".$ln["id"]."</td>";
print "\n<td>".$ln["instituicao"]."</td>";
print "\n<td>".$ln["ano"]."</td>";
print "\n<td><a href='deletar.php?idProva={$ln['id']}'> Deletar </a></td>";
print "\n</tr>";


}

print "\n</table> \n</div>";
?>
			 <div id="botoes">     
                <a href="menu_adm.php"><button class="Button" >Voltar</button></a>
            </div> 
            </div> 
 </body>
</html>