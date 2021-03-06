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
            <form method="post">
                <div class="a">
                    <table border=1>
                    <?php
                        //ソート
                        function table_sort($num,$rule){
                            global $datas;
                            if(!count($datas)) return;
                            foreach($datas as $key=>$data){
                                $tmp[$key] = $data[$num];
                            }
                            array_multisort($tmp,$rule,$datas);
                        }
                        //削除
                        function erase($e){
                            global $datas;
                            foreach($e as $value){
                                 unset($datas[$value]);
                            }
                            $datas = array_values($datas);
                        }
                    ?>

                    <?php
                        //admin.csv読み込み
                        $fp = fopen( "admin.csv", "r+" );
                        while(($str=fgets($fp))!=false){
                            $datas[] = explode(",",$str);
                        }
                        $count = array_slice($datas,-1,1)[0][0];
                        $datas = array_slice($datas,0,-1);
                        $cat = [0,1,2];
                        //ソート
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
                                table_sort(8,SORT_DESC);
                                table_sort(7,SORT_DESC);
                                table_sort(6,SORT_DESC);
                                break;
                            case "where2":
                                table_sort(8,SORT_DESC);
                                table_sort(6,SORT_DESC);
                                table_sort(7,SORT_DESC);
                                $cat = [1,0,2];
                                break;
                            case "where3":
                                table_sort(7,SORT_DESC);
                                table_sort(6,SORT_DESC);
                                table_sort(8,SORT_DESC);
                                $cat = [2,0,1];
                                break;
                            case "category":
                                table_sort(9,SORT_ASC);
                                break;
                            default:
                                break;
                        }

                        //カテゴリを1列にまとめる奴
                        if(isset($_POST['button']) and $_POST['button'] === "詳細" and isset($_POST['_checkbox']) and count($_POST['_checkbox']) === 1){
                            $cat = [0,1,2];
                        }
                        foreach($datas as $key => $data){
                            $tmp = "";
                            foreach($cat as $c){
                                $tmp .= $data[6+$c]." ";
                            }
                            //print $tmp."<br>";
                            array_splice($data,6,count($data)-8);
                            array_splice($data,6,0,substr($tmp,0,-1));
                            $datas[$key] = $data;
                        }

                        //詳細表示

                        if(isset($_POST['button']) and $_POST['button'] === "詳細" and isset($_POST['_checkbox'])){

                            print "<caption>詳細</caption>";
                            foreach($_POST['_checkbox'] as $i){
                                print "<tr><th>No.</th>";
                                print "<th>氏名</th>";
                                print "<th>性別</th>";
                                print "<th>住所</th>";
                                print "<th>電話番号</th>";
                                print "<th>メールアドレス</th>";
                                print "<th>どこで知ったか</th>";
                                print "<th>質問カテゴリ</th></tr>";
                                print "<tr class=\"exc\">";
                                foreach(array_slice($datas[$i],0,-1) as $key => $d){
                                    print "<td align=\"center\">".$d."</td>";
                                }
                                print "</tr>";
                                print "</tr>";
                                print "<tr><th colspan=8>質問内容</th></tr>";
                                print "<tr class=\"exc\"><td  colspan=8 align=\"center\">".array_slice($datas[$i],-1,1)[0]."</td></tr>";
                                print "<tr class=\"exc\"><td colspan=8></td></tr>";
                            }
                            print "</table>";
                            print "<input class=\"button\" type=\"submit\" value=\"戻る\">";
                            return;
                        }
                    ?>
                    <!--表示-->
                    <caption>お問い合わせ一覧</caption>
                    <tr>
                        <th></th>
                        <th><a href="admin.php?no">No.</a></th>
                        <th><a href="admin.php?name">氏名</a></th>
                        <th><a href="admin.php?gender">性別</a></th>
                        <th><a href="admin.php?address">住所</a></th>
                        <th><a href="admin.php?phone">電話番号</a></th>
                        <th><a href="admin.php?mail">メールアドレス</a></th>
                        <th><a href="admin.php?<?php
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
                        <th><a href="admin.php?category">質問カテゴリ</a></th>
                        <th>質問内容</th>
                    </tr>
                    <?php
                        if( isset($_POST['button']) and $_POST['button'] === "検索" and isset($_POST['button'])){
                            $n = $_POST['select'];
                            foreach($datas as $key => $data){
                                $word = htmlentities($_POST['search']);
                                //$word = str_replace(" ","&nbsp;",$word);
                                $word = str_replace(",","&#x2C",$word);
                                if(strpos($data[$n],$word) === false){
                                    unset($datas[$key]);
                                }
                            }
                            $datas = array_values($datas);
                        }

                        //削除
                        if(isset($_POST['_checkbox']) and $_POST['button'] === "削除"){
                            erase($_POST['_checkbox']);
                        }
                        //表示
                        if(isset($datas)){
                            foreach($datas as $k => $data){
                                print "<tr>";
                                print "<td class=\"checkbox\"><input class=\"admin\" type=\"checkbox\" name=\"_checkbox[]\" value=".$k."></td>";
                                foreach($data as $key => $d){
                                    //100文字以上なら省略
                                    if(strlen($d) > 100){
                                      $d = substr($d,0,100)." ...";
                                    }
                                    print "<td align=\"center\">".$d."</td>";
                                }
                                print "</tr>";
                            }
                        }
                        //削除後のデータ保存
                        if(isset($_POST['_checkbox']) and $_POST['button'] === "削除"){
                            table_sort(0,SORT_ASC);
                            rewind($fp);
                            ftruncate($fp,0);//ファイル初期化
                            foreach($datas as $key => $data){
                                $data[6] = str_replace(" ",",",$data[6]);
                                //print $data[6]."<br>";
                                fputs($fp,implode(",",$data));
                            }
                            fputs($fp,$count);
                        }
                        fclose($fp);
                    ?>
                    </table>
                    <?php
                        if( isset($_POST['button']) and $_POST['button'] === "検索" and isset($_POST['button'])){
                            print "<input class=\"button\" type=\"submit\" value=\"戻る\">";
                            return;
                        }
                    ?>


                    <input class="button" type="submit" name="button" value="削除">
                    <input class="button" type="submit" name="button" value="詳細"><br>
                    <select class="exc" name="select">
                        <option value="0">No.</option>
                        <option value="1">氏名</option>
                        <option value="2">性別</option>
                        <option value="3">住所</option>
                        <option value="4">電話番号</option>
                        <option value="5">メールアドレス</option>
                        <option value="6">どこで知ったか</option>
                        <option value="7">質問カテゴリ</option>
                        <option value="8">質問内容</option>
                    </select>
                    <input type="text" name="search">
                    <input class="button" type="submit" name="button" value="検索">
                </div>
            </form>
    </body>
</html>
