<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>連想配列を値で並べ替えたい</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
echo '連想配列を値の数値比較で並べ替える（昇順）';
$data11 = array('k1' => 100, 'k2' => 5, 'k3' => 20, 'k4' => 0);
echo '<table>';
echo '<tr><th>元の配列</th><th>ソート後</th></tr>';
echo '<tr><td><pre>';
print_r($data11);
echo '</pre></td><td><pre>';
asort($data11, SORT_NUMERIC);
print_r($data11);
echo '</pre></td></tr></table><br>';

echo '連想配列を値の数値比較で並べ替える（降順）';
$data12 = array('k1' => 100, 'k2' => 5, 'k3' => 20, 'k4' => 0);
echo '<table>';
echo '<tr><th>元の配列</th><th>ソート後</th></tr>';
echo '<tr><td><pre>';
print_r($data12);
echo '</pre></td><td><pre>';
arsort($data12, SORT_NUMERIC);
print_r($data12);
echo '</pre></td></tr></table><br>';

echo '連想配列を値の文字列比較で並べ替える（昇順）';
$data21 = array('k1' => 'bb', 'k2' => 'aa', 'k3' => 'dd', 'k4' => 'cc');
echo '<table>';
echo '<tr><th>元の配列</th><th>ソート後</th></tr>';
echo '<tr><td><pre>';
print_r($data21);
echo '</pre></td><td><pre>';
asort($data21, SORT_STRING);
print_r($data21);
echo '</pre></td></tr></table><br>';

echo '連想配列を値の文字列比較で並べ替える（降順）';
$data22 = array('k1' => 'bb', 'k2' => 'aa', 'k3' => 'dd', 'k4' => 'cc');
echo '<table>';
echo '<tr><th>元の配列</th><th>ソート後</th></tr>';
echo '<tr><td><pre>';
print_r($data22);
echo '</pre></td><td><pre>';
arsort($data22, SORT_STRING);
print_r($data22);
echo '</pre></td></tr></table><br>';
?>
</div>
</body>
</html>
