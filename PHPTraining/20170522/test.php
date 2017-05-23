<html>
    <!--ヘッダ・タイトル-->
    <head>
        <title>お問い合わせ</title>
    </head>

    <body>
        <hr>
        <form method="post" action="test2.php">
            <center>
            お問い合わせ<br>
            <hr>
            <!--入力フォーム-->
            <table border="0">
            <tr><td>
                姓　<input type="text" name="last_name" size=5><br>
            </td></tr>
            <tr><td>
                名　<input type="text" name="first_name" size=5><br>
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
                電話番号　<input type="number" name="phone1" size=2>
                - <input type="number" name="phone2" size=2>
                - <input type="number" name="phone3" size=2>
                <br>
            </td></tr>
            <tr><td>
                メールアドレス　<input type="text" name="mail"><br>
            </td></tr>
            <tr><td>
                <input type="hidden" name="where1" value="">
                <input type="hidden" name="where2" value="">
                どこで知ったか　　<input type="checkbox" name="where1" value="雑誌">雑誌
                <input type="checkbox" name="where2" value="新聞">新聞
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
