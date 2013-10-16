<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>配列を逆順にしたい</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
echo '配列を逆順にする';
$data1 = array('a', 'b', 'c');
echo '<table>';
echo '<tr><th>元の配列</th><th>逆順</th><th>逆順（添え字保持）</th></tr>';
echo '<tr><td><pre>';
print_r($data1);
echo '</pre></td><td><pre>';
print_r(array_reverse($data1));
echo '</pre></td><td><pre>';
print_r(array_reverse($data1, true));
echo '</pre></td></tr></table><br>';

echo '連想配列を逆順にする';
$data2 = array('a' => 10, 'b' => 20, 'c' => 30);
echo '<table>';
echo '<tr><th>元の配列</th><th>逆順</th><th>逆順（添え字保持）</th></tr>';
echo '<tr><td><pre>';
print_r($data2);
echo '</pre></td><td><pre>';
print_r(array_reverse($data2));
echo '</pre></td><td><pre>';
print_r(array_reverse($data2, true));
echo '</pre></td></tr></table><br>';

echo '多次元配列を逆順にする';
$data3 = array(10,
               array('A' => 1, 'B' => 2, 'C' => 3),
               'ABC');
echo '<table>';
echo '<tr><th>元の配列</th><th>逆順</th><th>逆順（添え字保持）</th></tr>';
echo '<tr><td><pre>';
print_r($data3);
echo '</pre></td><td><pre>';
print_r(array_reverse($data3));
echo '</pre></td><td><pre>';
print_r(array_reverse($data3, true));
echo '</pre></td></tr></table><br>';
?>
</div>
</body>
</html>
