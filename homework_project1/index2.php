<?php
    class Cat{
        private $name;
        private $color;
        function __construct(string $name, string $color){
            $this->name = $name;
            $this->color = $color;
        }
        function sayHello(){
            return $this->name.  ', '  .$this->color;
        }
    }
    $cat1 = new Cat('Myrka', 'gray');
    $cat2 = new Cat('Martin', 'red');
    echo $cat1->sayHello().'<BR>';
    echo $cat2->sayHello().'<BR>';

