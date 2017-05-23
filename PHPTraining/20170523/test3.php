<html>
    <head>
        <!--お問い合わせ終了-->
        <title>お問い合わせ終了</title>
        <link rel="stylesheet" type="text/css" href="test5.css">
    </head>

    <body>
        <center>
            <?php
                //問い合わせ内容表示
                print "<h1>お問い合わせ終了</h1><br><hr>";
                print "姓：<br>".$_POST['last_name']."<br><br>";
                print "名：<br>".$_POST['first_name']."<br><br>";
                print "性別：<br>".$_POST['gender']."<br><br>";
                print "住所：<br>".$_POST['address']."<br><br>";
                print "電話番号：<br>".$_POST['phone']."<br><br>";
                print "メールアドレス：<br>".$_POST['mail']."<br><br>";
                //print "どこで知ったか：<br>".$_POST['where1']." ".$_POST['where2']."<br><br>";
                print "どこで知ったか：<br>";
                if(isset($_POST['where'])){
                    foreach($_POST['where'] as $w){
                        print $w."<br>";
                    }
                }
                print "<br>";
                print "質問カテゴリ：<br>".$_POST['category']."<br><br>";
                //print "質問内容：<br>".$_POST['question']."<br><br>";
                print "質問内容：<br>";
                foreach($_POST['question'] as $cat){
                    print $cat."<br>";
                }
                print "<br><br>";
                //}
                //問合せ番号カウンタ・問い合わせ内容保存(csv形式)
                $fp = fopen( "count.csv", "r+" );
                //$str=trim(fgets($fp));
                $count = -1;
                while(($tmp=fgets($fp))!=false){
                    $str = $tmp;
                    $str = trim($str);
                    $count = explode(",",$str)[0];
                }
                $count++;
                $output = $count;
                $data = $_POST;
                $data['last_name'] = $data['last_name']." ".$data['first_name'];
                unset($data['first_name']);
                //print $data['question'];
                foreach($data as $key => $p){
                    if(isset($p) and is_array($p)){
                        $output .= ",";
                        foreach($p as $a){
                            if($key == "question"){
                                $output .= $a."<br>";
                            }else{
                                $output .= $a." ";
                            }
                        }
                        $output = rtrim($output);
                        $output = rtrim($output,"<br>");
                    }elseif($key != "submit" and $p != "送信"){
                        $output .= ",".$p;
                    }
                }
                fputs( $fp, $output."\n");
                fclose( $fp );
                print "<hr>";
                print "お問い合わせ番号：".$count."<br>";
            ?>
            <a href="test.php">未入力状態で書き直します</a>
        <center>
    </body>
</html>
