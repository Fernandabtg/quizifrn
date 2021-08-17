<?php

include 'conexao.php';

if (isset($_POST['senhaAntiga']) && $_POST['senhaAntiga'] != ""){

print '<html>
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
         
   <div id="divmedia">';

	
	if($_POST['senhaConfirm'] != ''){
		$senha = sha1($_POST['senhaConfirm']);
	} else {
		$senha = $_POST['senhaAntiga'];
	}

	$sql = "UPDATE usuarios SET `nome`='{$_POST['nome']}',`email`='{$_POST['email']}',
	`dataNascimento`='{$_POST['nasc']}',`genero`='{$_POST['genero']}',`cotista`='{$_POST['escola']}',
	`admin`='{$_POST['admin']}',`senha`='$senha'
	 WHERE id = '{$_POST['idUsuario']}'";
	if (mysqli_query($con, $sql)){
		print 'sql= '.$sql;
		print "<br><br>Salvo com sucesso!";
	} else {
		print 'sql= '.$sql;
		print "<br><br>Falha ao salvar.";
	}
	print "<br><br><a id='del' href='menu_adm.php'>Voltar</a>";
    print '</div>

</div>
</body>
</html>';

} else {
	
#converto a senha para ficar encriptada no bd
$senha = sha1($_POST['senhaConfirm']);

#insiro as valores do form na tabela dos usuarios 
$sql = "insert into usuarios (nome, email, dataNascimento, admin, cotista, genero, senha) "
		." values "
		." ( '{$_POST['nome']}', '{$_POST['email']}','{$_POST['nasc']}','0','{$_POST['escola']}', "
		."   '{$_POST['genero']}', '$senha' ) ";
		

if (mysqli_query($con, $sql)){
	#se o usuario for salvo, então será redirecionado a tela de login
	#print "Salvo com sucesso!";
	Header("Location:login.php");

} else {
	#caso contrario, ele será mandado de volta á tela de cadastro
	#print "Falha ao salvar.";
	#print 'sql= '.$sql;
	Header("Location:cadastro.php");

}


}



?>



