<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECサイトTOP</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <?php
    try {

        $dsn = "mysql:host=localhost;dbname=ayashii_db;charset=utf8";
        $user = "root";
        $password = "";
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT code,name,price,gazou,explanation FROM product WHERE1";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $dbh = null;

        print "販売商品一覧";
        print "　<a href='shop_cartlook.php'>カートを見る</a>";
        print "<br><br>";

        while (true) {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($rec === false) {
                break;
            }
            $code = $rec["code"];
            print "<a href='shop_product.php?code=" . $code . "'>";
            if (empty($rec["gazou"]) === true) {
                $gazou = "";
            } else {
                $gazou = "<img src='../product/gazou/" . $rec['gazou'] . "'>";
            }
            print $gazou;
            print "<br>";
            print "商品名:" . $rec["name"];
            print "<br>";
            print "価格:" . $rec["price"] . "円";
            print "<br>";
            print "詳細:" . $rec["explanation"];
            print "</a>";
            print "<br><br>";
        }
        
    ?>

</body>

</html>