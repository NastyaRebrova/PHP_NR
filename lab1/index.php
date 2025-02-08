<?php
    $a = 27;
    $b = 12;
    $c = pow(pow($a, 2) - pow($b,2), 0.5);
    $d=sprintf("%4.2f",$c);
    print "d=$d<BR>";
    $hunter = 'охотник';
    $wants = 'желает';
    $know = 'знать';
    $fizan = 'фазан';
    $sits = 'сидит';
    $R = "$hunter $wants $know $fizan $sits";
    print "$R<BR>";
    $quieter = 'Тише';
    $go = 'едешь';
    $further = 'дальше';
    $R = "$quieter $go $further";
    print "$R<BR>";
?>
