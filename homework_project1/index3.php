<?php
    class Rectangle implements calculateSqure
    {
        private $a;
        private $b;

        public function __construct($a, $b){
            $this->a = $a;
            $this->b = $b;
        }
        public function calculateRectangle(): float
        {
            return $this->a * $this->b;
        }
        public function calculateSqure(): float
        {
            return $this->a * $this->b;
        }
    }

    class Squre implements calculateSqure
    {
        private $a;

        public function __construct($a){
            $this->a = $a;
        }
        public function calculateSqure(): float
        {
            return $this->a * $this->a;
        }
    }

    class Circle implements calculateSqure
    {
        private $r;

        public function __construct($r){
            $this->r = $r;
        }
        public function calculateCircle(): float
        {
            $pi = 3.14;
            return $pi * ($this->r**2);
        }
        public function calculateSqure(): float
        {
            $pi = 3.14;
            return $pi * ($this->r**2);
        }
    }

    interface calculateSqure
    {
        public function calculateSqure(): float;
    }

    $figures = [
        $rectangle = new Rectangle(2,4),
        $rectangle = new Squre(4),
        $rectangle = new Circle(6),
    ];
    foreach($figures as $figure){
    $className = get_class($figure);
    if($figure instanceof calculateSqure) {
        echo "Объект класса $className: " . $figure->calculateSqure() . '<BR>';
    } else {
        echo "Объект класса $className не реализует интерфейс CalculateSquare.<BR>";
    }
}