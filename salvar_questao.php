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
         
   <div id="divmedia">
        
<?php
include 'conexao.php';

if ($_POST['acao'] == 'cadastrar'){

	$sql = "insert into {$_POST['disciplina']} (questao, alt1, alt2, alt3, alt4, alt5, altCorreta, idProva, imagem) "
	." values "
	." ( '{$_POST['questao']}', '{$_POST['alt1']}','{$_POST['alt2']}','{$_POST['alt3']}','{$_POST['alt4']}', "
	."   '{$_POST['alt5']}', '{$_POST['altCorreta']}', '{$_POST['idProva']}', '{$_POST['endImagem']}' ) ";
	

	if (mysqli_query($con, $sql)){
		print 'sql= '.$sql;
		print "<br><br>Salvo com sucesso!";
	} else {
		print 'sql= '.$sql;
		print "<br><br>Falha ao salvar.";
	}
	print "<br><br><a href='cad_questoes.php'>Voltar</a>";

} else {


	$sql = "UPDATE {$_POST['disciplina']} SET `questao`='{$_POST['questao']}',`alt1`='{$_POST['alt1']}',
	`alt2`='{$_POST['alt2']}',`alt3`='{$_POST['alt3']}',`alt4`='{$_POST['alt4']}',
	`alt5`='{$_POST['alt5']}',`altCorreta`='{$_POST['altCorreta']}',`idProva`='{$_POST['idProva']}',`imagem`='{$_POST['endImagem']}'
	 WHERE id = '{$_POST['id']}'";
	
	if (mysqli_query($con, $sql)){
		print 'sql= '.$sql;
		print "<br><br>Salvo com sucesso!";
	} else {
		print 'sql= '.$sql;
		print "<br><br>Falha ao salvar.";
	}
	print "<br><br><a id='del' href='cad_questoes.php'>Voltar</a>";

}

?>
</div>

</div>
</body>
</html>