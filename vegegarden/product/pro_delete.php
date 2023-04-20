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
        <h1>商品削除</h1>
    </div>
    <br>

    <?php
    try{ 
        $pro_code = $_GET['procode'];

        $dsn = 'mysql:dbname=shop; host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT name, gazou FROM mst_product WHERE code = ?';
        $stmt = $dbh -> prepare($sql);
        $data[] = $pro_code;
        $stmt -> execute($data);

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        $pro_name = $rec['name'];
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
    
    <p>商品コード</p>
    
    <?php echo $pro_code; ?>
    <p>商品名</p>
    <?php echo $pro_name; ?>

    <br>
    <?php echo $disp_gazou; ?>
    <br>

    <p>この商品を削除してよろしいですか？</p>

    <form method="post" action="pro_delete_done.php">
        <input type="hidden" name="code" value="<?php echo $pro_code; ?>">
        <input type="hidden" name="gazou_name" value="<?php echo $pro_gazou_name; ?>">
        <input type="button" onclick="history.back()" value="戻る">
        <input type= "submit" value="OK">
    </form>

</body>
</html>