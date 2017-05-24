<html>
    <head>
        <!--
            管理画面
            count.csvの内容をもとに問合せ一覧を表示。
        -->
        <title>管理</title>
        <link rel="stylesheet" type="text/css" href="font.css">
    </head>

    <body>
        <center>
            <hr>
            <h1>管理画面</h1>
            <table border=1>
                <caption>お問い合わせ一覧</caption>
                <tr>
                    <td align="center">No.</td>
                    <td align="center">氏名</td>
                    <td align="center">性別</td>
                    <td align="center">住所</td>
                    <td align="center">電話番号</td>
                    <td align="center">メールアドレス</td>
                    <td align="center">どこで知ったか</td>
                    <td align="center"><a href="admin.php?question">質問カテゴリ</a></td>
                    <td align="center">質問内容</td>
                </tr>
            <?php
                //if($_SERVER['QUERY_STRING'] == "question"){

                //}
                $fp = fopen( "count.csv", "r+" );
                while(($str=fgets($fp))!=false){
                    $data = explode(",",$str);
                    print "<tr>";
                    foreach($data as $key => $d){
                        print "<td align=\"center\">".$d."</td>";
                    }
                    print "</tr>";
                }
                fclose( $fp );
            ?>
            <hr>
            </table>
        <center>
    </body>
</html>
