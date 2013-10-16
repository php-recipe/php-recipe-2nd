<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>エラーを例外として処理</title>
</head>
<body>
<div>
<?php
# 無名関数☆レシピ040☆（無名関数って何ですか？）を使ってエラーハンドラを設定します。
set_error_handler(
  function ($errno, $errstr, $errfile, $errline) {
    throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
  }
);

# エラーの内容を表示する関数を定義します。タイプヒンティングを使用しています。
# ☆レシピ164☆（タイプヒンティングとは何ですか？）
function show_error_details(ErrorException $e) {
  echo '<p>';
  echo 'エラーコード： '       . $e->getCode()    . '<br>';
  echo 'エラーメッセージ： '   . $e->getMessage() . '<br>';
  echo 'エラー発生ファイル： ' . $e->getFile()    . '<br>';
  echo 'エラー発生行： '       . $e->getLine()    . '<br>';
  echo '</p>';
}

# Warningエラーを発生させます。
try {
# strlen()関数に配列を渡し、Warningエラーを発生させます。
  strlen(array());
} catch(ErrorException $e) {
# エラーコード「2」はWarningエラーを示します。
  show_error_details($e);
}

# Noticeエラーを発生させます。
try {
# trim()関数に宣言していない$dummy変数を渡し、Noticeエラーを発生させます。
  trim($dummy);
} catch(ErrorException $e) {
# エラーコード「8」はNoticeエラーを示します。
  show_error_details($e);
}
?>
</div>
</body>
</html>
