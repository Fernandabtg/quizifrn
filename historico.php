<?php
session_start();

#verifica se o usuario realmente esta logado
#verifica se o usuario realmente esta logado
if ( isset($_SESSION['email']) == false ){
    Header("Location:login.php");
}



include 'conexao.php';

if (isset($_GET["resultados"]) && $_GET['resultados'] != ""){
    #busco no banco a pessoa com aquela ID
    $sql = "select * from ".$_GET["resultados"];
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
                  <a href="menu.php"> <img  src="images/qilogo.png"></a>
            </div>
        </div>
        <div id="centro">
           
                <div class="title1">
                    <h2>
                        <a href='historico.php?resultados=resultadoSimulado'>SIMULADOS</a>
                         OU
                        <a href='historico.php?resultados=resultados'>QUESTÕES</a>
                    </h2>
                    <hr>
                </div>
            
<?php
if(isset($_GET['resultados'])){
    if($_GET['resultados'] == 'resultadoSimulado'){
        print "\n<div class='title'><h2>Historico de simulados</h2><br><br></div>";
	    print "\n<table class='lista'>";
	    print "\n<tr>";
	    print "\n<th> N° acertos - Português:</th> ";
    	print "\n<th > N° acertos - Matemática: </th>";
    	print "\n<th > IDs das questões - Português: </th>";
	    print "\n<th > IDs das questões - Matemática: </th>";
    	print "\n<th > Tempo: </th>";
	    print "\n<th > Data: </th>";
	    print "\n</tr>";

    	$sql = "select * from resultadoSimulado where idUsuario = {$_SESSION['id']}";
        $rs = mysqli_query($con, $sql);


        while( $ln = mysqli_fetch_assoc($rs) ) {

            $tempoGasto = gmdate("H:i:s", $ln["tempo"]);
            
            print "\n<tr>";
        	print "\n<td><p>".$ln["acertosPort"]."</p> </td>" ;
        	print "\n<td><p>".$ln["acertosMat"]."</p> </td>";
    	    print "\n<td><p>".$ln["questoesPort"]."</p> </td>";
    		print "\n<td><p>".$ln["questoesMat"]."</p> </td>";
        	print "\n<td>".$tempoGasto."</td>";
		    print "\n<td>".$ln["data"]."</td>";
    	    print "\n</tr>";
        }
        print "\n</table>\n<br><br><br>";
    } else{
        print "\n<div class='title'><h2>Historico de questões</h2><br><br></div>";
        print "\n<table class='lista'>";
        print "\n<tr>";
        print "\n<th> Disciplina:</th> ";
        print "\n<th > Número de acertos: </th>";
        print "\n<th > IDs das questões: </th>";
        print "\n<th > Data: </th>";
        print "\n</tr>";
    
        $sql = "select * from resultados where idUsuario = {$_SESSION['id']}";
        $rs = mysqli_query($con, $sql);
        
        while( $ln = mysqli_fetch_assoc($rs) ) {
                if ($ln["disciplina"] == "p") {
                    $disciplina = "Português";
                } else{
                    $disciplina = "Matemática";
                }
                print "\n<tr>";
                print "\n<td><p>".$disciplina."</p> </td>" ;
                print "\n<td><p>".$ln["totalAcertos"]."</p> </td>";
                print "\n<td><p>".$ln["questoes"]."</p> </td>";
                print "\n<td>".$ln["dia"]."</td>";
                print "\n</tr>";
            }        
        print "\n</table>\n<br><br><br>";
    }
}
?> 
              
            <div id="botoes">     
                <a href="menu.php"><button class="Button" >Voltar</button></a>
            </div> </div>
      
    </body>
</html>