<?php

require_once __DIR__ . '/functions.php';

$name = '';
$price = '';
$gazou = '';
$explanation = '';
$upload_path = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $gazou = $_FILES["gazou"];
    $explanation = $_POST["explanation"];
    //var_dump($_FILES);
    //var_dump($explanation);
    // //（2）$_FILEに情報があれば（formタグからpost送信されていれば）以下の処理を実行する
    if (!empty($_FILES)) {
        //echo "filearuyo";

        //（3）$_FILESからファイル名を取得する
        $filename = $_FILES['gazou']['name'];


        //（4）$_FILESから保存先を取得して、images_after（ローカルフォルダ）に移す
        //move_uploaded_file（第1引数：ファイル名,第2引数：格納後のディレクトリ/ファイル名）
        $uploaded_path = 'images_after/' . $filename;
        //echo $uploaded_path.'<br>';

        $result = move_uploaded_file($_FILES['gazou']['tmp_name'], $uploaded_path);

        if ($result) {
            //echo "okdayo";
            //var_dump($uploaded_path);
            $MSG = 'アップロード成功！ファイル名：' . $filename;
            $id = insert_task($name, $price, $uploaded_path, $explanation);
            header("Location: pro_show.php?id=${id}");
            exit;
        } else {
            echo "damedayo";
            $MSG = 'アップロード失敗！エラーコード：' . $_FILES['gazou']['error'];
        }
    } else {
        $MSG = '画像を選択してください';
    }
}


?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品追加</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        商品追加<br><br>
        商品名<br>
        <input type="text" name="name">
        <br><br>
        価格<br>
        <input type="text" name="price">
        <br><br>
        画像<br>
        <input type="file" name="gazou">
        <br><br>
        詳細<br>
        <textarea name="explanation" style="width: 500px; height: 100px;"></textarea>
        <br><br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>

</body>

</html>