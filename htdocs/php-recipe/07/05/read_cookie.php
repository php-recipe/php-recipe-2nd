<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Cookieのデータを読み取りたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

echo '<p>Cookieの中身:</p>';
echo h($_COOKIE['php_sample']);

echo '<p>parse_str()関数で分解したクッキーの中身:</p>';
parse_str($_COOKIE['php_sample'], $output);
echo 'data1: ' . h($output['data1']) . '<br>';
echo 'data2: ' . h($output['data2']);
?>
</div>
</body>
</html>
