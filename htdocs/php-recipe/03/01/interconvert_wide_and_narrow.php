<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>カナ文字を全角かなや半角カナに変換したい</title>
</head>
<body>
<div>
<ul>
<?php
$text1 = 'ピッコロ';
echo '<li><p>「全角カタカナ」を「半角カタカナ」に変換</p>';
echo '<p>変換する文字列: ' . $text1 .'</p>';
echo '<p>' . mb_convert_kana($text1, 'k') . '</p></li>';

$text2 = 'ﾀﾝﾊﾞﾘﾝ';
echo '<li><p>「半角カタカナ」を「全角カタカナ」に変換</p>';
echo '<p>変換する文字列: ' . $text2 .'</p>';
echo '<p>' . mb_convert_kana($text2, 'KV') . '</p></li>';

$text3 = 'ぴあの';
echo '<li><p>「全角ひらがな」を「半角カタカナ」に変換</p>';
echo '<p>変換する文字列: ' . $text3 .'</p>';
echo '<p>' . mb_convert_kana($text3, 'h') . '</p></li>';

$text4 = 'ｼﾝﾊﾞﾙ';
echo '<li><p>「半角カタカナ」を「全角ひらがな」に変換</p>';
echo '<p>変換する文字列: ' . $text4 .'</p>';
echo '<p>' . mb_convert_kana($text4, 'HV') . '</p></li>';

$text5 = 'ドラム';
echo '<li><p>「全角カタカナ」を「全角ひらがな」に変換</p>';
echo '<p>変換する文字列: ' . $text5.'</p>';
echo '<p>' . mb_convert_kana($text5, 'c') . '</p></li>';

$text6 = 'はーもにか';
echo '<li><p>「全角ひらがな」を「全角カタカナ」に変換</p>';
echo '<p>変換する文字列: ' . $text6 .'</p>';
echo '<p>' . mb_convert_kana($text6, 'C') . '</p></li>';
?>
</ul>
</div>
</body>
</html>
