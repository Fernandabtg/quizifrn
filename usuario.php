<?php
session_start();

#verifica se o usuario realmente esta logado
if ( isset($_SESSION['email']) == false ){
    Header("Location:login.php");
} else{
  if ($_SESSION['admin'] == 0) {
    Header("Location:menu.php");
  }
}



include 'conexao.php';
?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> QUIZ IFRN</title>
<link href="CSS.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript">
    function Entrar() {
        location.href="menu.html"
    }
   
</script>
</head>
<body>
<div id="cima">
    <div id="logo">
       <a href="menu_adm.php"> <img  src="images/qilogo.png"></a>
    </div>
 
</div>
   <div id="centro">
  
        <div class="title">
            <h2>USUÁRIOS</h2><br><br>  
        </div>
       <div id="text">
    
       <?php
 print "<table class='lista'>";
  print "<tr>";
  print "\n<th> Editar </th>";
  print "<th> Tipo:</th> ";
    print "  <th > Nome: </th>";
     print "  <th > Email: </th>";
    print "  <th> Data de Nascimento: </th>";
   print "   <th> Gênero: </th>";
    print "<th> Cotista: </th>";
    print "\n<th> Deletar </th>";
  print "</tr>";

$sql = "select * from usuarios";
$rs = mysqli_query($con, $sql); 
while( $ln = mysqli_fetch_assoc($rs) ) {
  if ($ln["admin"]) {
    $tipoUsuario = "Administrador";
  } else{
    $tipoUsuario = "Comum";
  }
  if ($ln["cotista"]) {
    $cotista = "Sim";
  } else{
    $cotista = "Não";
  }
  print "<tr>";
  print "\n<td><a href='cadastro.php?idUsuario={$ln['id']}'> Editar </a></td>";
print "<td><p>".$tipoUsuario."</p> </td>" ;
print "<td><p>".$ln["nome"]."</p> </td>";
print "<td>".$ln["email"]."</td>";
print "<td>".$ln["dataNascimento"]."</td>";
print "<td> <p>".$ln["genero"]."</p></td>";
print "<td> <p>".$cotista." </p> </td>";
print "\n<td><a href='deletar.php?idUsuario={$ln['id']}'> Deletar </a></td>";
print "</tr>";

}

    ?>  </table>   <div id="botoes">     
                <a href="menu_adm.php"><button class="Button" >Voltar</button></a>
            </div>
      
</body>
</html>
