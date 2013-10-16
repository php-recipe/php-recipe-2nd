<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>カンマ区切りの文字列を分割して配列にしたい</title>
</head>
<body>
<div>
<?php
$data = 'terurou,taro,jiro';
$separator = ',';

echo '<p>対象の文字列： ' . $data      . '</p>';
echo '<p>区切り文字： '   . $separator . '</p>';

echo '<p>分割した結果：';
print_r(explode($separator, $data));
echo '</p>';
?>
</div>
</body>
</html>
