<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false){
    echo 'ログインされていません<br>';
    echo '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>べジ農園</title>
</head>
<body style="background-color:#FFFFF0;text-align:center;">
<div style="border-style:solid;font-family:'Hiragino Mincho ProN','ＭＳ 明朝',serif;">
        <h1>修正確認</h1>
    </div>
    <br>

    <?php
    $pro_code = $_POST['code'];
    $pro_name = $_POST['name'];
    $pro_price = $_POST['price'];
    $pro_gazou_name_old = $_POST['gazou_name_old'];
    $pro_gazou = $_FILES['gazou'];

    $pro_code = htmlspecialchars($pro_code, ENT_QUOTES, 'UTF-8');
    $pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
    $pro_price = htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');

    if($pro_name == ''){
        echo '商品名が入力されていません。<br>';
    }else{
        echo '商品名:';
        echo $pro_name;
        echo '<br>';
    }

    if(preg_match('/\A[0-9]+\z/',$pro_price) == 0){
        echo '価格をきちんと入力してください。<br><br>';
    }else{
        echo '価格:';
        echo $pro_price;
        echo '円<br><br>';
    }

    if($pro_gazou['size'] > 0){
        if($pro_gazou['size'] > 1000000){
            echo '画像が大き過ぎます。';
        }else{
            move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
            echo '<img src = "./gazou/'.$pro_gazou['name'].'">';
            echo '<br>';
        }
    }

    if($pro_name == '' || preg_match('/\A[0-9]+\z/',$pro_price) == 0 || $pro_gazou['size'] > 1000000){
        echo '<form>';
        echo '<input type="button" onclick="history.back()" value="戻る">';
        echo '</form>';
    }else{
        echo '上記のように変更します。<br>';
        echo '<form method="post" action="pro_edit_done.php">';
        echo '<input type="hidden" name="code" value="'.$pro_code.'">';
        echo '<input type="hidden" name="name" value="'.$pro_name.'">';
        echo '<input type="hidden" name="price" value="'.$pro_price.'">';
        echo '<input type="hidden" name="gazou_name_old" value="'.$pro_gazou_name_old.'">';
        echo '<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
        echo '<br>';
        echo '<input type="button" onclick="history.back()" value="戻る">';
        echo '<input type="submit" value="OK">';
        echo '</form>';
    }

    

    
    ?>

</body>
</html>