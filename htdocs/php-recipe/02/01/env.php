<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>環境変数の情報</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

$agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
$ip    = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
$ref   = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

echo 'ブラウザ: ' . h($agent) . '<br>';
echo 'IPアドレス: ' . h($ip) . '<br>';
echo '参照元: ' . h($ref) . '<br>';

echo '<pre>';
var_dump(h($_SERVER));
echo '</pre>';
?>
</div>
</body>
</html>
