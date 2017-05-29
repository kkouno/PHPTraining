<html>
    <head>
        <!--
            管理画面
            count.csvの内容をもとに問合せ一覧を表示。
        -->
        <title>管理</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div id="admin">
            <h1><a class="nodecoration" href="admin.php">管理画面</a></h1>
            <hr>
            <div class="a">
                <table border=1>
                    <caption>お問い合わせ一覧</caption>
                    <tr>
                        <th align="center"><a href="admin.php?no">No.</a></th>
                        <th align="center"><a href="admin.php?name">氏名</a></th>
                        <th align="center">性別</th>
                        <th align="center">住所</th>
                        <th align="center">電話番号</th>
                        <th align="center">メールアドレス</th>
                        <th align="center">どこで知ったか</th>
                        <th align="center"><a href="admin.php?category">質問カテゴリ</a></th>
                        <th align="center">質問内容</th>
                    </tr>
                <?php
                    function table_sort($num){
                        global $datas;
                        foreach($datas as $key=>$data){
                            $tmp[$key] = $data[$num];
                        }
                        array_multisort($tmp,SORT_ASC,$datas);
                    }
                    $fp = fopen( "admin.csv", "r+" );
                    while(($str=fgets($fp))!=false){
                        $datas[] = explode(",",$str);
                    }
                    switch($_SERVER['QUERY_STRING']){
                        case "no":
                            table_sort(0);
                            break;
                        case "name":
                            table_sort(1);
                            break;
                        case "category":
                            table_sort(7);
                            break;
                        default:
                            break;
                    }
                    foreach($datas as $data){
                        print "<tr>";
                        foreach($data as $key => $d){
                            print "<td align=\"center\">".$d."</td>";
                        }
                        print "</tr>";
                    }
                ?>
                </table>
            </div>
    </body>
</html>
