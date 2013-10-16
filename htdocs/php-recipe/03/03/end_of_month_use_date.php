<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>月末日を求めたい</title>
</head>
<body>
<div>
<?php
// 末日を求めたい年と月
$year = 2016;
$month = 2;

// 2016年2月10日のタイムスタンプ
$timestamp = mktime(0, 0, 0, $month, 10, $year);

// date()関数の第1引数の「t」で、第2引数で指定した月の日数を取得
$lastday = intval(date('t', $timestamp));

echo "<p> $year 年 $month 月の末日は $lastday 日です</p>";
?>
</div>
</body>
</html>
