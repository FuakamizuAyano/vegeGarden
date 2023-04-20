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
        <h1>商品情報参照</h1>
    </div>

    <?php
    try{
        $pro_code = $_GET['procode'];

        $dsn = 'mysql:dbname=shop; host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT name,price,gazou FROM mst_product WHERE code = ?';
        $stmt = $dbh -> prepare($sql);
        $data[] = $pro_code;
        $stmt -> execute($data);

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        $pro_name = $rec['name'];
        $pro_price = $rec['price'];
        $pro_gazou_name = $rec['gazou'];

        $dbh = null;

        if($pro_gazou_name == ''){
            $disp_gazou = '';
        }else{
            $disp_gazou = '<img src="./gazou/'.$pro_gazou_name.'">';
        }
    }
    catch(Exception $e){
        echo 'ただいま障害により大変なご迷惑をお掛けしております';
        exit();
    }
    ?>
    
    <p>商品コード:  <?php echo $pro_code; ?></p>
    <P>商品名:  <?php echo $pro_name; ?></p>
    <p>価格:  <?php echo $pro_price."円"; ?></p>
    
    <br>
    <?php echo $disp_gazou; ?>
    <br>

    <form>
    <br>
    <input type="button" onclick="history.back()" value="戻る">
    </form>

</body>
</html>