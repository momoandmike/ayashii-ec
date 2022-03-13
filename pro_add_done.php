<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品追加実効</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <?php
    try {

        require_once("common.php");

        $post = sanitize($_POST);
        $name = $post["name"];
        $price = $post["price"];
        $gazou = $post["gazou"];
        $comments = $post["comments"];
        $cate = $post["cate"];

        $dsn = "mysql:host=localhost;dbname=ayshii_db;charset=utf8";
        $user = "root";
        $password = "";
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO mst_product(category, name, price, gazou, explanation) VALUES(?,?,?,?,?)";
        $stmt = $dbh->prepare($sql);
        $data[] = $cate;
        $data[] = $name;
        $data[] = $price;
        $data[] = $gazou;
        $data[] = $comments;
        $stmt->execute($data);

    ?>

</body>

</html>