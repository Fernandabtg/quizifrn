<?php
include 'conexao.php';

$sql = "insert into {$_POST['disciplina']} (idQuestao, explicacao, dificuldade) "
		." values "
		." ( '{$_POST['idQuestao']}', '{$_POST['explicacao']}','{$_POST['dificuldade']}' ) ";
		

if (mysqli_query($con, $sql)){
	print "Salvo com sucesso!";
} else {
	print "Falha ao salvar.";
}
print "<a href='cad_resolucoes.php'>Voltar</a>";


#print "<pre>";
#print_r($_POST);
