<?php

final class Divisao extends Operacoes {

    public function calcula(): float {
        if ($this->num2 === 0.0) {
            throw new Exception("Erro: divisão por zero");
        }
        return $this->num1 / $this->num2;
    }

}