<?php

require_once __DIR__ . '/functions.php';

$name = '';
$password = '';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST["name"];
    $password = $_POST["password"];
    // バリデーション
    //$errors = staff_add_done_validate($name, $password);
    if (empty($errors)) {
        insert_staff($name, $password);
        header('Location: staff_login_show.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スタッフ追加実効</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    スタッフを追加しました。<br><br>
    <a href="staff_list.php">スタッフ一覧へ</a>

</body>

</html>