<?php
    const HP="Hello PHP ";
    const ver=5.3;

    echo HP . "<br>";
    echo HP . ver;
    print("<br>");
    print(HP);
    print("<br>");
    print(HP.ver);
    print("<br>");
    echo strlen("Hello World!");
    print("<br>");
    echo str_word_count("Hello World!");
    print("<br>");
    echo strrev("Hello World!");
    print("<br>");
    echo strpos("Hello World!","world");
    print("<br>");
    echo str_replace("world","kitty","Hello world!");
    print("<br>");
    define("hello","Hello world!");
    echo hello;
    echo "<br>";
    echo str_replace("world","kitty",hello);
    print("<br>");
    $a=0;
    while($a<=3){
        print($a);
        $a++;
    }
    print("<br>");
    $s=0;
    $i=0;
    do{
        ++$i;
        $s+=$i;
    }while($i<10);
    print "1~$i の総和は$s";


    print("<br>");

    for($a=0;$a<=3;$a++){
        print("{$a}<br>");
    }
    print("<br>");
    $color=array("Red","Green","Blue");
    foreach($color as $value){
        print("{$value}<br>");
    }

    foreach($color as $iro=>$value){
        print("{$iro}:{$value}<br>");
    }
    print("<br>");
    print("<br>");
?>
