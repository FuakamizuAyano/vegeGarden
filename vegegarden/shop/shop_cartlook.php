<?php
session_start();
session_regenerate_id();
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
        <h1>カートの中身</h1>
    </div>
    <br>

    <?php
    try{
            if(isset($_SESSION['cart']) == true){
                $cart = $_SESSION['cart'];
                $kazu = $_SESSION['kazu'];
                $max = count($cart); 
            }else{
                $max = 0;
            }

            if($max == 0){
                echo 'カートに商品が入っていません。<br>';
                echo '<br>';
                echo '<a href="shop_list.php">商品一覧へ戻る</a>';
                exit();
            }
        
        $dsn = 'mysql:dbname=shop; host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        foreach($cart as $key => $val){
            $sql = 'SELECT code, name, price, gazou FROM mst_product WHERE code=?';
            $stmt = $dbh -> prepare($sql);
            $data[0] = $val;
            $stmt -> execute($data);

            $rec = $stmt -> fetch(PDO::FETCH_ASSOC);

            $pro_name[] = $rec['name'];
            $pro_price[] = $rec['price'];
            
            if($rec['gazou'] == ''){
                $pro_gazou[] = '';
            }else{
                $pro_gazou[] = '<img src="../product/gazou/'.$rec['gazou'].'">';
            }
        }
    }catch(Exception $e){
            echo 'ただいま障害により大変なご迷惑をお掛けしております';
            exit();
        }

    ?>

<br>
<form method="post" action="kazu_change.php">
<table border="1">
    <tr>
        <td>商品</td>
        <td>商品画像</td>
        <td>価格</td>
        <td>数量</td>
        <td>小計</td>
        <td>削除</td>
    </tr>

<?php
    for($i=0; $i<$max; $i++){
    ?>
    <tr>
        <td><?php echo $pro_name[$i]; ?></td>
        <td><?php echo $pro_gazou[$i]; ?></td>
        <td><?php echo $pro_price[$i]; ?>円</td>
        <td><input type="text" name="kazu<?php echo $i;?>" value="<?php echo $kazu[$i]; ?>"></td>
        <td><?php echo $pro_price[$i] * $kazu[$i]; ?>円</td>
        <td><input type = "checkbox" name="sakujo<?php echo $i; ?>"></td>
    </tr>

<?php
    }
?>

</table>
    <input type="hidden" name="max" value="<?php echo $max; ?>">
    <br>
    <input type="submit" value="数量変更">
    <input type="button" onclick="history.back()" value="戻る">
    
</form>
<br>
<a href="shop_form.php">ご購入手続きへ進む</a><br>

<?php
if(isset($_SESSION["member_login"]) == true){
    echo '<a href="shop_kantan_check.php">会員かんたん注文へ進む</a><br>';
}
?>
</body>
</html>