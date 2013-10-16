<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>全角英数字を半角に変換したい</title>
</head>
<body>
<div>
<?php
$text = 'ＡＢＣ　１２３';  // ＡＢＣと１２３の間に全角スペース

echo '<p>変換する文字列: ' . $text .'</p>';
echo '<ul>';

echo '<li><p>全角「英字」を半角に変換</p>';
echo '<p>' . mb_convert_kana($text, 'r') . '</p></li>';

echo '<li><p>全角「数字」を半角に変換</p>';
echo '<p>' . mb_convert_kana($text, 'n') . '</p></li>';

echo '<li><p>全角「英数字」を半角に変換</p>';
echo '<p>' . mb_convert_kana($text, 'a') . '</p></li>';

echo '<li><p>全角「英数字」と「スペース」を半角に変換</p>';
echo '<p>' . mb_convert_kana($text, 'as') . '</p></li></ul>';
?>
</div>
</body>
</html>
