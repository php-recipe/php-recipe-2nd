<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>繰り返し処理の途中でスキップしたい</title>
</head>
<body>
<div>
<?php
# 変数に数値を代入します。
$count1 = 0;
$sum    = 0;

# 繰り返し処理を行ないます。
while ($count1 < 10) {  // continueが実行されたときに処理が移る位置
  $count1 += 1;
  $count2 = 0;
  echo 'count1=' . $count1 . ' ';

  while ($count2 < 10) {
    $count2 += 1;
    echo 'count2=' . $count2 . ' ';
    echo 'count1*count2=' . $count1 * $count2 . '<br>';
    if ($count1 * $count2 > 30) {
      continue 2;
    }
    $sum += $count1 * $count2;
  }
}

# 合計を表示します。
echo '合計は' . $sum;
?>
</div>
</body>
</html>
