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
                        <th align="center"><a href="admin.php?gender">性別</a></th>
                        <th align="center"><a href="admin.php?address">住所</a></th>
                        <th align="center"><a href="admin.php?phone">電話番号</a></th>
                        <th align="center"><a href="admin.php?mail">メールアドレス</a></th>
                        <th align="center"><a href="admin.php?<?php
                        switch($_SERVER['QUERY_STRING']){
                            case "where":
                                print "where2";
                                break;
                            case "where2":
                                print "where3";
                                break;
                            case "where3":
                                print "where";
                                break;
                            default:
                                print "where";
                        }?>">どこで知ったか</a></th>
                        <th align="center"><a href="admin.php?category">質問カテゴリ</a></th>
                        <th align="center">質問内容</th>
                    </tr>
                <?php
                    function table_sort($num,$rule){
                        global $datas;
                        foreach($datas as $key=>$data){
                            $tmp[$key] = $data[$num];
                        }
                        array_multisort($tmp,$rule,$datas);
                    }
                    $fp = fopen( "admin.csv", "r+" );
                    while(($str=fgets($fp))!=false){
                        $datas[] = explode(",",$str);
                    }

                    switch($_SERVER['QUERY_STRING']){
                        case "no":
                            table_sort(0,SORT_ASC);
                            break;
                        case "name":
                            table_sort(1,SORT_ASC);
                            break;
                        case "gender":
                            table_sort(2,SORT_DESC);
                            break;
                        case "address":
                            table_sort(3,SORT_ASC);
                            break;
                        case "phone":
                            table_sort(4,SORT_ASC);
                            break;
                        case "mail":
                            table_sort(5,SORT_ASC);
                            break;
                        case "where":
                            table_sort(6,SORT_DESC);
                            break;
                        case "where2":
                            table_sort(7,SORT_DESC);
                            break;
                        case "where3":
                            table_sort(8,SORT_DESC);
                            break;
                        case "category":
                            table_sort(9,SORT_ASC);
                            break;
                        default:
                            break;
                    }

                    foreach($datas as $key => $data){
                        $tmp = "";
                        for($i=0;$i<count($data)-8;$i++){
                            $tmp .= $data[6+$i]." ";
                        }
                        array_splice($data,6,count($data)-8);
                        array_splice($data,6,0,rtrim($tmp));
                        $datas[$key] = $data;
                    }

                    if(isset($datas)){
                        foreach($datas as $data){
                            print "<tr>";
                            foreach($data as $key => $d){
                                print "<td align=\"center\">".$d."</td>";
                            }
                            print "</tr>";
                        }
                    }
                ?>
                </table>
            </div>
    </body>
</html>
