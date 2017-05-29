<!DOCTYPE html>
<html>
    <head>
        <!--
            問合せ完了

            問合せフォーム → (入力内容を初期化して)問合せフォーム query.php
        -->
        <title>お問い合わせ終了</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <?php
            session_start();
            if(empty($_SERVER['HTTP_REFERER'])){
                unset($_SESSION['reload']);
                header('Location: query.php');
            }
        ?>
        <div id="wrapper">
            <!--問い合わせ内容表示-->
            <h1>お問い合わせ完了</h1>
            <hr>
            <!--問合せ番号カウンタ・問い合わせ内容保存(csv形式)-->
            <?php
                $fp = fopen( "admin.csv", "r+" );
                //$str=trim(fgets($fp));
                $count = -1;
                while(($tmp=fgets($fp))!=false){
                    $str = $tmp;
                    $str = trim($str);
                    $count = explode(",",$str)[0];
                }
                $count++;
                $output = $count;
                $data = $_POST;
                $data['last_name'] = $data['last_name']." ".$data['first_name'];
                unset($data['first_name']);
                //print $data['question'];
                foreach($data as $key => $p){
                    if(isset($p) and is_array($p)){
                        $output .= ",";
                        foreach($p as $a){
                            print $key.count($p);
                            if($key == "question"){
                                $output .= $a."<br>";
                            }else{
                                $output .= $a.",";
                            }
                        }
                        //$output = rtrim($output,",");
                        $output = substr($output,0,-1);
                        $output = rtrim($output,"<br>");
                    }elseif($key != "submit" and $p != "送信"){
                        $output .= ",".$p;
                    }
                }

                if(isset($_SESSION['reload'])){
                    fputs( $fp, $output."\n");
                    fclose( $fp );
                    unset($_SESSION['reload']);
                }
            ?>
            <div class="center">
                <div>お問い合わせ番号：<?= $count?></div>
            </div>
            <hr>
            <div class="center">
                <a href="query.php">問合せフォーム</a>
            </div>
        </div>
    </body>
</html>
