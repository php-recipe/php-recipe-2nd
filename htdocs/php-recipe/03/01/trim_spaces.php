<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>文字列の前後の半角空白文字を削除したい</title>
</head>
<body>
<div>
<?php
$text = '  abc  123  ';
echo '<pre>削除前の文字列 [' . $text . ']</pre>';
echo '<ul>';

echo '<li><p>前後の空白を削除</p><pre>[';
echo trim($text) . ']</pre></li>';

echo '<li><p>先頭の空白を削除</p><pre>[';
echo ltrim($text) . ']</pre></li>';

echo '<li><p>末尾の空白を削除</p><pre>[';
echo rtrim($text) . ']</pre></li>';

echo '</ul>';
?>
</div>
</body>
</html>
