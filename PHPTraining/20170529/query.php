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
            <?php
                session_start();
                $_SESSION['reload'] = "reload";
            ?>
            <div id="wrapper">
                <h1>お問い合わせ</h1>
                <hr>
                <!--入力フォーム-->
                <div class="flex">
                    <div class="c1">姓</div>
                    <div class="c2"><input required type="text" name="last_name" size=5 pattern="[^\s0-9]+" placeholder="例：鈴木"></div>
                </div>
                <div class="flex">
                    <div class="c1">名</div>
                    <div class="c2"><input required type="text" name="first_name" size=5 pattern="[^\s0-9]+" placeholder="例：一郎"></div>
                </div>
                <div class="flex">
                    <div class="c1">性別</div>
                    <div class="c2">
                        <input class="radiobox" type="radio" name="gender" value="男" id="male">
                        <label for="male" class="radio">男</label>
                        <input type="radio" name="gender" value="女" id="female">
                        <label for="female" class="radio">女</label>
                        <input type="radio" name="gender" value="不明" checked="checked" id="unknown">
                        <label for="unknown" class="radio">不明</label>
                    </div>
                </div>
                <div class="flex">
                    <div class="c1">住所</div>
                    <div class="c2"><input type="text" name="address" placeholder="例：東京都○○区xx丁目△△"></div>
                </div>
                <div class="flex">
                    <div class="c1">電話番号</div>
                    <div class="c2">
                        <input required class="phone" type="text" name="phone1" size=2 pattern="^[0-9]+$" placeholder="000">
                        - <input required class="phone" type="text" name="phone2" size=2 pattern="^[0-9]+$" placeholder="1234">
                        - <input required class="phone" type="text" name="phone3" size=2 pattern="^[0-9]+$" placeholder="5678">
                    </div>
                </div>
                <div class="flex">
                    <div class="c1">メールアドレス</div>
                    <div class="c2">
                        <input required type="text" name="mail" pattern="^[a-zA-Z0-9_-]+$" placeholder="1234" size=10>@<input required type="text" name="domain" pattern="^[a-zA-Z0-9_-\.]+$" placeholder="wefowe.com" size=10>
                    </div>
                </div>
                <div class="flex">
                    <div class="c1">どこで知ったか</div>
                    <div class="c2">
                        <input type="hidden" name="where[0]" value="">
                        <input type="hidden" name="where[1]" value="">
                        <input type="hidden" name="where[2]" value="">
                        <input type="checkbox" name="where[0]" value="雑誌" id="magazine">
                            <label for="magazine" class="checkbox">雑誌</label>
                        <input type="checkbox" name="where[1]" value="新聞" id="newspaper">
                            <label for="newspaper" class="checkbox">新聞</label>
                        <input type="checkbox" name="where[2]" value="その他" id="other">
                            <label for="other" class="checkbox">その他</label>
                    </div>
                </div>

                <div class="flex">
                    <div class="c1">質問カテゴリ</div>
                    <div class="c2">
                        <select required name="category">
                            <option value="">カテゴリを選択</option>
                            <option value="AAA">AAA</option>
                            <option value="BBB">BBB</option>
                            <option value="CCC">CCC</option>
                            <option value="DDD">DDD</option>
                        </select>
                    </div>
                </div>
                <div class="flex">
                    <div class="c1">質問内容</div>
                </div>
                <div class="flex center">
                    <div class="c2"><textarea name="question" cols="50" rows="10"></textarea></div>
                </div>
                <div class="center">
                    <input class="button" type="submit" name="submit" value="確認">
                    <input class="button" type="reset" value="リセット">
                </div>
            </div>
        </form>
    </body>
</html>
