<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>アルファベットを大文字から小文字に変換したい</title>
</head>
<body>
<div>
<?php
$text1 = 'THIS IS A PEN.';
echo '変換する文字列: ' . $text1 .'<br>';
echo '　すべての英字を小文字にする（strtolower）: ';
echo strtolower($text1) . '<br><br>';

$text2 = 'ＴＨＩＳ　ＩＳ　A　ＰＥＮ．';  // Aのみ半角
echo '変換する文字列: ' . $text2 .'<br>';
echo '　全角英字を小文字にする（mb_strtolower）: ';
echo mb_strtolower($text2) . '<br>';
?>
</div>
</body>
</html>
