<?php
    $headers = get_headers('https://ru.wikipedia.org/wiki/HTTP');
    echo "<textarea>";
        print_r($headers);
    echo "</textarea>";