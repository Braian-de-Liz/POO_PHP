<?php

require_once '../models/Operacoes.php';
require_once '../models/Soma.php';
require_once '../models/Subtracao.php';
require_once '../models/Multiplicacao.php';
require_once '../models/Divisao.php';
require_once '../views/TrataeMostra.php';

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
        $oper = null;

        switch ($operacao) {
            case 'somar':
                $oper = new Soma();
                break;

            case 'subtrair':
                $oper = new Subtracao();
                break;

            case 'multiplicar':
                $oper = new Multiplicacao();
                break;

            case 'dividir':
                if ($val2 == 0) {
                    $error = 'Divisão por zero não permitida.';
                } else {
                    $oper = new Divisao();
                }
                break;
        }

        if ($oper !== null) {
            $oper->setNum1($val1);
            $oper->setNum2($val2);
            $result = $oper->calcula();
        }
    }

    TrataeMostra::exibirResultado($error, $operacao, $val1, $val2, $result);
}

?>