<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>べジ農園</title>
</head>
<body style="background-color:#FFFFF0;text-align:center;">
    <div style="border-style:solid;font-family:'Hiragino Mincho ProN','ＭＳ 明朝',serif;">
        <h1>スタッフ情報削除完了</h1>
    </div>
    <br>

    <?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['login']) == false){
        echo 'ログインされていません<br>';
        echo '<a href="../staff_login/staff_login.php">ログイン画面へ</a>';
        exit();
    }

    try{
        $staff_code = $_POST['code'];

        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'DELETE FROM mst_staff WHERE code=?';
        $stmt = $dbh -> prepare($sql);
        $data[] = $staff_code;
        $stmt -> execute($data);

        $dbh = null;
    }

    catch(Exception $e){
        echo 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    ?>

    <p>削除しました。</p>

    <a href="staff_list.php">戻る</a>

</body>
</html>