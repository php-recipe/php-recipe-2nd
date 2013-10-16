<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>処理を一時停止したい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

echo '<p>現在の時刻: ' . h(date('h:i:s')) . '</p>';

# 10秒間一時停止します。
sleep(10);

echo '<p>sleep()関数で10秒間停止後の時刻: ' . h(date('h:i:s')) . '</p>';
?>
</div>
</body>
</html>
