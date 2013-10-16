<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>配列の指定箇所に値を追加したい</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
echo '配列の指定箇所に値を追加する';
$data1 = array('a', 'b', 'c');
$val1 = 'XXX';
$pos1 = 1;
echo '<table><tr><th>追加前の配列</th><th>追加位置</th>';
echo '<th>追加する値</th><th>追加後の配列</th></tr>';
echo '<tr><td><pre>';
print_r($data1);
echo '</pre></td><td><pre>', $pos1, '</pre></td><td><pre>';
print_r($val1);
echo '</pre></td><td><pre>';
array_splice($data1, $pos1, 0, $val1);
print_r($data1);
echo '</pre></td></tr></table><br>';

echo '配列の指定箇所に複数の値を追加する';
$data2 = array('a', 'b', 'c');
$val2 = array('XXX', 'YYY', 'ZZZ');
$pos2 = 2;
echo '<table><tr><th>追加前の配列</th><th>追加位置</th>';
echo '<th>追加する値</th><th>追加後の配列</th></tr>';
echo '<tr><td><pre>';
print_r($data2);
echo '</pre></td><td><pre>', $pos2, '</pre></td><td><pre>';
print_r($val2);
echo '</pre></td><td><pre>';
array_splice($data2, $pos2, 0, $val2);
print_r($data2);
echo '</pre></td></tr></table><br>';
?>
</div>
</body>
</html>
