<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>文字エンコードを変換したい</title>
</head>
<body>
<div>
<?php
$text = 'あいうえお１２３４５';
echo '<p>元の文字列: ' . $text . '</p>';

# 文字エンコードをShift_JIS、EUC-JPに変換します。
$sjis = mb_convert_encoding($text, 'SJIS');
$euc = mb_convert_encoding($text, 'EUC-JP');

echo '<p>文字エンコードを変換した文字列（文字化けします）</p>';
echo '<ul>';
echo '<li>SJIS: ' . $sjis . '</li>';
echo '<li>EUC-JP: ' . $euc . '</li>';
echo '</ul>';

# 文字エンコードをShift_JIS、EUC-JPからUTF-8に変換します。
$utfSjis = mb_convert_encoding($sjis, 'UTF-8', 'SJIS');
$utfEuc = mb_convert_encoding($euc, 'UTF-8', 'EUC-JP');

echo '<p>UTF-8に文字エンコードを戻した文字列</p>';
echo '<ul>';
echo '<li>SJIS: ' . $utfSjis . '</li>';
echo '<li>EUC-JP: ' . $utfEuc . '</li>';
echo '</ul>';
?>
</div>
</body>
</html>
