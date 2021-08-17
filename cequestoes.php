<?php

function editarQuestoes(){
    
    include 'conexao.php';

    $sql = "select * from ".$_GET['materia']." where id = ".$_GET['questao'];
    $rs = mysqli_query($con, $sql);

    $ln = mysqli_fetch_assoc($rs);
    
    print '<div id="form">';
    print '<form action="salvar_questao.php" method="POST">';

    print '<input type="hidden" name="id" value="'.$ln["id"].'"><br>';

    print '<label>Questão:</label> <br>';
    print '<textarea cols="30" rows="3" name="questao">'.$ln["questao"].'</textarea> <br> <br>';
    print '<label>Alt1: </label>';
    print '<input type="text" name="alt1" value="'.$ln["alt1"].'"><br>';
    print '<label>Alt2: </label>
        <input type="text" name="alt2" value="'.$ln["alt2"].'"><br>
        <label>Alt3: </label>
        <input type="text" name="alt3" value="'.$ln["alt3"].'"><br>
        <label>Alt4: </label>
        <input type="text" name="alt4" value="'.$ln["alt4"].'"><br>
        <label>Alt5: </label>
        <input type="text" name="alt5" value="'.$ln["alt5"].'"><br>
        <br>';
    print '<label> Alternativa correta:</label> <br>';
    
    $aux = array('alt1', 'alt2', 'alt3', 'alt4','alt5');
    for($i = 0; $i < count($aux); $i++){
        if($ln["altCorreta"] == $aux[$i]){
            print '<label> <input type="radio" name="altCorreta" value="'.$aux[$i].'" checked >'.$aux[$i].'</label>';    
        } else {
            print '<label> <input type="radio" name="altCorreta" value="'.$aux[$i].'" >'.$aux[$i].'</label>';
        }
    }

    print '<br> <br>';
    print '<label>Disciplina:</label><br>';

    if($_GET["materia"] == 'qPortugues'){
        print '<label>	<input type="radio" name="disciplina" value ="qPortugues" checked >Português </label> <br>';
        print '<label>	<input type="radio" name="disciplina" value="qMatematica" >Matemática  </label>';
    } else {
        print '<label>	<input type="radio" name="disciplina" value ="qPortugues" >Português </label> <br>';
        print '<label>	<input type="radio" name="disciplina" value="qMatematica" checked >Matemática  </label>';
    }
        
    
    print '<br><br>
    <label>ID da prova: </label>
        <input type="text" name="idProva" value="'.$ln["idProva"].'">
    <br><br>
    <label>Endereço da imagem: </label>
        <input type="text" name="endImagem" value="'.$ln["imagem"].'"> <br> 

</div> 
<div id="botoe">
 <button class="Button" name="acao" value="editar">Editar</button>

</form>  </div>';
}

function cadastrarQuestoes(){

    include 'conexao.php';

    print '<div id="form">
    <form action="salvar_questao.php" method="POST">';

    print '<input type="hidden" name="id" value"cadastrar"><br>';

    print '<label>Questão:</label> <br>
        <textarea cols="30" rows="3" name="questao">  </textarea> <br> <br>
        <label>Alt1: </label>
        <input type="text" name="alt1"> <br>
        <label>Alt2: </label>
        <input type="text" name="alt2"> <br>
        <label>Alt3: </label>
        <input type="text" name="alt3"> <br>
        <label>Alt4: </label>
        <input type="text" name="alt4"> <br>
        <label>Alt5: </label>
        <input type="text" name="alt5"> <br>
        <br>
        <label> Alternativa correta:</label> <br>
        <label> <input type="radio" name="altCorreta" value="alt1" >Alt1  </label>
        <label> <input type="radio" name="altCorreta" value="alt2" >Alt2 </label>
        <label> <input type="radio" name="altCorreta" value="alt3" >Alt3  </label> <br>
        <label> <input type="radio" name="altCorreta" value="alt4" >Alt4 </label>
       <label> <input type="radio" name="altCorreta" value="alt5" >Alt5  </label>
    <br> <br>
        <label>Disciplina:</label><br>
          <label>	<input type="radio" name="disciplina" value ="qPortugues" >Português </label> <br>
       <label>	<input type="radio" name="disciplina" value="qMatematica" >Matemática  </label>
    <br><br>
    <label>ID da prova: </label>
        <input type="text" name="idProva"> 
    <br><br>
    <label>Endereço da imagem: </label>
        <input type="text" name="endImagem"> <br> 

</div>
<div id="botoes">
 <button class="Button" name="acao" value="cadastrar">Cadastrar</button>
</div>
</form>';

}

if (isset($_GET['questao']) && $_GET['questao'] != "" && isset($_GET['materia']) && $_GET['materia'] != ""){
            
    print '<div class="title">';
    print "<h2>EDITAR QUESTÃO</h2>";
    print "<br> <br></div>";
    
    editarQuestoes();
#            $sql = "select * from ".$_GET['materia']." where id = ".$_GET['questao'];
#            $rs = mysqli_query($con, $sql); 

} else{
    
    print '<div class="title">';
    print "<h2>CADASTRAR QUESTÃO</h2>";
    print "<br> <br></div>";

    cadastrarQuestoes();
}


?>