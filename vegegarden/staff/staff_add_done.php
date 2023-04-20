<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>べジ農園</title>
</head>
<body style="background-color:#FFFFF0;text-align:center;">
    <div style="border-style:solid;font-family:'Hiragino Mincho ProN','ＭＳ 明朝',serif;">
        <h1>スタッフ追加完了</h1>
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
        $staff_name = $_POST['name'];
        $staff_pass = $_POST['pass'];

        $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
        $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');

        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL: データベースへの命令文
        // INSERT文：データ登録
        $sql = 'INSERT INTO mst_staff(name, password) VALUES(?,?)';
        $stmt = $dbh -> prepare($sql);
        $data[] = $staff_name;
        $data[] = $staff_pass;
        $stmt -> execute($data);

        // データベースから切断する
        $dbh = null;

        echo $staff_name;
        echo 'さんを追加しました。<br>';
    }
    catch(Exception $e){
        echo 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    ?>

    <a href="staff_list.php">戻る</a>

</body>
</html>