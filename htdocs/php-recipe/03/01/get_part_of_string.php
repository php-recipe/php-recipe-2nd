<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>文字列の一部を取り出したい</title>
</head>
<body>
<div>
<?php
# 半角英数字のみの文字列から一部を取り出します。
$english = 'abcde-12';
echo '<p>半角英数字 (対象の文字列: ' . $english . ')</p>';
echo '<ul>';
echo '<li>1文字目から5文字: ' . mb_substr($english, 0, 5) . '</li>';
echo '<li>3文字目から最後まで: ' . mb_substr($english, 2) . '</li>';
echo '<li>最後の4文字: ' . mb_substr($english, -4) . '</li>';
echo '</ul>';

# 全角文字のみの文字列から一部を取り出します。
$japanese = 'あいうえお１２３一二三';
echo '<p>全角文字 (対象の文字列: ' . $japanese . ')</p>';
echo '<ul>';
echo '<li>1文字目から5文字: ' . mb_substr($japanese, 0, 5) . '</li>';
echo '<li>3文字目から最後まで: ' . mb_substr($japanese, 2) . '</li>';
echo '<li>最後の4文字: ' . mb_substr($japanese, -4) . '</li>';
echo '</ul>';

# 全半角混在の文字列から一部を取り出します。
$bilingual = 'abcあいう一二三123';
echo '<p>全半角混在 (対象の文字列: ' . $bilingual . ')</p>';
echo '<ul>';
echo '<li>1文字目から5文字: ' . mb_substr($bilingual, 0, 5) . '</li>';
echo '<li>3文字目から最後まで: ' . mb_substr($bilingual, 2) . '</li>';
echo '<li>最後の4文字: ' . mb_substr($bilingual, -4) . '</li>';
echo '</ul>';
?>
</div>
</body>
</html>
