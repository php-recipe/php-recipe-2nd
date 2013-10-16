<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>数値の丸め（四捨五入）、切り上げ、切り捨てをしたい</title>
</head>
<body>
<div>
<ul>
<?php
$num1 = 123.256;
$num2 = -123.256;

echo '<li><p>数値を整数に丸める</p>';
echo '<p>' . $num1 . ' -> ', round($num1) . '</p></li>';

echo '<li><p>数値を小数点第2位までに丸める</p>';
echo '<p>' . $num1 . ' -> ', round($num1, 2) . '</p></li>';

echo '<li><p>数値を10の位までに丸める</p>';
echo '<p>' . $num1 . ' -> ', round($num1, -1) . '</p></li>';

echo '<li><p>小数点以下を切り上げる</p>';
echo '<p>' . $num1 . ' -> ', ceil($num1) . '</p>';

echo '<p>' . $num2 . ' -> ', ceil($num2) . '</p></li>';

echo '<li><p>小数点以下を切り捨てる</p>';
echo '<p>' . $num1 . ' -> ', floor($num1) . '</p>';

echo '<p>' . $num2 . ' -> ', floor($num2) . '</p></li>';
?>
</ul>
</div>
</body>
</html>
