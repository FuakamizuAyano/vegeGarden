<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>べジ農園</title>
</head>
<body style="background-color:#FFFFF0;text-align:center;">
    <div style="border-style:solid;font-family:'Hiragino Mincho ProN','ＭＳ 明朝',serif;">
        <h1>お客様情報を入力してください</h1>
    </div>
    <br>

    <form method="post" action="shop_form_check.php">
        <p>お名前<br></p>
        <input type="text" name="onamae" style="width:200px"><br>
        <p>メールアドレス</p>
        <input type="text" name="email" style="width:200px"><br>
        <P>郵便番号</P>
        <input type="text" name="postal1" style="width:50px"> -
        <input type="text" name="postal2" style="width:80px"><br>
        <p>住所</p>
        <input type="text" name="address" style="width:500px"><br>
        <p>電話番号</p>
        <input type="text" name="tel" style="width:150px"><br>
        <br>
        <input type="radio" name="chumon" value="chumonkonkai" checked>今回だけの注文<br>
        <input type="radio" name="chumon" value="chumontouroku">会員登録しての注文<br>
        <br>
        <p>※会員登録する方は以下の項目も入力してください。<br></p>
        <p>パスワードを入力してください。<br></p>
        <input type="password" name="pass" style="width:100px"><br>
        <p>パスワードをもう一度入力してください。<br></p>
        <input type="password" name="pass2" style="width:100px"><br>
        <p>性別<br></p>
        <input type="radio" name="danjo" value="dan" cheched>男性<br>
        <input type="radio" name="danjo" value="jo" cheched>女性<br>
        <p>生まれ年</p>
        <select name="birth">
            <option value="1910">1910年代</option>
            <option value="1920">1920年代</option>
            <option value="1930">1930年代</option>
            <option value="1940">1940年代</option>
            <option value="1950">1950年代</option>
            <option value="1960">1960年代</option>
            <option value="1970">1970年代</option>
            <option value="1980" selected>1980年代</option>
            <option value="1990">1990年代</option>
            <option value="2000">2000年代</option>
            <option value="2010">2010年代</option>
        </select>
        <br>
        <br>

        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK"><br>
    </form>
</body>
</html>