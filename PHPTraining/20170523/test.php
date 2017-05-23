<html>
    <!--ヘッダ・タイトル-->
    <head>
        <title>お問い合わせ</title>
        <link rel="stylesheet" type="text/css" href="test5.css">
    </head>

    <body>
        <hr>
        <form method="post" action="test2.php">
            <center>
            <h1>お問い合わせ</h1><br>
            <hr>
            <!--入力フォーム-->
            <table border="0">
            <tr><td>
                姓　<input required type="text" name="last_name" size=5><br>
            </td></tr>
            <tr><td>
                名　<input required type="text" name="first_name" size=5><br>
            </td></tr>
            <tr><td>
                性別　<input type="radio" name="gender" value="男">男
                <input type="radio" name="gender" value="女">女
                <input type="radio" name="gender" value="不明" checked="checked">不明
                <br>
            </td></tr>
            <tr><td>
                住所　<input type="text" name="address"><br>
            </td></tr>
            <tr><td>
                電話番号　<input required type="text" name="phone1" size=2 pattern="^[0-9]+$">
                - <input required type="text" name="phone2" size=2 pattern="^[0-9]+$">
                - <input required type="text" name="phone3" size=2 pattern="^[0-9]+$">
                <br>
            </td></tr>
            <tr><td>
                メールアドレス　<input required type="text" name="mail"><br>
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
                <input type="checkbox" name="where[]" value="新聞">雑誌
                <br>
            </td></tr>
            <tr><td>
                質問カテゴリ <input type="text" name="category" size=5><br>
                <br>
            </td></tr>
            <tr><td>
                質問内容<br>
                <!--<input type="text" name="question"><br>-->
                <textarea name="question" cols="30" rows="5"></textarea>
            </td></tr>
            <tr><td>
                <input type="submit" name="submit" value="確認">
                <input type="reset" value="reset">
            </td></tr>
            </table>
            </center>
        </form>
    </body>
</html>
