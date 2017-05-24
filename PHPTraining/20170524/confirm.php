<!DOCTYPE html>
<html>
    <head>
        <!--
            問合せ内容確認

            送信 → 問合せ完了：completed.php
            戻る → (入力内容を初期化せずに)問合せフォーム query.php
            未入力状態で書き直します → (入力内容を初期化して)問合せフォーム query.php
        -->
        <title>確認</title>
        <link rel="stylesheet" type="text/css" href="font.css">
    </head>

    <body>
        <center>
            <form method="post" action="completed.php">


                    <!--問い合わせ内容の確認-->
                    <hr>
                    <h1>お問い合わせ内容</h1>
                    姓：<br><?= $_POST['last_name']?><br><br>
                    名：<br><?= $_POST['first_name']?><br><br>
                    性別：<br><?= $_POST['gender']?><br><br>
                    住所：<br><?= $_POST['address']?><br><br>
                    電話番号：<br><?= $_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3']?><br><br>
                    メールアドレス：<br><?= $_POST['mail']?><br><br>
                    どこで知ったか：<br>
                <?php
                    if(isset($_POST['where'])){
                        foreach($_POST['where'] as $w){
                            print $w."<br>";
                        }
                    }else{
                        print "<br>";
                    }
                ?>
                    <br>
                    質問カテゴリ：<br><?= $_POST['category']?><br><br>
                    質問内容：<br><?= nl2br($_POST['question'])?><br><br>

                    <!--送信された場合のデータ送信用。-->
                    <input type="hidden" name="last_name" value=<?= $_POST['last_name']?>>
                    <input type="hidden" name="first_name" value=<?= $_POST['first_name']?>>
                    <input type="hidden" name="gender" value=<?= $_POST['gender']?>>
                    <input type="hidden" name="address" value=<?= $_POST['address']?>>
                    <input type="hidden" name="phone" value=<?= $_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3']?>>
                    <input type="hidden" name="mail" value=<?= $_POST['mail']?>>
                <?php
                    if(isset($_POST['where'])){
                        foreach($_POST['where'] as $w){
                            print "<input type=\"hidden\" name=\"where[]\" value=".$w.">";
                        }
                    }else{
                        print "<input type=\"hidden\" name=\"where[]\" value=\"\">";
                    }
                ?>
                    <input type="hidden" name="category" value=<?= $_POST['category']?>>
                <?php
                    foreach(explode("\n",$_POST['question']) as $line){
                        $line = str_replace(" ","&nbsp;",$line);
                        print "<input type=\"hidden\" name=\"question[]\" value=".$line.">";
                    }
                ?>
                <input type="submit" name="submit" value="送信">
                <!--戻る(入力された状態)-->
                <input type="button" value="戻る" onclick="history.back()">
            </form>
            <hr>
            <!--戻る(未入力状態)-->
            <a href="query.php">未入力状態で書き直します</a>
        <center>
    </body>
</html>
