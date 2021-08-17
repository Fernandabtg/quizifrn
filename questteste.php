<?php
session_start();

#verifica se o usuario realmente esta logado
if ( isset($_SESSION['email']) == false ){
    Header("Location:login.php");
}



include 'conexao.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> QUIZ IFRN</title>
<link href="csste.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<div id="header" class="cima">
	<div id="logo">
		<img src="images/qilogo.png">
	</div>
	<div id="main" class="fix">
            <ul class="clear">
                 <li><a href="menu.php"><span>Voltar</span></a></li>
             
           </ul>
        </div>
</div>
<div id="wrapper">
	<div id="welcome" class="wrapper-style1">
		<div class="title">
			<h2>MATEMÁTICA</h2>
			</div>
		<img class="face" src="images/q1.png">
		<label>(IFRN/ES - 2015)042. Assumindo os balões de diálogo do Texto 2 como circunferências, se o balão maior tem diâmetro igual a 4cm e o menor tem raio igual a ⅘ do maior, a razão entre o comprimento da circunferência Maior e o da circunferência menor é
	</label>	<br>
		<input type="radio" name="alt1"> a) 4/5 <br>
		<input type="radio" name="alt1">b) 5/6 <br>
		<input type="radio" name="alt1">c) 5/4  <br>
		<input type="radio" name="alt1">d) 6/5 <br>
		</br> <br>
		<img class="face" src="images/q2.png">
		<label>(IFRN/ES -2012)043. Considere que o número total de analfabetos, em 2010, com idade de 30 a 39 anos, apresentado no gráfico, correspondia a 6,3% da população brasileira dessa mesma faixa etária. A partir desses dados, podemos afirmar que a população brasileira com idade de 30 a 39 anos, em 2010, aproximadamente, era de

	</label>	</br>
		<input type="radio" name="alt1"> a) 4/5 </br>
		<input type="radio" name="alt1">b) 5/6 </br>
		<input type="radio" name="alt1">c) 5/4  </br>
		<input type="radio" name="alt1">d) 6/5 </br>
		</br> </br>
		<img class="face" src="images/q3.png">
		<label>(IFRN-ES - 2013)044. Um esqueleto humano típico possui 206 ossos. Considerando essa informação, o número máximo de ossos que todos os esqueletos juntos da imagem  a seguir podem apresentar, em notação científica, é de

	</label>	</br>
		<input type="radio" name="alt1"> a) 4/5 </br>
		<input type="radio" name="alt1">b) 5/6 </br>
		<input type="radio" name="alt1">c) 5/4  </br>
		<input type="radio" name="alt1">d) 6/5 </br>
		</br> </br>
	
</div>
</div>
					<input type="hidden" name="quest" value="<?=$aux?>" />
					<br><br>
					    <div class="botao">
							 <button class="Button">Enviar</button>	
						</div>
				</form>  
			</div>
		</div>
	</body>
</html>
