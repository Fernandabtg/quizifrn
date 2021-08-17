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
	$sql = "insert into provas (instituicao, ano) "
		." values (  '{$_POST['instituicao']}', '{$_POST['ano']}' ) ";
		

if (mysqli_query($con, $sql)){
	print 'sql= '.$sql;	
	print "<br><br>Salvo com sucesso!";
} else {
	print 'sql= '.$sql;	
	print "<br><br>Falha ao salvar.";
}
print "<br><br><a id='del' href='cad_provas.php'>Voltar</a>";
	
} else {
	$sql = "update provas set `instituicao`='{$_POST['instituicao']}',`ano`='{$_POST['ano']}' where id={$_POST['id']}";
	if (mysqli_query($con, $sql)){
		print 'sql= '.$sql;
		print "<br><br>Editado com sucesso!";
	} else {
		print 'sql= '.$sql;
		print "<br><br>Falha ao editar.";
}
	print "<br><br><a id='del' href='provas.php'>Voltar</a>";
	
}


?>
</div>

</div>
</body>
</html>