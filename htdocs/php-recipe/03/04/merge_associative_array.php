<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>配列を結合したい</title>
</head>
<body>
<div>
<?php
$data1 = array('a' => 1);
$data2 = array('a' => 'A', 'b' => 'B');

echo '<p>連想配列を結合する</p>';
echo '<p>元の配列：<br>';
print_r($data1);
echo '<br>';
print_r($data2);
echo '</p>';

echo '<ul>';
echo '<li><p>array_merge()関数で結合</p><pre>';
print_r(array_merge($data1, $data2));
echo '</pre></li>';

echo '<li><p>array_merge_recursive()関数で結合</p><pre>';
print_r(array_merge_recursive($data1, $data2));
echo '</pre></li>';

echo '<li><p>+演算子で結合</p><pre>';
print_r($data1 + $data2);
echo '</pre></li>';
echo '</ul>';
?>
</div>
</body>
</html>
