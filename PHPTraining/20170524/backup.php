姓：<br><?= $_POST['last_name']?><br><br>
名：<br><?= $_POST['first_name']?><br><br>
性別：<br><?= $_POST['gender']?><br><br>
住所：<br><?= $_POST['address']?><br><br>
電話番号：<br><?= $_POST['phone']?><br><br>
メールアドレス：<br><?= $_POST['mail']?><br><br>
どこで知ったか：<br>

<?php

if(isset($_POST['where'])){
    foreach($_POST['where'] as $w){
        print $w."<br>";
    }
}

?>

<br>
質問カテゴリ：<br><?= $_POST['category']?><br><br>
質問内容：<br>

<?php

foreach($_POST['question'] as $cat){
    print $cat."<br>";
}

?>

<br><br>
