<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>半角英数字を全角に変換したい</title>
</head>
<body>
<div>
<?php
$text = 'ABC 123';

echo '<p>変換する文字列: ' . $text .'</p>';
echo '<ul>';

echo '<li><p>半角「英字」を全角に変換</p>';
echo '<p>' . mb_convert_kana($text, 'R') . '</p></li>';

echo '<li><p>半角「数字」を全角に変換</p>';
echo '<p>' . mb_convert_kana($text, 'N') . '</p></li>';

echo '<li><p>半角「英数字」を全角に変換</p>';
echo '<p>' . mb_convert_kana($text, 'A') . '</p></li>';

echo '<li><p>半角「英数字」と「スペース」を全角に変換</p>';
echo '<p>' . mb_convert_kana($text, 'AS') . '</p></li></ul>';
?>
</div>
</body>
</html>
