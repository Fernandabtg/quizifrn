<?php
session_start();
include 'conexao.php';

#converte a senha, pois ela está codificada com sha1 no bd
$senha = sha1($_POST['senha']);

#pesquisa no bd o usuário com o email e senha correspondente aos inseridos no form de login
$sql = "select * from usuarios "
	 ." where email = '{$_POST['email']}' and "
	 ." senha = '$senha' ";

	 
#' or 1=1 or email = '
#print $sql;
#die;
	  
	  
	  

$rs = mysqli_query($con, $sql);

#armazena os dados na sessão, caso o sql tenha retornado resultado
if (mysqli_num_rows($rs) > 0){
	
	$rw = mysqli_fetch_assoc($rs);
	
	$_SESSION['id'] = $rw['id'];
	$_SESSION['nome']  = $rw['nome'];
	$_SESSION['admin']  = $rw['admin'];
	$_SESSION['cotista']  = $rw['cotista'];
	$_SESSION['genero']  = $rw['genero'];
	$_SESSION['dataNascimento']  = $rw['dataNascimento'];
	$_SESSION['email']  = $rw['email'];

	#verifica o tipo de usuário e o encaminha para o menu correspondente
	if ($_SESSION['admin'] == 1) {
	Header("Location:menu_adm.php");
	} else {
		Header("Location:menu.php");
	}
	

	
} else {
	#se não houver resultado da pesquisa sql, o usuário será mandado para a tela de login
	unset($_SESSION['id']);
	unset($_SESSION['nome']);
	unset($_SESSION['admin']);
	unset($_SESSION['cotista']);
	unset($_SESSION['genero']);
	unset($_SESSION['dataNascimento']);
	unset($_SESSION['email']);
	
	$_SESSION['msg'] = "Falha no login.";
	
	Header("Location:login.php");
	
}
?>