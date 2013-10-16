<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>セッション変数を使いたい</title>
</head>
<body>
<div>
<?php
if (! isset($_SESSION['visited'])) {
  echo '初めての訪問です。今からセッションを開始します。';
  $_SESSION['visited'] = 1;

} else {
  echo '訪問回数: ' . h(++$_SESSION['visited']) . '<br>';

  if (isset($_SESSION['date'])) {
      echo '前回の訪問日時: ' . h($_SESSION['date']) . '<br>';
  }
}

$_SESSION['date'] = date('Y年m月d日 H時i分s秒');
?>
</div>
</body>
</html>
