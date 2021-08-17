<?php

session_start();

#iportando a conexao com o banco duh
include 'conexao.php';
#iniciando variavel que contara o acertos do usuario
$acertosP = 0;
$acertosM = 0;
$questoesM = "";
$questoesP = "";
#pegando os ids das questoes que foram respondidas e os colocando em um array
$questoes = explode(" ", $_POST['questoes']);
#for para percorrer o array dos ids
/*
print $_POST['questoes']."\n";
print "".count($questoes)."\n";
print "".count($questoes)-2;
print_r($questoes);
*/
for ($i=0; $i <= count($questoes)-2; $i++) { 

	if($i < 20){
		$questoesM = $questoes[$i].";".$questoesM;
		#selecionando a questao no banco que corresponde ao id da possicao i do array e o $_POST['disciplina'] serve para saber qual foi a disciplina e poder usar a tabela correspondente
		$sql = "select * from qMatematica  where id=".$questoes[$i];
		#executando o sql

		$rs = mysqli_query($con, $sql);
		#armazenando os resultados da selecao
		$ln = mysqli_fetch_assoc($rs);	

#///print 'correta: '.$ln['altCorreta'].' id: '.$ln['id'].'\n';
#///print 'marquei: '.$_POST['alternativa'.$questoes[$i]].' id: '.$questoes[$i];
#///die();
			#verificando se a alternativa correta bate com a alternativa que o usuario marcou
		if ($ln['altCorreta'] == $_POST['alternativa'.$questoes[$i]]) {
			#contabilizando o acerto do usuario
			$acertosM++;
		}
	} else{
		$questoesP = $questoes[$i].";".$questoesP;
		#selecionando a questao no banco que corresponde ao id da possicao i do array e o $_POST['disciplina'] serve para saber qual foi a disciplina e poder usar a tabela correspondente
		$sql = "select * from qPortugues  where id=".$questoes[$i];
		#executando o sql
		$rs = mysqli_query($con, $sql);
		#armazenando os resultados da selecao
		$ln = mysqli_fetch_assoc($rs);	

#///print 'correta: '.$ln['altCorreta'].' id: '.$ln['id'].'<br>';
#///print 'marquei: '.$_POST['alternativa'.$questoes[$i]].' id: '.$questoes[$i]."<br>";
#///die();
		#verificando se a alternativa correta bate com a alternativa que o usuario marcou
		if ($ln['altCorreta'] == $_POST['alternativa'.$questoes[$i]]) {
			#contabilizando o acerto do usuario
			$acertosP++;
		}
	}
}
	# !!! mudar forma de visualizar o resutado !!!

#print "resquest sever: ".$_SERVER['REQUEST_TIME'];
#print "tempo: ".$tempo;
	
	#pegando o timestamp do momento em que a página foi requisitada ao servidor (tempo em segundos)
	$tempoFinal = $_SERVER['REQUEST_TIME'];

	#pegando o tempo em que o simulado começou (tempo em segundos)
	$tempoInicial = $_POST['horaInicial'];
	
	#tempo usado pelo usuario para responder o simulado (tempo em segundos)
	$tempoGasto = $_SERVER['REQUEST_TIME'] - $tempoInicial;
	  
	#convertendo o tempo em hora, minuto e segundo
	$horas = gmdate("H", $tempoGasto);
	$minutos = gmdate("i", $tempoGasto);
	$segundos = gmdate("s", $tempoGasto);
	   
	#mostrando os resultados ao usuario
	/*print "Total de acertos em Português: ".$acertosP;
	print "<br>";
	print "Total de acertos em Matemática: ".$acertosM;
	print "<br>";
	print "Tempo: {$horas}h{$minutos}min{$segundos}s";
	print "<br>";
	print "<a href='menu.php'>Voltar</a>";
	*/

	$timezone  = -4; //(GMT -5:00) EST (U.S. & Canada)
	$horario = gmdate("H:i:s", time() + 3600*($timezone+date("I")));
	$data = gmdate("j-m-Y");
	$tempo = "{$horas}:{$minutos}:{$segundos}";
	#converto o array com as questoes selecionadas em uma string separando por ;
	#ex: 24;44;12;
if ($questoes != ""){
	$quest = implode(";", $questoes);
} else {
	$quest = "";
}
	#inserindo os resultados do usurio no banco
	$sql = "insert into `resultadoSimulado`(`idUsuario`, `acertosPort`, `acertosMat`, `questoesPort`,
	`questoesMat`, `data`, `hora`, `tempo`) values ({$_SESSION['id']}, 
	{$acertosP}, {$acertosM}, '{$questoesP}', '{$questoesM}', '{$data}', '{$horario}', '{$tempoGasto}')";


	#executando o sql
	$rs = mysqli_query($con, $sql);
?>
<html>
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

		</div>
		<div id="centro">
			<div id="welcome" class="welc">
        		<div class="title">
            		<h2>Resultado</h2>
					<br>  					  
					<hr>
					<br>
					<?php
							print "<p>Total de acertos em Português: {$acertosP}</p>";
							print "<p>Total de acertos em Matemática: {$acertosM}</p>";
							print "<p>Tempo: {$horas}h{$minutos}min{$segundos}s</p>"; 
					?>
				</div> 
				<div id="botoes">
					<a href='menu.php'><button class="Button">Voltar</button></a>
				</div>
				<br>
			</div>
		</div> 
</body>
</html>
