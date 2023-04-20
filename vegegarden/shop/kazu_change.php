<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>べジ農園</title>
</head>
<body style="background-color:#FFFFF0;text-align:center;">
    <div style="border-style:solid;font-family:'Hiragino Mincho ProN','ＭＳ 明朝',serif;">
        <h1>数量確認</h1>
    </div>
    <br>

    <?php
    session_start();
    session_regenerate_id();

    require_once('../common/common.php');

    $post = sanitize($_POST);
    $max = $post['max'];

    $kazu = array();

    for($i=0; $i<$max; $i++){
        $kazu[] = $post['kazu'.$i];
    }

    $cart = $_SESSION['cart'];

    for($i=$max-1; 0<=$i; $i--){
        if(preg_match("/\A[0-9]+\z/",$post['kazu'.$i]) == 0){
            echo '数量に誤りがあります。';
            echo '<a href="shop_cartlook.php">カートに戻る</a>';
            exit();
        }

        if($post['kazu'.$i] < 1 || 10 < $post['kazu'.$i]){
            echo '数量は必ず1個以上、10個までです。';
            echo '<a href="shop_cartlook.php">カートに戻る</a>';
            exit();
        }
        
        $kazu[] = $post['kazu'.$i];
        if(isset($_POST['sakujo'.$i]) == true){
            array_splice($cart, $i, 1);
            array_splice($kazu, $i, 1);
        }
    }

    $_SESSION['cart'] = $cart;
    $_SESSION['kazu'] = $kazu;

    header('Location: shop_cartlook.php');
    exit();
    ?>
</body>
</html>