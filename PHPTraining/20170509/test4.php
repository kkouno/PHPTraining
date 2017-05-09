<?php
/*
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
        print("$a<br>");
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

    for($i=0;$i<10;$i++){
        if($i==5){
            echo "5 continue<br>";
            continue;
        }
        echo $i."<br>";
    }
    echo "<hr>";

    print("<br>");

    for($i=0;$i<10;$i++){
        if($i==5){
            echo "break<br>";
            break;
        }
        echo $i . "<br>";
    }

    print("<br>");

    $level1="B";

    switch($level1){
        case "A":
            print "aaa";
            break;
        case "B":
            print "BBB";
            break;
        case "C":
            print "CCC";
            break;
        default:
            print "default";
            break;
    }

    print("<br>");

    $color="赤";

    switch($color){
        case "赤":
            print "Red";
            break;
        case "青":
            print "Blue";
            break;
        default:
            print "other";
            break;
    }
    print("<br>");

    $score=90;
    if($score>=80){
        print "hoge";
    }else{
        print "piyo";
    }

    print("<br>");

    $name=["masuda","ryo","hamana"];
    print $name[0];
    $name[3]="hyomori";
    print $name[3];
    print("<br>");
    $a=["C言語","MySQL","PHP","VPS"];
    print_r($a);
    echo $a[2];
    $c[]="a";
    $c[]="b";
    $c[]="c";
    print_r($c);



    $d[0] = 1;
    $d[1] = 2;
    $d[2] = 3;
    $d[3] = null;
    $d[4] = 4;
    $d[6] = 5;
    $d[] = 6;
    print_r($d);

    print("<br>");
    $like2=array("color"=>"red","food"=>"sushi");
    print_r($like2);

    $like1["color"]="red";
    $like2["food"]="sushi";

    print_r($like2);
    print("<br/>");
    $age=array("yamada"=>25,"honda"=>37,"kato"=>67);
    foreach($age as $x=>$x_value){
        echo "Key=".$x." Value=".$x_value;
        echo "<br>";
    }

    print("<br>");

    $test=["h","g","f","e","d"];
    foreach($test as $x=>$value){
        echo $x.$value;
    }

    print("<br>");
    print("<br>");
    print("<br>");
    print("<br>");
    print("<br>");
*/

for($i=0;$i<5;$i++){
    print "number :".($i+1)."<br>";
}

$colors=array("赤","緑","青","黄色");

for($i=0;$i<count($colors);$i++){
    print $colors[$i]."<br>";
}

?>
