<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>繰り返し処理の途中でループを抜けたい</title>
</head>
<body>
<div>
<?php
# 変数に数値を代入します。
$count = 1;
$sum   = 0;

# 繰り返し処理を行ないます。
while ($count <= 100) {
  $sum += $count;
  if ($sum > 1000) {
    echo '1000を超えたのでcountは' . $count . 'で終了します<br>';
    break;
  }
  $count += 1;
}
# 合計を表示します。
echo 'sumは' . $sum;
?>
</div>
</body>
</html>
