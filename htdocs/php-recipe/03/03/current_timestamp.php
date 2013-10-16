<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>現在のタイムスタンプを取得したい</title>
</head>
<body>
<div>
<?php
echo '現在のタイムスタンプ(time): ' . time() . '<br>';
echo '現在のタイムスタンプ(microtime): ' . microtime() . '<br>';

# microtime()関数の戻り値をexplode()関数を使いスペースで分割して配列に各々の値を
# 代入します。
$now = explode(' ', microtime());

# 配列に代入された値を足します。
$time = $now[0] + $now[1];

# マイクロ秒（小数点以下6桁）まで表示するためにsprintf()関数を利用します。
echo '現在のタイムスタンプ(floatで): ' . sprintf('%0.6f', $time) . '<br>';

# 引数にtrueを指定することで戻り値がfloat型になります。
echo '現在のタイムスタンプ(floatで): ' . sprintf('%0.6f', microtime(true)) 
     . '<br>';
?>
</div>
</body>
</html>
