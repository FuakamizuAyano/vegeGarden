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
        <h1>商品修正</h1>
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
        $pro_gazou_name_old = $rec['gazou'];

        $dbh = null;

        if($pro_gazou_name_old == ''){
            $disp_gazou = '';
        }else{
            $disp_gazou = '<img src="./gazou/'.$pro_gazou_name_old.'">';
        }
    }
    catch(Exception $e){
        echo 'ただいま障害により大変なご迷惑をお掛けしております';
        exit();
    }
    ?>
    
    <p>商品コード:  <?php echo $pro_code; ?></p>
    
    <form method="post" action="pro_edit_check.php" enctype="multipart/form-data">
        <input type="hidden" name="code" value="<?php echo $pro_code; ?>">
        <input type="hidden" name="gazou_name_old" value="<?php echo $pro_gazou_name_old; ?>">
            <p>商品名  <input type="text" name="name" style="width:200px" value="<?php echo $pro_name; ?>"></p>
            <p>価格  <input type="text" name="price" style="width:50px" value="<?php echo $pro_price."円"; ?>"></p>
        
        <br>
        <?php echo $disp_gazou; ?>
        <p>画像を選んでください。</p>
        <br>
        <input type="file" name="gazou" style="width:400px">
        <br>
        <br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type= "submit" value="OK">
    </form>

</body>
</html>