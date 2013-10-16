<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>配列の指定範囲を取り除きたい</title>
</head>
<body>
<div>
<?php
echo '<p>配列の指定範囲を取り除く</p>';
$data1 = array('a', 'b', 'c', 'd');
$pos1 = 1;
$len1 = 2;

echo '<ul>';
echo '<li><p>取り除く前の配列：</p><pre>';
print_r($data1);
echo '</pre></li>';
echo '<li><p>開始位置： ' . $pos1 . '</p></li>';
echo '<li><p>取り除く数： ' . $len1 . '</p></li>';

$val1 = array_splice($data1, $pos1, $len1);
echo '<li><p>取り除いた後の配列：</p><pre>';
print_r($data1);
echo '</pre></li>';
echo '<li><p>取り除いた値：</p><pre>';
print_r($val1);
echo '</pre></li>';
echo '</ul>';

echo '<p>配列の指定箇所から末尾までを取り除く</p>';
$data2 = array('a', 'b', 'c', 'd');
$pos2 = 2;

echo '<ul>';
echo '<li><p>取り除く前の配列：</p><pre>';
print_r($data2);
echo '</pre></li>';
echo '<li><p>開始位置： ' . $pos2 . '</p></li>';

$val2 = array_splice($data2, $pos2);
echo '<li><p>取り除いた後の配列：</p><pre>';
print_r($data2);
echo '</pre></li>';
echo '<li><p>取り除いた値：</p><pre>';
print_r($val2);
echo '</pre></li>';
echo '</ul>';
?>
</div>
</body>
</html>
