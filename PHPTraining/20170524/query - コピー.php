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
        <hr>
        <form method="post" action="confirm.php">
            <center>
            <h1>お問い合わせ</h1>
            <hr>
            <!--入力フォーム-->
            <table border="0">
            <tr><td>
                姓　<input required type="text" name="last_name" size=5 pattern="[^\s]+" placeholder="例：鈴木"><br>
            </td></tr>
            <tr><td>
                名　<input required type="text" name="first_name" size=5 pattern="[^\s]+" placeholder="例：一郎"><br>
            </td></tr>
            <tr><td>
                性別　<input type="radio" name="gender" value="男">男
                <input type="radio" name="gender" value="女">女
                <input type="radio" name="gender" value="不明" checked="checked">不明
                <br>
            </td></tr>
            <tr><td>
                住所　<input type="text" name="address" placeholder="例：東京都○○区xx丁目△△"><br>
            </td></tr>
            <tr><td>
                電話番号　<input required type="text" name="phone1" size=2 pattern="^[0-9]+$" placeholder="000">
                - <input required type="text" name="phone2" size=2 pattern="^[0-9]+$" placeholder="1234">
                - <input required type="text" name="phone3" size=2 pattern="^[0-9]+$" placeholder="5678">
                <br>
            </td></tr>
            <tr><td>
                メールアドレス　<input required type="text" name="mail" pattern="[^\s]+@[^\s]+" placeholder="1234@abc.efg"><br>
            </td></tr>
            <tr><td>
                どこで知ったか　　
                <!--
                <input type="hidden" name="where1" value="">
                <input type="hidden" name="where2" value="">
                <input type="checkbox" name="where1" value="雑誌">雑誌
                <input type="checkbox" name="where2" value="新聞">新聞
                -->
                <input type="checkbox" name="where[]" value="雑誌">雑誌
                <input type="checkbox" name="where[]" value="新聞">新聞
                <br>
            </td></tr>
            <tr><td>
                質問カテゴリ
                <!--<input type="text" name="category" size=5>-->
                <select name="category">
                    <option value="AAA">AAA</option>
                    <option value="BBB">BBB</option>
                    <option value="CCC">CCC</option>
                    <option value="DDD">DDD</option>
                </select>
                <br>
                <br>
            </td></tr>
            <tr><td>
                質問内容<br>
                <!--<input type="text" name="question"><br>-->
                <textarea name="question" cols="30" rows="5"></textarea>
            </td></tr>
            <tr><td>
                <input type="submit" name="submit" value="確認">
                <input type="reset" value="リセット">
            </td></tr>
            </table>
            </center>
        </form>
    </body>
</html>
