<?php
    // class Cat{
    //     private $name;
    //     public $color;
    //     public $weight;
    //     function __construct(string $name, string $color, int $weight){
    //         $this->name = $name;
    //         $this->color = $color;
    //         $this->weight = $weight;
    //     }
    //     // function setName(string $name){
    //     //     $this->name = $name;
    //     // }
    //     function getName(){
    //         return $this->name;
    //     }
    // }
    // $cat1 = new Cat('Myrka', 'gray', 3);
    // $cat2 = new Cat;
    // $cat1->setName('Barsik');
    // $cat2->setName('Vasya');
    // $cat1->color = 'gray';
    // $cat1->weight = 4;
    // echo $cat1->getName().'<BR>';
    // echo $cat2->getName().'<BR>';
    // var_dump($cat1);

    // class Lesson{
    //     private $title;
    //     protected $text;
    //     function __construct(string $title, string $text){
    //         $this->title = $title;
    //         $this->text = $text;
    //     }
    // }
    // $lesson = new Lesson('lesson 1', 'lorum ipsum');

    // class HomeWork extends Lesson
    // {
    //     private $task;
    //     function __construct(string $title, string $text, $task){
    //         parent::__construct($title,$text);
    //         $this->task = $task;
    //     }
    //     public function getText(){
    //         return $this->text;
    //     }
    // }

    // class LabWork extends HomeWork
    // {
    //     private $count;
    //     function __construct(string $title, string $text, $task, $count){
    //         parent::__construct($title,$text,$task);
    //         $this->count = $count;
    //     }
    // }
    // $labWork = new LabWork('rt', 'rt', 4, 4);
    // echo $labWork->getText();

    // class Rectangle implements calculateSqure
    // {
    //     private $a;
    //     private $b;

    //     public function __construct($a, $b){
    //         $this->a = $a;
    //         $this->b = $b;
    //     }
    //     public function calculateRectangle(): float
    //     {
    //         return $this->a * $this->b;
    //     }
    //     public function calculateSqure(): float
    //     {
    //         return $this->a * $this->b;
    //     }
    // }

    // class Squre implements calculateSqure
    // {
    //     private $a;

    //     public function __construct($a){
    //         $this->a = $a;
    //     }
    //     public function calculateSqure(): float
    //     {
    //         return $this->a * $this->a;
    //     }
    // }

    // class Circle implements calculateSqure
    // {
    //     private $r;

    //     public function __construct($r){
    //         $this->r = $r;
    //     }
    //     public function calculateCircle(): float
    //     {
    //         $pi = 3.14;
    //         return $pi * ($this->r**2);
    //     }
    //     public function calculateSqure(): float
    //     {
    //         $pi = 3.14;
    //         return $pi * ($this->r**2);
    //     }
    // }

    // interface calculateSqure
    // {
    //     public function calculateSqure(): float;
    // }

    // $figures = [
    //     $rectangle = new Rectangle(2,4),
    //     $rectangle = new Squre(4),
    //     $rectangle = new Circle(6),
    // ];
    // foreach($figures as $figures){
    //     if($figures instanceof calculateSqure) echo $figures->calculateSqure().'<BR>';
    //     else echo "object doesn't implement interface<BR>";
    // }


    // class A {
    //     public function sayHello(){
    //         return 'Hello, Im A';
    //     }
    // }

    // class B extends A
    // {
    //     public function sayHello()
    //     {
    //         parent::sayHello().'.joke';
    //     }
    // }

    // $a = new A;
    // var_dump($a instanceof A);
    // echo '<BR>';
    // $b = new B;
    // var_dump($b instanceof B);
    // echo '<BR>';
    // echo $a->sayHello();
    // echo '<BR>';
    // echo $b->sayHello();

    // class A {
    //     public function method1(){
    //         return $this->method2();
    //     }
    //     protected function method2(){
    //         return 'A';
    //     }
    // }

    // class B extends A
    // {
    //     protected function method2(){
    //         return 'B';
    //     }
    // }
    // $a = new A;
    // $b = new B;
    // echo $a->method1();
    // echo $b->method1();






