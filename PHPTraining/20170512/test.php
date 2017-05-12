<?php
    $fp = fopen( "count.csv", "r+" );
    $str=fgets($fp);
    $count = explode(",",$str)[0];
    $pretime = trim(explode(",",$str)[1]);

    $count++;
    $time = time();
    rewind( $fp );
    fputs( $fp, $count.",".$time );
    fclose( $fp );
    echo 'あなたは'.$count.'人目のお客様です<br>';

    $weekday = ["日","月","火","水","木","金","土"];
    printf("%s(%s) %s<br>", date("Y m/d",$time),$weekday[date("w",$time)],date("G:i:s",$time));
    printf("前回：%s(%s) %s<br>", date("Y m/d",$pretime),$weekday[date("w",$pretime)],date("G:i:s",$pretime));

?>
