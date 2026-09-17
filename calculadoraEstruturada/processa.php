<?php 
    function soma(float $n1, $n2) {

        return $n1 + $n2;
    }

    function subtrair(float $n1, $n2) {

        return $n1 - $n2;
    }

    function multiplicacao(float $n1, $n2) {

        return $n1 * $n2;
    }

    function divisao(float $n1, $n2) {
        if ($n1 === 0 || $n2 === 0 ) {
            return null;
        }

        return $n1/$n2;
    }
?>