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
        <h1>修正完了</h1>
    </div>
    <br>
    
    <?php
    try{
        $pro_code = $_POST['code'];
        $pro_name = $_POST['name'];
        $pro_price = $_POST['price'];
        $pro_gazou_name_old = $_POST['gazou_name_old'];
        $pro_gazou_name = $_POST['gazou_name'];

        $pro_code = htmlspecialchars($pro_code, ENT_QUOTES, 'UTF-8');
        $pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
        $pro_price = htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');

        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $priceword = '';
        $dbh = new PDO($dsn, $user, $priceword);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'UPDATE mst_product SET name=?, price=?, gazou=? WHERE code =?';
        $stmt = $dbh -> prepare($sql);
        $data = array($pro_name, $pro_price, $pro_gazou_name, $pro_code);
        $stmt -> execute($data);

        $dbh = null;

        if($pro_gazou_name_old != $pro_gazou_name){
            if($pro_gazou_name_old != ''){
                unlink('./gazou/'.$pro_gazou_name_old);
            }
        }

        echo '修正しました。<br>';
    }
    catch(Exception $e){
        echo 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    ?>

    <a href="pro_list.php">戻る</a>

</body>
</html>