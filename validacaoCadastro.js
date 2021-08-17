function carregarVariaveis() {
    var nome = document.getElementById("nome");
    var email = document.getElementById("email");
    var nascimento = document.getElementById("nasc");
    var genero = document.getElementById("genero");
    var escola = document.getElementById("escola");
    var senha = document.getElementById("senha");
    var senhaConfirm = document.getElementById("senhaConfirm");

    var botaoEnviar = document.getElementById("enviar");
    
    botaoEnviar.disabled = true;
    vetorValidacao = [0,0]; //Minha variável auxiliar para  genero, senha e nome

}
  
    
  //Desativa o botao caso alguma violação ocorra
  function desativarBotao() {
    vetorValidacao[0] = 0;
    vetorValidacao[1] = 0;


botaoEnviar.disabled = true;
    
}

function camposValid(){
	if(nome.value.length == 0){
    	
        alert("Campos em branco!");
        vetorValidacao[0] = 0;
    } else if(email.value.length == 0){

        alert("Campos em branco");
        vetorValidacao[0] = 0;
    } else if(genero.value.length == 0){

        alert("Campos em branco");
        vetorValidacao[0] = 0;
    } else if(escola.value.length == 0){

        alert("Campos em branco");
        vetorValidacao[0] = 0;
    } else{
        vetorValidacao[0] = 1;
    }

}

  //Validação de usuário, só compara com a senha se a senha já tiver algo digitado
  //Se os dois não tiverem nada, caem na condição do tamanho
 

  //Todas as coisas solicitadas, reparem que a senha só testa com o nome do usuário
  //se tiver algo digitado lá...
  function validarSenha() {
    if(senha.value != senhaConfirm.value){
        vetorValidacao[1] = 0;

        alert("Confirme a senha corretamente!");
    } else if (senhaConfirm.value.length < 6 || senhaConfirm.value.length > 12) {
      vetorValidacao[1] = 0;
  
      alert("A senha deve ter tamanho entre 6 e 12 caracteres!");
    } else {
      vetorValidacao[1] = 1;
    }
  }
  //Chama todos os testes para DataNascimento, Usuario e Senha, assim não fico chamando
  //de um por um... reparem que atribui ele ao usuario e senha, para que testem se
  // um é igual ao outro
  function testes() {
  
      if (senhaConfirm.value.length > 0) {
        validarSenha();
		camposValid();
      }
     else {
      alert("Há campos em branco!")
    }
  
    
 if (vetorValidacao[0] == 1 && vetorValidacao[1] == 1) {
    document.getElementById("enviar").disabled = false;
    } else{
    	desativarBotao();
    } 
 
 
  }


   //mascara para o campo data (ex: 16-02-2016)
   function mascaraData(val) {
    var pass = val.value;
    var expr = /[0123456789]/;
    for (i = 0; i < pass.length; i++) {
      // charAt -> retorna o caractere posicionado no índice especificado
      var lchar = val.value.charAt(i);
      var nchar = val.value.charAt(i + 1);
      if (i == 0) {
        // search -> retorna um valor inteiro, indicando a posição do inicio da primeira
        // ocorrência de expReg dentro de instStr. Se nenhuma ocorrencia for encontrada o método retornara -1
        // instStr.search(expReg);
        if ((lchar.search(expr) != 0) || (lchar > 3)) {
          val.value = "";
        }
      } else if (i == 1) {
        if (lchar.search(expr) != 0) {
          // substring(indice1,indice2)
          // indice1, indice2 -> será usado para delimitar a string
          var tst1 = val.value.substring(0, (i));
          val.value = tst1;
          continue;
        }
        if ((nchar != '-') && (nchar != '')) {
          var tst1 = val.value.substring(0, (i) + 1);
          if (nchar.search(expr) != 0)
            var tst2 = val.value.substring(i + 2, pass.length);
          else
            var tst2 = val.value.substring(i + 1, pass.length);
          val.value = tst1 + '-' + tst2;
        }
      } else if (i == 4) {
        if (lchar.search(expr) != 0) {
          var tst1 = val.value.substring(0, (i));
          val.value = tst1;
          continue;
        }
        if ((nchar != '-') && (nchar != '')) {
          var tst1 = val.value.substring(0, (i) + 1);
          if (nchar.search(expr) != 0)
            var tst2 = val.value.substring(i + 2, pass.length);
          else
            var tst2 = val.value.substring(i + 1, pass.length);
          val.value = tst1 + '-' + tst2;
        }
      }
      if (i >= 6) {
        if (lchar.search(expr) != 0) {
          var tst1 = val.value.substring(0, (i));
          val.value = tst1;
        }
      }
    }
    if (pass.length > 10)
      val.value = val.value.substring(0, 10);
    return true;
  }
 