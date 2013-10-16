<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>ホスト名やIPアドレスを取得したい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# IPアドレスを指定してホスト名を取得します。
$ipaddress = '69.147.83.199';
$hostname = gethostbyaddr($ipaddress);
echo '<p>' . h($ipaddress) . ' → ' . h($hostname) . '</p>';

# ホスト名を指定してIPアドレスを取得します。
echo '<p>' . h($hostname) . ' → ' . h(gethostbyname($hostname)) . '</p>';
?>
</div>
</body>
</html>
