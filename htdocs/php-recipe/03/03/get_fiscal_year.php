<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>指定した日付の年度を求めたい</title>
</head>
<body>
<div>
<?php
$time = mktime(0, 0, 0, 2, 15, 2013);  // 年度を求めたい日付
$startMonth = 4;                       // 年度切り替え月

echo '<p>日付： ' . date('Y/m/d', $time) . '</p>';
echo '<p>切り替え月： ' . $startMonth . '月</p>';

$ret = getFiscalYear($startMonth, $time);
if ($ret !== false) {
  echo '<p>年度： ' . $ret .  '年度</p>';
} else {
  echo '<p>不正な年度切り替え月です</p>';
}

# getFiscalYear()関数
# 年度を取得します。第1引数に年度の切り替え月を指定します。第2引数に年度を求め
# たい日付のタイムスタンプを指定します。省略した場合は現在の日時で計算を行ない
# ます。
function getFiscalYear($startMonth, $timestamp = false)
{
  if ($startMonth < 1 || $startMonth > 12) {
    return false;
  }

  // 日付が省略された場合は現在の日時を使用
  if ($timestamp === false) {
    $date = getdate();
  } else {
    $date = getdate($timestamp);
  }

  // 年度を計算する
  $year = $date['year'];
  $month = $date['mon'] - ($startMonth - 1);
  $result = getdate(mktime(0, 0, 0, $month, 1, $year));

  return $result['year'];
}
?>
</div>
</body>
</html>
