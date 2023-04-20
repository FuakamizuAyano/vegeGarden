<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login']) == false){
    echo 'ようこそゲスト様';
    echo '<a href="member_login.php">会員ログイン</a><br>';
    echo '<br>';
}else{
    echo 'ようこそ';
    echo $_SESSION['member_name'];
    echo '様';
    echo '<a href="member_logout.php">ログアウト</a><br>';
    echo '<br>';
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
        <h1>商品情報参照</h1>
    </div>
    <br>

    <?php
    try{
        $pro_code = $_GET['procode'];

        if(isset($_SESSION['cart']) == true){
            $cart = $_SESSION['cart'];
            $kazu = $_SESSION['kazu'];
        if(in_array($pro_code, $cart) == true){
            echo 'その商品はすでにカートに入っています。<br><br>';
            echo '<a href="shop_list.php">商品一覧に戻る</a>';
            exit();
        }
        }
        
        $cart[] = $pro_code;
        $kazu[] = 1;
        $_SESSION['cart'] = $cart;
        $_SESSION['kazu'] = $kazu;

    }
    catch(Exception $e){
        echo 'ただいま障害により大変なご迷惑をお掛けしております';
        exit();
    }

    echo '<br>';
    echo '<a href="shop_cartlook.php">カートを見る</a><br>';

    ?>

    <p>カートに追加しました。</p>
    <br>
    <a href="shop_list.php">商品一覧に戻る</a>

</body>
</html>