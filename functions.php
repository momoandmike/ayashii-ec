<?php

require_once __DIR__ . '/config.php';

function connect_db()
{
    try {
        return new PDO(
            DSN,
            USER,
            PASSWORD,
            [PDO::ATTR_ERRMODE =>
            PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

function h($str)
{
    // ENT_QUOTES: シングルクオートとダブルクオートを共に変換する。
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// タスク登録
function insert_task($name, $price, $gazou, $explanation)
{
    // データベースに接続
    $dbh = connect_db();

    // レコードを追加
    $sql = <<<EOM
    INSERT INTO
        product
        (name, price, gazou, explanation)
    VALUES
        (:name, :price, :gazou, :explanation)
    EOM;

    // プリペアドステートメントの準備
    $stmt = $dbh->prepare($sql);

    // パラメータのバインド
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->bindParam(':gazou', $gazou, PDO::PARAM_STR);
    $stmt->bindParam(':explanation', $explanation, PDO::PARAM_STR);

    // プリペアドステートメントの実行
    $stmt->execute();

    return $dbh->lastInsertId();
}
// status に応じてレコードを取得
function find_task_by_status($status)
{
// データベースに接続
    $dbh = connect_db();

    // status で該当レコードを取得
    $sql = <<<EOM
    SELECT
    * 
    FROM 
        tasks
    WHERE 
        status = :status;
    EOM;

    // プリペアドステートメントの準備
    $stmt = $dbh->prepare($sql);

    // パラメータのバインド
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);

      // プリペアドステートメントの実行
    $stmt->execute();

      // 結果の取得
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// タスク登録
function insert_staff($name, $password)
{
    // データベースに接続
    $dbh = connect_db();

    // レコードを追加
    $sql = <<<EOM
    INSERT INTO
        staff
        (name, password)
    VALUES
        (:name, :password)
    EOM;

    // プリペアドステートメントの準備
    $stmt = $dbh->prepare($sql);

    // パラメータのバインド
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);

    // プリペアドステートメントの実行
    $stmt->execute();

    //return $dbh->lastInsertId();
}
// status に応じてレコードを取得
function find_staff_by_status($status)
{
    // データベースに接続
    $dbh = connect_db();

    // status で該当レコードを取得
    $sql = <<<EOM
    SELECT
    * 
    FROM 
        staff
    WHERE 
        status = :status;
    EOM;

    // プリペアドステートメントの準備
    $stmt = $dbh->prepare($sql);

    // パラメータのバインド
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);

    // プリペアドステートメントの実行
    $stmt->execute();

    // 結果の取得
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}