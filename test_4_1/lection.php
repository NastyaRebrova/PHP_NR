<?php

    // номер 1
    // echo preg_replace('#(\d)#', '$1$1', 'a1b2c3');

    // номер 2
    // echo preg_match_all('#https?://[a-z]+\.[a-z]{2,3}#', 'http://site.ru');

    // номер 8
    // preg_match_all('#(\w)\1+#', 'aaa bcd xxx efg',  $matches);
    // var_dump($matches);

    // номер 11
    // echo preg_replace('#(\w+)@(\w+)#i', '$2@$1', 'aaa@bbb eee7@kkk');

    // номер 15
    echo preg_replace('#a\\\\a#', '!', 'a\a abc');