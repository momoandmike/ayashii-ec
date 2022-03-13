<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スタッフ追加チェック</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <?php

require_once("common.php");

$post = sanitize($_POST);
$name = $post["name"];
$password = $post["password"];
$password2 = $post["password2"];
var_dump($password);

    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");
    $password2 = htmlspecialchars($_POST["password2"], ENT_QUOTES, "UTF-8");
    var_dump($password);
    if (empty($name) === true) {
        print "名前が入力されていません。<br><br>";
    } else {
        print $name;
        print "<br><br>";
    }

    if (empty($password) === true) {
        print "パスワードが入力されていません。<br><br>";
    }

    if ($password != $password2) {
        print "パスワードが異なります。<br><br>";
    }

    if (empty($name) or empty($password) or $password != $password2) {
        print "<form>";
        print "<input type='button' onclick='history.back()' value='戻る'>";
        print "</form>";
    } else {
        $password = md5($password);
        print "上記スタッフを追加しますか？<br><br>";
        print "<form action='staff_add_done.php' method='post'>";
        print "<input type='hidden' name='name' value='" . $name . "'>";
        print "<input type='hidden' name='password' value='" . $password . "'>";
        print "<input type='button' onclick='history.back()' value='戻る'>";
        print "<input type='submit' value='OK'>";
        print "</form>";
    }
    ?>
</body>

</html>