<?php

function editarUsuarios(){
    
    include 'conexao.php';

    $sql = "select * from usuarios where id = ".$_GET['idUsuario'];
    $rs = mysqli_query($con, $sql);

    $ln = mysqli_fetch_assoc($rs);
    
    print '<div id="formc">
    <form id = "cadastro" action="salvar_usuario.php" method="POST">
      <div id="left">
    <label>Nome:</label>
      <input type="text" name="nome" id="nome" value='.$ln["nome"].'> <br><br>
    <label>Email:</label>
      <input type="text" name="email" id="email"  onblur="validarEmail()" value="'.$ln["email"].'"> <br><br>
    <label>Data de nascimento:</label>
      <input type="date" name="nasc" id="nasci"  maxlength="10" onkeypress="mascaraData(this)" value="'.$ln["dataNascimento"].'"> <br> <br>
    
      <label>Gênero: </label><br>

      '; 
    

    $aux = array('feminino', 'masculino', 'outro');
    for ($i = 0; $i < count($aux); $i++){
        if ($ln["genero"] == $aux[$i]){
            print '<label> <input type="radio" name="genero" value="'.$aux[$i].'" checked >'.$aux[$i].'</label><br>';    
        } else {
            print '<label> <input type="radio" name="genero" value="'.$aux[$i].'" >'.$aux[$i].'</label><br>';
        }
    }

    print '
     
    </div> 
    <div id="right">
    <br>
    <label>Frequenta escola:</label> <br>
    '; 
    if ($ln["cotista"] == 1){
      print 
    '<label> <input type="radio" name="escola" value="1" id="escola" checked> <span>Pública </span><br> </label>
     <label>  <input type="radio" name="escola" value="0" id="escola" > <span>Particular </span><br> <br> </label> 
     ';
    } else {
      print 
    '<label> <input type="radio" name="escola" value="1" id="escola" > <span>Pública </span><br> </label>
     <label>  <input type="radio" name="escola" value="0" id="escola" checked > <span>Particular </span><br> <br> </label> 
     ';
    }
    

 if ($_SESSION['admin'] == 1) {
print '    <label>Tipo de úsuario: </label><br>
';

if ($ln["admin"] == 1){
  print '
  <label> <input type="radio" name="admin" value="1" checked > Administrador  <br> </label>
  <label><input type="radio" name="admin"  value="0" > Comum <br> </label>
  ';
  
} else {
  print '
  <label> <input type="radio" name="admin" value="1"  > Administrador  <br> </label>
  <label><input type="radio" name="admin"  value="0" checked > Comum <br> </label>
  ';
  }

 } else {
     print '<input type="hidden" name="admin" value="0"> ';
 }

 print '
 <br>
     <label> Senha:</label>
      <input type="password" name="senha"  id="senha" > <br> <br>
    <label> Confirmar Senha:</label>
      <input type="password" name="senhaConfirm" id="senhaConfirm" onblur="testes()"> <br><br>
      </div> 
      <input type="hidden" name="senhaAntiga" value="'.$ln["senha"].'">
      <input type="hidden" name="idUsuario" value="'.$_GET['idUsuario'].'">

</div> 
<br>
<div id="botoe">
    <input type="submit" value="Editar" id="editar" class="Button">   
                 </div>
                 </form>';
}

function cadastrarUsuarios(){

    include 'conexao.php';

    print '<div id="formc">
    <form id = "cadastro" action="salvar_usuario.php" method="POST">
    
    <label>Nome:</label>
      <input type="text" name="nome" id="nome" > <br><br>
    <label>Email:</label>
      <input type="text" name="email" id="email"  onblur="validarEmail()"> <br><br>
    <label>Data de nascimento:</label>
      <input type="date" name="nasc" id="nasci"  maxlength="10" onkeypress="mascaraData(this)"> <br> <br>
    <label>Gênero: </label><br>

      <label> <input type="radio" name="genero" value="feminino" id="genero" > Feminino  <br> </label>
      <label><input type="radio" name="genero"  value="masculino" id="genero" > Masculino <br> </label>
      <label> <input type="radio" name="genero" value="outro" id="genero" > Outro <br> <br> </label> 
   
    <label>Frequenta escola:</label> <br>
      <label> <input type="radio" name="escola" value="1" id="escola" > <span>Pública </span><br> </label>
     <label>  <input type="radio" name="escola" value="0" id="escola" > <span>Particular </span><br> <br> </label>
    <label> Senha:</label>
      <input type="password" name="senha"  id="senha" > <br> <br>
    <label> Confirmar Senha:</label>
      <input type="password" name="senhaConfirm" id="senhaConfirm" onblur="testes()" > <br><br>
    
<a id="red" href="login.php"> Já possui conta? </a>     


<br>  </div>
<div id="botoe">
    <input type="submit" value="Cadastrar" id="cadastrar" class="Button">   
                </div>
                 </form>';

}

if (isset($_GET['idUsuario']) && $_GET['idUsuario'] != ""){
            
   if ($_SESSION['id'] == $_GET['idUsuario'] || $_SESSION['admin'] == 1){
    print '<div class="title">';
    print "<h2>EDITAR USUARIO</h2>";
    print "<br> <br></div>";
    
    editarUsuarios();
   } else {
    Header("Location:menu.php");
   }

} else{
    
    print '<div class="title">';
    print "<h2>CADASTRO</h2>";
    print "<br> <br></div>";

    cadastrarUsuarios();
}


?>