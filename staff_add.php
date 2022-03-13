<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スタッフ追加</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <form action="staff_add_check.php" method="post">
        スタッフ追加<br><br>
        スタッフ名<br>
        <input type="text" name="name">
        <br><br>
        パスワード<br>
        <input type="password" name="password">
        <br><br>
        パスワード再入力<br>
        <input type="password" name="password2">
        <br><br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>

</body>