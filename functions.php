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
function insert_task($title)
{
    // データベースに接続
    $dbh = connect_db();

    // レコードを追加
    $sql = <<<EOM
    INSERT INTO
        tasks
        (title)
    VALUES
        (:title)
    EOM;

    // プリペアドステートメントの準備
    $stmt = $dbh->prepare($sql);

    // パラメータのバインド
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);

    // プリペアドステートメントの実行
    $stmt->execute();
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