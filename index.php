<?php

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/config.php';

$dbh = connect_db();

/* タスク登録---------------------------------------------*/
// 初期化
$title = '';

// リクエストメソッドの判定
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームに入力されたデータを受け取る
    $title = filter_input(INPUT_POST, 'title');

    // タスク登録処理の実行
    // 後程 ここに insert_task関数を呼び出す処理を追記する
insert_task($title);
}

/* タスク照会
---------------------------------------------*/
// 未完了タスクの取得
$notyet_tasks = find_task_by_status(TASK_STATUS_NOTYET);
?>
<!DOCTYPE html>
<html lang="ja">


// status を抽出条件に指定してデータを取得
$sql = <<<EOM SELECT * FROM ayashii_db WHERE //status=:status; EOM; // プリペアドステートメントの準備 $stmt=$dbh->prepare($sql);

    // バインド(代入)するパラメータの準備
    $status = 'notyet';

    // パラメータのバインド
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);

    // プリペアドステートメントの実行
    $stmt->execute();

    // 結果の取得
    $notyet_tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);