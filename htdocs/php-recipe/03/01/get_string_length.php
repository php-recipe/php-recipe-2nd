<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>文字列の長さを調べたい</title>
</head>
<body>
<div>
<?php
# シングルバイト文字のみの文字列の長さを調べます。
$text1 = 'abcde12345';
echo '<p>文字列：' . $text1 . '</p>';
echo '<ul>';
echo '<li>バイト数 -> ' . strlen(bin2hex($text1)) / 2 . ' [byte]</li>';
echo '<li>文字数 -> ' . mb_strlen($text1) . ' [文字]</li>';
echo '</ul>';

# マルチバイト文字のみの文字列の長さを調べます。
$text2 = 'あいうえお１２３４５';
echo '<p>文字列：' . $text2 . '</p>';
echo '<ul>';
echo '<li>バイト数 -> ' . strlen(bin2hex($text2)) / 2 . ' [byte]</li>';
echo '<li>文字数 -> ' . mb_strlen($text2) . ' [文字]</li>';
echo '</ul>';

# シングルバイト文字、マルチバイト文字が混在する文字列の長さを調べます。
$text3 = 'abcdeあいうえお';
echo '<p>文字列：' . $text3 . '</p>';
echo '<ul>';
echo '<li>バイト数 -> ' . strlen(bin2hex($text3)) / 2 . ' [byte]</li>';
echo '<li>文字数 -> ' . mb_strlen($text3) . ' [文字]</li>';
echo '</ul>';
?>
</div>
</body>
</html>
