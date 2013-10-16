<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>連想配列を添え字で並べ替えたい</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
echo '連想配列を添え字の数値比較で並べ替える（昇順）';
$data11 = array('100' => 1, '5' => 2, '20' => 3, '0' => 4);
echo '<table>';
echo '<tr><th>元の配列</th><th>ソート後</th></tr>';
echo '<tr><td><pre>';
print_r($data11);
echo '</pre></td><td><pre>';
ksort($data11, SORT_NUMERIC);
print_r($data11);
echo '</pre></td></tr></table><br>';

echo '連想配列を添え字の数値比較で並べ替える（降順）';
$data12 = array('100' => 1, '5' => 2, '20' => 3, '0' => 4);
echo '<table>';
echo '<tr><th>元の配列</th><th>ソート後</th></tr>';
echo '<tr><td><pre>';
print_r($data12);
echo '</pre></td><td><pre>';
krsort($data12, SORT_NUMERIC);
print_r($data12);
echo '</pre></td></tr></table><br>';

echo '連想配列を添え字の文字列比較で並べ替える（昇順）';
$data21 = array('bb' => 1, 'aa' => 2, 'dd' => 3, 'cc' => 4);
echo '<table>';
echo '<tr><th>元の配列</th><th>ソート後</th></tr>';
echo '<tr><td><pre>';
print_r($data21);
echo '</pre></td><td><pre>';
ksort($data21, SORT_STRING);
print_r($data21);
echo '</pre></td></tr></table><br>';

echo '連想配列を添え字の文字列比較で並べ替える（降順）';
$data22 = array('bb' => 1, 'aa' => 2, 'dd' => 3, 'cc' => 4);
echo '<table>';
echo '<tr><th>元の配列</th><th>ソート後</th></tr>';
echo '<tr><td><pre>';
print_r($data22);
echo '</pre></td><td><pre>';
krsort($data22, SORT_STRING);
print_r($data22);
echo '</pre></td></tr></table><br>';
?>
</div>
</body>
</html>
