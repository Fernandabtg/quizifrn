<?php
#CÓDIGO PARA EXEMPLO
include 'conexao.php';


#converto o array com disciplinas selecionadas
#em uma string separando por ;
#PEOO;PDS;BD;
if (val($_POST,'disciplinas') != ""){
	$disciplinas = implode(";", val($_POST,'disciplinas'));
} else {
	$disciplinas = "";
}
#converto a senha para ficar encriptada no banco de dados
$senha = sha1($_POST['senha']);





if (isset($_POST["id"]) && $_POST['id'] != ""){

	$sql = "update usuarios "
		  ." set "
		  ." nome = '{$_POST['nome']}', " 
		  ." email = '{$_POST['email']}', "
		  ." senha = '{$_POST['senha']}', "
		  ." sexo = '{$_POST['sexo']}', "
		  ." turno = '{$_POST['turno']}', "
		  ." obs = '{$_POST['obs']}', "
		  ." disciplina = '$disciplinas' " #havia um erro aqui, estava com o campo 'disciplinas' que não existe
		  ." where id = {$_POST['id']}";

	
	mysqli_query($con, $sql);
	Header("Location:form.php");

} else {

$sql = "insert into usuarios (nome,email,turno,obs,senha,sexo,disciplina) "
		." values "
		." ( '{$_POST['nome']}', '{$_POST['email']}','{$_POST['turno']}','{$_POST['obs']}', "
		."   '$senha', '{$_POST['sexo']}', '$disciplinas' ) ";
		
#print $sql;
		
#executa o SQL
if (mysqli_query($con, $sql)){
	print "Salvo com sucesso!.";
} else {
	print "Falha ao salvar.";
}
print "<a href='form.php'>Voltar</a>";


#print "<pre>";
#print_r($_POST);


#print $_REQUEST["sexo"];


}
