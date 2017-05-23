<html>
    <head>
        <?php
            //姓・名・電話番号・メールアドレスが未入力かどうか判定
            $page = ($_POST['last_name'] === "" or $_POST['first_name'] === "" or $_POST['phone1'] === "" or $_POST['phone2'] === "" or $_POST['phone3'] === "" or $_POST['mail'] === "");
            //電話番号が数字で構成されているか判定
            $number = (ctype_digit($_POST['phone1']) and ctype_digit($_POST['phone2']) and ctype_digit($_POST['phone3']) );
            //何れかが不正な値ならタイトルをエラー
            //そうでないなら確認画面
            if($page or !$number){
                print "<title>エラー</title>";
            }else{
                print "<title>確認</title>";
            }
        ?>
    </head>

    <body>
        <center>
            <form method="post" action="test3.php">
                <?php
                    //警告出力
                    if($page or !$number){
                        if($_POST['last_name'] === ""){
                            print "姓が入力されていません。<br>";
                        }
                        if($_POST['first_name'] === ""){
                            print "名が入力されていません。<br>";
                        }
                        if($_POST['phone1'] ==="" or $_POST['phone2'] ==="" or $_POST['phone3'] ===""){
                            print "電話番号が未入力です。<br>";
                        }elseif(!$number){
                            print "電話番号が不正です。<br>";
                        }
                        if($_POST['mail'] ===""){
                            print "メールアドレスが未入力です。<br>";
                        }
                        print "<hr>";
                    }else{
                        //問い合わせ内容の確認
                        print "お問い合わせ内容<br><hr>";
                        print "姓：<br>".$_POST['last_name']."<br><br>";
                        print "名：<br>".$_POST['first_name']."<br><br>";
                        print "性別：<br>".$_POST['gender']."<br><br>";
                        print "住所：<br>".$_POST['address']."<br><br>";
                        print "電話番号：<br>".$_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3']."<br><br>";
                        print "メールアドレス：<br>".$_POST['mail']."<br><br>";
                        print "どこで知ったか：<br>".$_POST['where1']." ".$_POST['where2']."<br><br>";
                        print "質問カテゴリ：<br>".$_POST['category']."<br><br>";
                        print "質問内容：<br>".nl2br($_POST['question'])."<br><br>";

                        //送信された場合のデータ送信用。
                        print "<input type=\"hidden\" name=\"last_name\" value=".$_POST['last_name'].">";
                        print "<input type=\"hidden\" name=\"first_name\" value=".$_POST['first_name'].">";
                        print "<input type=\"hidden\" name=\"gender\" value=".$_POST['gender'].">";
                        print "<input type=\"hidden\" name=\"address\" value=".$_POST['address'].">";
                        print "<input type=\"hidden\" name=\"phone\" value=".$_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3'].">";

                        print "<input type=\"hidden\" name=\"mail\" value=".$_POST['mail'].">";
                        print "<input type=\"hidden\" name=\"where1\" value=".$_POST['where1'].">";
                        print "<input type=\"hidden\" name=\"where2\" value=".$_POST['where2'].">";
                        print "<input type=\"hidden\" name=\"category\" value=".$_POST['category'].">";
                        print "<input type=\"hidden\" name=\"question\" value=".$_POST['question'].">";
                        print "<input type=\"submit\" name=\"submit\" value=\"送信\">";
                    }
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
