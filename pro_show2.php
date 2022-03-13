<?php
require_once __DIR__ . '/functions.php';
$dbh = connect_db();

$id = filter_input(INPUT_GET, 'id');
echo $id;

$sql = <<<EOM
SELECT
  *
FROM
    product
WHERE
    id = :id
EOM;

// プリペアドステートメントの準備
$stmt = $dbh->prepare($sql);

// パラメータのバインド
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

// プリペアドステートメントの実行
$stmt->execute();

$product = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>商品詳細</h1>
</body>

</html>