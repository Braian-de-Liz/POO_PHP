<?php 

    final class Soma {
        private float $num1;
        private float $num2;

        public function getNum1(): float {
            return $this->num1;
        }

        public function setNum1(float $num1) {
            $this->num1 = $num1;
        }

        public function getNum2(): float {
            return $this->num2;
        }

        public function setNum2(float $num2) {
            $this->num2 = $num2;
        }

        public function calcularSoma(): float {
            return $this->num1 + $this->num2;
        }
    }