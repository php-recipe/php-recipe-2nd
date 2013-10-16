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
$year = 2013;
$month = 10;

// 末日のタイムスタンプ
$timestamp = mktime(0, 0, 0, $month + 1, 0, $year);

echo "<p> $year 年 $month 月の末日： " . date('Y/m/d', $timestamp) . '</p>';
?>
</div>
</body>
</html>
