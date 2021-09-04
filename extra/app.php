<?php
/*
O app.php faz a lógica de contagem de cédulas. O valor do saque é colocado em uma variável e depois
atribuído a outra, onde esta será dividida pelas notas disponíveis em ordem decrescente (usando o 
intval para retornar o número sem casas decimais), depois é subtraído do valor o resultado obtido 
e multiplicado pelo valor da nota da vez, atualizando o valor total e passando para a próxima nota.
No fim, os resultados obtidos são organizados nos echoes para serem vistos pelo Ajax.
*/
    if(isset($_GET['a'])){
        if($_GET['a'] == 'ok'){
            $valor = $_POST['valor'];
            $vAtual = $valor;
            $notas100 = intval($vAtual / 100);
            $vAtual -= $notas100 * 100;
            $notas50 = intval($vAtual / 50);
            $vAtual -= $notas50 * 50;
            $notas10 = intval($vAtual / 10);
            $vAtual -= $notas10 * 10;
            $notas5 = intval($vAtual / 5);
            $vAtual -= $notas5 * 5;
            $notas2 = intval($vAtual / 2);
            $vAtual -= $notas2 * 2;
            $notas1 = $vAtual;
            $totalNotas = $notas100 + $notas50 + $notas10 + $notas5 + $notas2 + $notas1;

            echo("Valor do saque: R$ ". $valor . ",00 </br>");
            echo("Quantidade de cédulas: ".$totalNotas . "</br>");
            echo("Distribuição de cédulas: </br>");
            echo(frase($notas100, 100));
            echo(frase($notas50, 50));
            echo(frase($notas10, 10));
            echo(frase($notas5, 5));
            echo(frase($notas2, 2));
            echo(frase($notas1, 1));
        }
    }

    function plural($nota){
        return $nota > 1 ? "cédulas" : "cédula";
    }
    function frase($quantidade, $valor){
        if($quantidade != 0){
            return $quantidade . " " . plural($quantidade) ." de R$ " . $valor . ",00.</br>";
        }
    }
?>