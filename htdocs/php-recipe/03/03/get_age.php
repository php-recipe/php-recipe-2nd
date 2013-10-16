<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>生年月日から現在の年齢を求めたい</title>
</head>
<body>
<div>
<?php
// 生年月日と計算基準日のタイムスタンプを取得
$birthday = mktime(0, 0, 0, 3, 14, 1983);
$baseDay = mktime(0, 0, 0, 10, 1, 2013);

echo '<p>計算元のタイムスタンプ値</p>';
echo '<ul>';
echo '<li>誕生日： ' . $birthday . '</li>';
echo '<li>計算基準日： ' . $baseDay . '</li>';
echo '</ul>';

// 生年月日と計算基準日をYYYYMMDD形式の数値に変換
$birthdayInt = (int) date('Ymd', $birthday);
$baseDayInt = (int) date('Ymd', $baseDay);

echo '<p>YYYYMMDD形式の数値に変換された値</p>';
echo '<ul>';
echo '<li>誕生日： ' . $birthdayInt . '</li>';
echo '<li>計算基準日： ' . $baseDayInt . '</li>';
echo '</ul>';

// 年齢を算出
$age = (int) (($baseDayInt - $birthdayInt) / 10000);
echo '<p>計算結果（年齢）： ' . $age . '</p>';
?>
</div>
</body>
</html>
