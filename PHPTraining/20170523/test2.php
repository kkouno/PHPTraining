<html>
    <head>
        <title>確認</title>
        <link rel="stylesheet" type="text/css" href="test5.css">
    </head>

    <body>
        <center>
            <form method="post" action="test3.php">
                <?php
                    //問い合わせ内容の確認
                    print "<h1>お問い合わせ内容</h1><br><hr>";
                    print "姓：<br>".$_POST['last_name']."<br><br>";
                    print "名：<br>".$_POST['first_name']."<br><br>";
                    print "性別：<br>".$_POST['gender']."<br><br>";
                    print "住所：<br>".$_POST['address']."<br><br>";
                    print "電話番号：<br>".$_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3']."<br><br>";
                    print "メールアドレス：<br>".$_POST['mail']."<br><br>";
                    //print "どこで知ったか：<br>".$_POST['where1']." ".$_POST['where2']."<br><br>";
                    print "どこで知ったか：<br>";
                    if(isset($_POST['where'])){
                        foreach($_POST['where'] as $w){
                            print $w."<br>";
                        }
                    }else{
                        print "<br>";
                    }
                    print "<br>";
                    print "質問カテゴリ：<br>".$_POST['category']."<br><br>";
                    print "質問内容：<br>".nl2br($_POST['question'])."<br><br>";

                    //送信された場合のデータ送信用。
                    print "<input type=\"hidden\" name=\"last_name\" value=".$_POST['last_name'].">";
                    print "<input type=\"hidden\" name=\"first_name\" value=".$_POST['first_name'].">";
                    print "<input type=\"hidden\" name=\"gender\" value=".$_POST['gender'].">";
                    print "<input type=\"hidden\" name=\"address\" value=".$_POST['address'].">";
                    print "<input type=\"hidden\" name=\"phone\" value=".$_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3'].">";
                    print "<input type=\"hidden\" name=\"mail\" value=".$_POST['mail'].">";
                    if(isset($_POST['where'])){
                        foreach($_POST['where'] as $w){
                            print "<input type=\"hidden\" name=\"where[]\" value=".$w.">";
                        }
                    }else{
                        print "<input type=\"hidden\" name=\"where[]\" value=\"\">";
                    }
                    print "<input type=\"hidden\" name=\"category\" value=".$_POST['category'].">";
                    foreach(explode("\n",$_POST['question']) as $line){
                        print "<input type=\"hidden\" name=\"question[]\" value=".$line.">";
                    }
                    print "<input type=\"submit\" name=\"submit\" value=\"送信\">";
                ?>
                <!--戻る(入力された状態)-->
                <input type="button" value="戻る" onclick="history.back()">
            </form>

            <hr>
            <!--戻る(未入力状態)-->
            <a href="test.php">未入力状態で書き直します</a>
        <center>
    </body>
</html>
