<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>べジ農園</title>
</head>
<body style="background-color:#FFFFF0;text-align:center;">
    <div style="border-style:solid;font-family:'Hiragino Mincho ProN','ＭＳ 明朝',serif;">
        <h1>スタッフ修正</h1>
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
        $staff_code = $_GET['staffcode'];

        $dsn = 'mysql:dbname=shop; host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT name FROM mst_staff WHERE code = ?';
        $stmt = $dbh -> prepare($sql);
        $data[] = $staff_code;
        $stmt -> execute($data);

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        $staff_name = $rec['name'];

        $dbh = null;
    }
    catch(Exception $e){
        echo 'ただいま障害により大変なご迷惑をお掛けしております';
        exit();
    }
    ?>
    
    <p>スタッフコード</p>
    
    <?php echo $staff_code; ?>

    <form method="post" action="staff_edit_check.php">
        <input type="hidden" name="code" value="<?php echo $staff_code; ?>">
            <p>スタッフ名<br></p>
        <input type="text" name="name" style="width:200px" value="<?php echo $staff_name; ?>">
            <p>パスワードを入力してください。<br></p>
        <input type="password" name="pass" style="width:100px"><br>
            <p>パスワードをもう１度入力してください。<br></p>
        <input type="password" name="pass2" style="width:100px"><br>
        <br>

        <input type="button" onclick="history.back()" value="戻る">
        <input type= "submit" value="OK">
    </form>

</body>
</html>