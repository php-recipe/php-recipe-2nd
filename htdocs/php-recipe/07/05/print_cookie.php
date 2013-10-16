<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>データをCookieに保存したい(表示する)</title>
</head>
<body>
<div>
<p>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

if (isset($_COOKIE['sample'])) {
  echo 'Cookieの中身: ' . h($_COOKIE['sample']);
} else {
  echo 'Cookieはありません';
}
?>
</p>
<p><a href="delete_cookie.php">クッキーを削除する</a></p>
</div>
</body>
</html>
