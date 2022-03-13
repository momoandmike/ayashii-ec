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

?>