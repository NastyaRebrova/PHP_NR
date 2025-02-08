<?php
    class Cat{
        private $name;
        public $color;
        public $weight;
        function __construct(string $name, string $color, int $weight){
            $this->name = $name;
            $this->color = $color;
            $this->weight = $weight;
        }
        // function setName(string $name){
        //     $this->name = $name;
        // }
        function getName(){
            return $this->name;
        }
    }
    $cat1 = new Cat('Myrka', 'gray', 3);
    // $cat2 = new Cat;
    // $cat1->setName('Barsik');
    // $cat2->setName('Vasya');
    // $cat1->color = 'gray';
    // $cat1->weight = 4;
    echo $cat1->getName().'<BR>';
    // echo $cat2->getName().'<BR>';
    // var_dump($cat1);