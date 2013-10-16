<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>型変換の注意</title>
</head>
<body>
<div>
<?php
# 扱える浮動小数点数を超えた数値は無限大とみなされます。
$a = 1e1000;  // 1 × 10^1000
$b = (string) $a;
echo $b . '<br>';

# 配列を文字列に変換すると必ずArrayとなります。
$a = array('a', 'b', 'c');
$b = (string) $a;  // PHP5.4以降ではNoticeエラーが発生
echo $b . '<br>';
?>
</div>
</body>
</html>
