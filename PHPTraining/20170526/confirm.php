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
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <?php
            if(empty($_SERVER['HTTP_REFERER'])){
                unset($_SESSION['reload']);
                header('Location: query.php');
            }
        ?>
        <form method="post" action="completed.php">
            <!--問い合わせ内容の確認-->
            <div id="wrapper">
                <h1>お問い合わせ内容</h1>
                <hr>
                <div class="flex">
                    <div class="c1">姓：</div>
                    <div class="c2"><?= $_POST['last_name']?></div>
                </div>
                <div class="flex">
                    <div class="c1">名：</div>
                    <div class="c2"><?= $_POST['first_name']?></div>
                </div>
                <div class="flex">
                    <div class="c1">性別：</div>
                    <div class="c2"><?= $_POST['gender']?></div>
                </div>
                <div class="flex">
                    <div class="c1">住所：</div>
                    <div class="c2"><?= $_POST['address']?></div>
                </div>
                <div class="flex">
                    <div class="c1">電話番号：</div>
                    <div class="c2"><?= $_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3']?></div>
                </div>
                <div class="flex">
                    <div class="c1">メールアドレス：</div>
                    <div class="c2"><?= $_POST['mail']."@".$_POST['domain']?></div>
                </div>
                <div class="flex">
                    <div class="c1">どこで知ったか：</div>
                    <div class="c2">
                        <?php
                            if(isset($_POST['where'])){
                                foreach($_POST['where'] as $w){
                                    print $w."<br>";
                                }
                            }else{
                                print "<br>";
                            }
                        ?>
                    </div>
                </div>
                <div class="flex">
                    <div class="c1">質問カテゴリ：</div>
                    <div class="c2"><?= $_POST['category']?></div>
                </div>
                <div class="flex">
                    <div class="c1">質問内容：</div>
                </div>
                <div class="flex center">
                    <div class="c2"><?= nl2br($_POST['question'])?></div>
                </div>
                <div>
                    <div></div>
                    <div></div>
                </div>

                <!--送信された場合のデータ送信用。-->
                <input type="hidden" name="last_name" value=<?= $_POST['last_name']?>>
                <input type="hidden" name="first_name" value=<?= $_POST['first_name']?>>
                <input type="hidden" name="gender" value=<?= $_POST['gender']?>>
                <input type="hidden" name="address" value=<?= $_POST['address']?>>
                <input type="hidden" name="phone" value=<?= $_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3']?>>
                <input type="hidden" name="mail" value=<?= $_POST['mail']."@".$_POST['domain']?>>
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
                <div class="center">
                    <input type="submit" name="submit" value="送信">
                    <!--戻る(入力された状態)-->
                    <input type="button" value="戻る" onclick="history.back()">
                </div>
                <hr>
                <!--戻る(未入力状態)-->
                <div class="center">
                    <a href="query.php">未入力状態で書き直します</a>
                </div>
            </div>
        </form>
    </body>
</html>
