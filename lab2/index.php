<?php
    $m=array('a', 'b', 'c', 'b', 'a');
    print_r(array_count_values($m));
    $m1=array(1=>'a', 2=>'b', 3=>'c');
    print_r(array_flip($m1));
    $m2=array('1', '2', '3', '4', '5');
    print_r(array_reverse($m2));
    $s=array('a', 'b', 'c');
    $l=array('1', '2', '3');
    print_r(array_combine($s,$l));
    $m4=array('a'=>1, 'b'=>2, 'c'=>3);
    print_r(array_keys($m4));
    print_r(array_values($m4));
