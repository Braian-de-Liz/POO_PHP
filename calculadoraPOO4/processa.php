<?php


require_once 'soma.php';
require_once 'multplicar.php';
require_once 'subtracao.php';
require_once 'dividir.php';
require_once 'TrataeMostra.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $valor1   = $_POST['valor1'] ?? '';
    $valor2   = $_POST['valor2'] ?? '';
    $operacao = $_POST['operacao'] ?? '';

    $val1 = TrataeMostra::parse_num($valor1);
    $val2 = TrataeMostra::parse_num($valor2);

    $result = null;
    $error  = null;


    if ($val1 === null || $val2 === null) {
        $error = 'Entrada inválida. Certifique-se de informar números válidos.';
    } else {

        switch ($operacao) {
            case 'somar':
                $soma = new Soma();
                $soma->setNum1($val1);
                $soma->setNum2($val2);
                $result = $soma->calcularSoma();
                break;

            case 'subtrair':
                $subtracao = new Subtracao();
                $subtracao->setNum1($val1);
                $subtracao->setNum2($val2);
                $result = $subtracao->calcularSubtracao();
                break;

            case 'multiplicar':
                $multiplicar = new Multiplicacao();
                $multiplicar->setNum1($val1);
                $multiplicar->setNum2($val2);
                $result = $multiplicar->calculaMultiplicacao();
                break;

            case 'divisao':
                $divisao = new Dividir();
                $divisao->setNum1($val1);
                $divisao->setNum2($val2);
                $result = $divisao->calculaDivisao();
                break;
        }
    }


    TrataeMostra::exibirResultado($error, $operacao, $val1, $val2, $result);
}
