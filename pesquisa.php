<?php
/*
#verifica se o usuario realmente esta logado
if ( isset($_SESSION['email']) == false ){
    Header("Location:login.php");
} else{
	if ($_SESSION['admin'] == 0) {
		Header("Location:menu.php");
	}
}

*/

#include 'conexao.php';

function mostrarQuestoes($sql) {
    include 'conexao.php';
    
        if($_GET['materia'] == 'qPortugues'){
            print "\n<div class='title'><h2>Questões de Português</h2><br><br></div>";
        } else{
            print "\n<div class='title'><h2>Questões de Matemática</h2><br><br></div>";
        }

        print "\n<div id='text'>";
        print "\n<table class='lista'>";
        print "\n<tr>";
        print "\n<th> Editar </th>";
        print "\n<th> questao </th>";
        print "\n<th> Deletar </th>";
        print "\n</tr>";
        
    $rs = mysqli_query($con, $sql); 
    $nresultados = mysqli_num_rows($rs);
    
    print "\n<tr>Total de resultados: $nresultados</tr>";


    while( $ln = mysqli_fetch_assoc($rs) ) {

    print "\n<tr>";
    print "\n<td><a href='cad_questoes.php?questao={$ln['id']}&materia={$_GET['materia']}'> Editar </a></td>";
    print "\n<td>".substr($ln["questao"],0,100)."</td>";
    print "\n<td><a href='deletar.php?questao={$ln['id']}&materia={$_GET['materia']}'> Deletar </a></td>";
    print "\n</tr>";
    
    
    }
    
    print "\n</table> \n</div>";
}

function mostrarQuestoesPM($sqlP, $sqlM) {
    include 'conexao.php';
    
    print "\n<div class='title'><h2>Questões</h2><br><br></div>";

    print "\n<div id='text'>";
    print "\n<table class='lista'>";
    print "\n<tr>";
    print "\n<th> Editar </th>";
    print "\n<th> Disciplina </th>";
    print "\n<th> Questao </th>";
    print "\n<th> Deletar </th>";
    print "\n</tr>";

    $rsP = mysqli_query($con, $sqlP);
    $nresultadosP = mysqli_num_rows($rsP);

    $rsM = mysqli_query($con, $sqlM);
    $nresultadosM = mysqli_num_rows($rsM);


    $total = $nresultadosP+$nresultadosM;
    print "\n<tr>Total de resultados: $total</tr>";

    while( $ln = mysqli_fetch_assoc($rsP) ) {

    print "\n<tr>";
    print "\n<td><a href='cad_questoes.php?questao={$ln["id"]}&materia=qPortugues'> Editar </a></td>";
    print "\n<td> Português </td>";
    print "\n<td>".substr($ln["questao"],0,100)."</td>";
    print "\n<td><a href='deletar.php?questao={$ln["id"]}&materia=qPortugues'> Deletar </a></td>";
    print "\n</tr>";
    
    
    }

    while( $ln = mysqli_fetch_assoc($rsM) ) {

    print "\n<tr>";
    print "\n<td><a href='cad_questoes.php?questao={$ln["id"]}&materia=qMatematica'> Editar </a></td>";
    print "\n<td> Matemática </td>";
    print "\n<td>".substr($ln["questao"],0,100)."</td>";
    print "\n<td><a href='deletar.php?questao={$ln["id"]}&materia=qMatematica'> Deletar </a></td>";
    print "\n</tr>";
    
    
    }

    print "\n</table> \n</div>";

}




if (isset($_GET['materia']) && $_GET['materia'] != ""){
    if($_GET['materia'] == 'qPortugues'){
        if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != ""){
            $query = "select * from ".$_GET['materia']." where questao like '%{$_GET['pesquisa']}%'";
            mostrarQuestoes($query);
        } else {
            $query = "select * from ".$_GET['materia'];
            mostrarQuestoes($query);
        }
    } else if($_GET['materia'] == 'qMatematica'){
        if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != ""){
            $query = "select * from ".$_GET['materia']." where questao like '%{$_GET['pesquisa']}%'";
            mostrarQuestoes($query);
        } else {
            $query = "select * from ".$_GET['materia'];
            mostrarQuestoes($query);
        }
    }
} else if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != ""){
    $queryP = "select * from qPortugues where questao like '%{$_GET['pesquisa']}%'";
    $queryM = "select * from qMatematica where questao like '%{$_GET['pesquisa']}%'";
    mostrarQuestoesPM($queryP, $queryM);
    /*else {}*/
} else {
    $queryP = "select * from qPortugues";
    $queryM = "select * from qMatematica";
    mostrarQuestoesPM($queryP, $queryM);
}


?>