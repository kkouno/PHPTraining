<html>
    <head>
        <title>管理</title>
    </head>

    <body>
        <center>

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
                    <td align="center">質問カテゴリ</td>
                    <td align="center">質問内容</td>
                </tr>
            <?php
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
                print "<hr>";
            ?>
            </table>
        <center>
    </body>
</html>
