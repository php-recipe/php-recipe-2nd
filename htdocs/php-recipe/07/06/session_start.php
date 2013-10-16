<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# セッションを開始します。
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>セッションを使いたい</title>
</head>
<body>
<div>
<?php
if (! isset($_SESSION['count'])) {
  // 初めてのアクセス
  $_SESSION['count'] = 1;
} else {
  // 2回目以降のアクセス
  $_SESSION['count']++;
}
echo 'あなたのアクセス回数：' . h($_SESSION['count']);
?>
</div>
</body>
</html>
