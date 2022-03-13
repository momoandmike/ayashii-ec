<?php

require_once __DIR__ . '/functions.php';

// データベースに接続
$dbh = connect_db();

// SQL文の組み立て
$sql = 'SELECT * FROM product';

// プリペアドステートメントの準備
// $dbh->query($sql) でも良い
$stmt = $dbh->prepare($sql);

// プリペアドステートメントの実行
$stmt->execute();

// 結果の受け取り
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - SELECT</title>
</head>

<body>
    <h2>商品一覧</h2>
    <ul>
        <?php foreach ($products as $product) : ?>
            <li><?= h($product['name']) ?></li>
            <li><?= h($product['price'] . '円') ?></li>
            <img src="<?= h($product['gazou']) ?>" width="500px">
            <li><?= h($product['explanation']) ?></li><br>

        <?php endforeach; ?>
    </ul>
</body>

</html>