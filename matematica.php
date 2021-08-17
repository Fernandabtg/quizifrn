<?php
session_start();

#verifica se o usuario realmente esta logado
if ( isset($_SESSION['email']) == false ){
    Header("Location:login.php");
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
		    <a href="menu.php"> <img  src="images/qilogo.png"></a>
	</div>
	
</div>
	<div id="centro">
   		<div class="title">
			<h2>MATEMÁTICA</h2>
			</div>
			

	<form action="verificarQuestoes.php" method="POST">
		<input type='hidden' name='disciplina' value='qMatematica' /><div id="text">
		<div id="text">
		<?php

$contador = 0;
$nQuestoes = array();
$aux = '';
do{
    $nQuestao = rand(1,74);
    if(in_array($nQuestao,$nQuestoes)==false){
		$contador++;
        $nQuestoes[$contador] = $nQuestao;
		#$aux = $nQuestao." ".$aux;	
		$sql = "select * from qMatematica where id=".$nQuestao;
		$rs = mysqli_query($con, $sql);	

		while( $ln = mysqli_fetch_assoc($rs) ) {
			if($ln["imagem"] == ''){
				
				print "\n<label>$contador- ".$ln["questao"]."</label><br>";
				print "\n<label><input type='radio' value='alt1' name='alternativa".$ln["id"]."'  />".$ln["alt1"]."</label> <br/>"; 
				print "\n<label><input type='radio' value='alt2' name='alternativa".$ln["id"]."' />".$ln["alt2"]."</label> <br/>"; 
				print "\n<label><input type='radio' value='alt3' name='alternativa".$ln["id"]."'  />".$ln["alt3"]."</label> <br/>";
				print "\n<label><input type='radio' value='alt4' name='alternativa".$ln["id"]."'  />".$ln["alt4"]."</label> <br/>";
				if ($ln["alt5"] != '') {
				print "\n<label><input type='radio' value='alt5' name='alternativa".$ln["id"]."'  />".$ln["alt5"]."</label> <br/>";
				} print "<br><br>";
			} else{
			
				print "\n<label>$contador- ".$ln["questao"]."</label><br>";
				print "<img class='face' src='".$ln["imagem"]."'><br/>"; 
				print "\n<label><input type='radio' value='alt1' name='alternativa".$ln["id"]."'  />".$ln["alt1"]."</label> <br/>";
				print "\n<label><input type='radio' value='alt2' name='alternativa".$ln["id"]."' />".$ln["alt2"]."</label> <br/>";
				print "\n<label><input type='radio' value='alt3' name='alternativa".$ln["id"]."' />".$ln["alt3"]." </label> <br/>";
				print "\n<label><input type='radio' value='alt4' name='alternativa".$ln["id"]."' />".$ln["alt4"]." </label> <br/>";
				if ($ln["alt5"] != '') {
				print "\n<label><input type='radio' value='alt5' name='alternativa".$ln["id"]."' />".$ln["alt5"]."</label> <br/>";
				}
			
				print "<br><br>";

			}
		
		#$aux = $aux." ".$ln["id"];
		$aux = $ln["id"]." ".$aux;

			}
	}else{
		$nQuestao = rand(1,74);
	}
}while($contador < 10);

?> 
					<input type="hidden" name="questoes" value="<?=$aux?>" />
					<br><br>
					<?php
					$timezone  = 0; //(GMT -5:00) EST (U.S. & Canada) (gmt -4:00 -> br)
                        $horaInicial = gmdate(time() + 3600*($timezone+date("I")));

					print "<input type='hidden' name='horaInicial' value='{$horaInicial}' />";
					?>
					<div id="botoe">
            <input type="submit" value="Enviar" id="enviar" class="Button">   
                         </div>
				</form>
				</div>  
				</div>
			</div>
		</div>
	</body>
</html>
