<?php

   function randString($size){
        //String com valor possíveis do resultado, os caracteres pode ser adicionado ou retirados conforme sua necessidade
        $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        $return= "";

        for($count= 0; $size > $count; $count++){
            //Gera um caracter aleatorio
            $return.= $basic[rand(0, strlen($basic) - 1)];
        }

        return $return;
    }

    function randStringN($size){
        //String com valor possíveis do resultado, os caracteres pode ser adicionado ou retirados conforme sua necessidade
        $basic = '12345';

        $return= "";

        for($count= 0; $size > $count; $count++){
            //Gera um caracter aleatorio
            $return.= $basic[rand(0, strlen($basic) - 1)];
        }

        return $return;
    }
    function randStringL($size){
        //String com valor possíveis do resultado, os caracteres pode ser adicionado ou retirados conforme sua necessidade
        $basic = 'FMD';

        $return= "";

        for($count= 0; $size > $count; $count++){
            //Gera um caracter aleatorio
            $return.= $basic[rand(0, strlen($basic) - 1)];
        }

        return $return;
    }/*
print "INSERT INTO `rPortugues`(`idQuestao`, `explicacao`, `dificuldade`) VALUES ";
    for($i = 1; $i < 130; $i++){
        $explicacao = randString(10);
        $dificuldade = randStringL(1);

print "($i, '$explicacao','$dificuldade'), ";
    }

*/




$alt5 = randString(15);



    print "UPDATE `qPortugues` SET alt5 = '$alt5'";
/*
 
$altCorreta = 'alt'.randStringN(1);
$questao = "Alternativa correta: ".$altCorreta;
$alt1 = randString(10);
$alt2 = randString(11);
$alt3 = randString(12);
$alt4 = randString(13);
$alt5 = randString(15);

$idProva = 1;
$imagem = randString(5);

print "INSERT INTO qMatematica(`questao`, `alt1`, `alt2`, `alt3`, `alt4`, `altCorreta`, `idProva`, `imagem`) VALUES ";
for($i = 0; $i < 100; $i++ ){
    $altCorreta = 'alt'.randStringN(1);
    $questao = "Alternativa correta: ".$altCorreta;
    $alt1 = randString(10);
    $alt2 = randString(11);
    $alt3 = randString(12);
    $alt4 = randString(13);
    $alt5 = randString(15);
    
    $idProva = 1;
    $imagem = randString(5);
print "('$questao','$alt1','$alt2','$alt3','$alt4','$altCorreta','$idProva', '$imagem'), ";
}

*/