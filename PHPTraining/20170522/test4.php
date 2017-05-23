<html>
    <head>
        <title>管理</title>
    </head>

    <body>
        <center>

            <table border=1>
                <caption>お問い合わせ一覧</caption>
                <tr>
                    <td>No.</td>
                    <td colspan=2>氏名</td>
                    <td>性別</td>
                    <td>住所</td>
                    <td>電話番号</td>
                    <td>メールアドレス</td>
                    <td>どこで知ったか</td>
                    <td>質問カテゴリ</td>
                    <td>質問内容</td>
                </tr>
            <?php
                $fp = fopen( "count.csv", "r+" );
                while(($str=fgets($fp))!=false){
                    $data = explode(",",$str);
                    $data[7] .= (" ".$data[8]);
                    unset($data[8]);
                    print "<tr>";
                    foreach($data as $key => $d){
                        print "<td>".$d."</td>";
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
