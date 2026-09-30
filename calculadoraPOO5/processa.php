<?php

require_once 'IOperacao.php';
require_once 'Soma.php';
require_once 'Subtracao.php';
require_once 'Multiplicacao.php';
require_once 'Divisao.php';
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
                $result = $soma->calcula();
                break;

            case 'subtrair':
                $sub = new Subtracao();
                $sub->setNum1($val1);
                $sub->setNum2($val2);
                $result = $sub->calcula();
                break;

            case 'multiplicar':
                $mult = new Multiplicacao();
                $mult->setNum1($val1);
                $mult->setNum2($val2);
                $result = $mult->calcula();
                break;

            case 'dividir':
                if ($val2 == 0) {
                    $error = 'Divisão por zero não permitida.';
                } else {
                    $div = new Divisao();
                    $div->setNum1($val1);
                    $div->setNum2($val2);
                    $result = $div->calcula();
                }
                break;
        }
    }

    TrataeMostra::exibirResultado($error, $operacao, $val1, $val2, $result);
}

?>