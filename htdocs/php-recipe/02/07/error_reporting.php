<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>エラーレベルを設定したい</title>
</head>
<body>
<div>
<?php
# すべてのエラーを表示します。
error_reporting(E_ALL); // PHP5.4以上の場合
//error_reporting(E_ALL | E_STRICT);  // PHP5.3の場合
$test = $_POST['test']; // Noticeエラー

# すべてのエラーを表示しません。
error_reporting(0);
$dividedByZero = 1 / 0; // Warningエラーだが表示されない

# Fatalエラー、Warningエラー、Parseエラー、Noticeエラーを表示します。
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
$dividedByZero = 1 / 0; // Warningエラー

# Noticeエラー以外のすべてのエラーを表示します。
error_reporting(E_ALL ^ E_NOTICE);  // PHP5.4以上の場合
# PHP5.3以前では、E_STRICTを追加する必要があるので、以下のように設定します。
//error_reporting(E_ALL ^ E_NOTICE | E_STRICT);
$test = $_POST['test']; // Noticeエラーだが表示されない
?>
</div>
</body>
</html>
