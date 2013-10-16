<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>数値を必ず小数点以下まで表示させたい</title>
</head>
<body>
<div>
<?php
$num1 = 10;
$num2 = 1000.5;
$num3 = 0.456789;

echo '<p>sprintf()関数で小数点第2位まで表示させる</p>';
echo '<ul>';
echo '<li>' . $num1 . ' -> ' . sprintf('%0.2f', $num1) . '</li>';
echo '<li>' . $num2 . ' -> ' . sprintf('%0.2f', $num2) . '</li>';
echo '<li>' . $num3 . ' -> ' . sprintf('%0.2f', $num3) . '</li>';
echo '</ul>';

echo '<p>number_format()関数で小数点第2位まで表示する</p>';
echo '<ul>';
echo '<li>' . $num1 . ' -> ' . number_format($num1, 2) . '</li>';
echo '<li>' . $num2 . ' -> ' . number_format($num2, 2) . '</li>';
echo '<li>' . $num3 . ' -> ' . number_format($num3, 2) . '</li>';
echo '</ul>';

echo '<p>number_format()関数で小数点第2位まで表示する（カンマ区切りなし）</p>';
echo '<ul>';
echo '<li>' . $num1 . ' -> ' . number_format($num1, 2, '.', '') . '</li>';
echo '<li>' . $num2 . ' -> ' . number_format($num2, 2, '.', '') . '</li>';
echo '<li>' . $num3 . ' -> ' . number_format($num3, 2, '.', '') . '</li>';
echo '</ul>';
?>
</div>
</body>
</html>
