<!DOCTYPE html>
<html>
    <!--
        問合せフォーム
        入力画面

        確認 → 確認画面：confirm.php
        リセット → 入力内容の初期化
    -->
    <head>
        <title>お問い合わせ</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <form method="post" action="confirm.php">
            <hr>
            <div>
                <h1>お問い合わせ</h1>
                <hr>
                <!--入力フォーム-->
                <div class="flex">
                    <div class="c1">姓</div>
                    <div class="c2"><input required type="text" name="last_name" size=5 pattern="[^\s]+" placeholder="例：鈴木"></div>
                </div>
                <div class="flex">
                    <div class="c1">名</div>
                    <div class="c2"><input required type="text" name="first_name" size=5 pattern="[^\s]+" placeholder="例：一郎"></div>
                </div>
                <div class="flex">
                    <div class="c1">性別</div>
                    <div class="c2">
                        <input type="radio" name="gender" value="男">男
                        <input type="radio" name="gender" value="女">女
                        <input type="radio" name="gender" value="不明" checked="checked">不明
                    </div>
                </div>
                <div class="flex">
                    <div class="c1">住所</div>
                    <div class="c2"><input type="text" name="address" placeholder="例：東京都○○区xx丁目△△"></div>
                </div>
                <div class="flex">
                    <div class="c1">電話番号</div>
                    <div class="c2">
                        <input required type="text" name="phone1" size=2 pattern="^[0-9]+$" placeholder="000">
                        - <input required type="text" name="phone2" size=2 pattern="^[0-9]+$" placeholder="1234">
                        - <input required type="text" name="phone3" size=2 pattern="^[0-9]+$" placeholder="5678">
                    </div>
                </div>
                <div class="flex">
                    <div class="c1">メールアドレス</div>
                    <div class="c2"><input required type="text" name="mail" pattern="[^\s]+@[^\s]+" placeholder="1234@abc.efg"></div>
                </div>
                <div class="flex">
                    <div class="c1">どこで知ったか</div>　　
                    <div class="c2">
                        <input type="checkbox" name="where[]" value="雑誌">雑誌
                        <input type="checkbox" name="where[]" value="新聞">新聞
                    </div>
                </div>

                <div class="flex">
                    <div class="c1">質問カテゴリ</div>
                <!--<input type="text" name="category" size=5>-->
                    <div class="c2">
                        <select name="category">
                            <option value="AAA">AAA</option>
                            <option value="BBB">BBB</option>
                            <option value="CCC">CCC</option>
                            <option value="DDD">DDD</option>
                        </select>
                    </div>
                </div>
                <div class="flex">
                    <div class="c1">質問内容</div>
                    <!--<input type="text" name="question"><br>-->
                    <div class="c2"><textarea name="question" cols="30" rows="5"></textarea></div>
                </div>
                <div class="center">
                    <input type="submit" name="submit" value="確認">
                    <input type="reset" value="リセット">
                </div>
            </div>
        </form>
    </body>
</html>
