<?php
    // class A {
    //     public function sayHello(){
    //         return 'Hello.';
    //     }
    // }

    // class B extends A 
    // {
    //     public function sayHello(){
    //         return parent::sayHello().'i was joke';
    //     }
    // }

    // $a = new A;
    // var_dump($a instanceof A);
    // echo '<BR>';
    // $b = new B;
    // var_dump($b instanceof A);
    // echo '<BR>';
    // echo $a-> sayHello();
    // echo '<BR>';
    // echo $b-> sayHello();

    // class A
    // {
    //     public function method1(){
    //         return $this-> method2();
    //     }
    //     protected function method2() {
    //         return 'A';
    //     }
    // }

    // class B extends A 
    // {
    //     protected function method2() {
    //         return 'B';
    //     }
    // }

    // $a = new A;
    // $b = new B;

    // echo $a->method1();
    // echo $b->method1();






































    // class Cat {
    //     private $name;
    //     public $color;
    //     public $weight;


    //     function __construct(string $name, string $color, int $weight) {
    //         $this->name = $name;
    //         $this->color = $name;
    //         $this->weight = $weight;
    //     }
    //     function setName(string $name) {
    //         $this->name = $name;
    //     }
    //     function getName() {
    //         return $this-> name;
    //     }
    // }

    // $cat1 = new Cat('murka', 'black', 3);

    // $cat2 = new Cat;
    //$cat1->setName('barsik');
    //$cat2->setName('tishka');
    //$cat1->color = 'grey';
    //$cat1->weight = 7;
    // echo $cat1->getName().'<BR>';
   // echo $cat2->getName().'<BR>';
    // var_dump($cat1);

    // class Lesson
    // {
    //     protected $title;
    //     protected $text;

    //     function __construct(string $title, string $text){
    //         $this -> title = $title;
    //         $this -> text = $text;

    //     }
    //     public function getText() {
    //         return $this -> text;
    //     }
    // }

    // $lesson = new Lesson('lesson 1', 'lorem ipsum');
    // class HomeWork extends Lesson
    // {
    //     protected $task;

    //     function __construct(string $title, string $text, $task){
    //         parent:: __construct($title, $text);
    //         $this -> task = $task;
    //     }
    // }

    // class LabWork extends HomeWork
    // {
    //     private $count;
    //     function __construct(string $title, string $text, $task, $count){
    //         parent:: __construct($title, $text, $task);
    //         $this -> count = $count;
    //     }
    // }

    // $labWork = new Labwork('rt', 'rt', 4, 4);

    // echo $labWork->getText();


    // class Rectangle implements calSq
    // {
    //     private $a;
    //     private $b;

    //     function __construct($a, $b){
    //     $this->a = $a;
    //     $this->b = $b;
    //     }

    //     public function calSq(): float
    //     {
    //         return $this->a*$this->b;
    //     }
    // }

    // class Square implements calSq
    // {
    //     private $a;

    //     function __construct($a){
    //         $this->a = $a;
    //     }

    //     public function calSq(): float
    //     {
    //         return $this->a*$this->a;
    //     }
    // }

    // class Circle implements calSq
    // {
    //     private $r;

    //     public function __construct($r){
    //         $this->r = $r;
    //     }
    //     public function calSq(): float
    //     {
    //         $pi = 3.14;
    //         return $pi * ($this->r **2);
    //     }
    // }

    // interface calSq 
    // {
    //     public function calSq(): float;
    // }

    // $figures = [
    //     $rectangle = new Rectangle(2,4),
    //     $square = new Square(4),
    //     $circle = new Circle(6),
    // ];

    // foreach($figures as $figure) { 
    //     if($figure instanceof calSq) echo $figure->calSq().'<BR>';
    // }