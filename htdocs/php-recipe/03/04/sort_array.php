<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>配列の内容を並べ替えたい</title>
</head>
<body>
<div>
<?php
echo '<p>数値として並べ替える（昇順）</p>';
$data11 = array(100, 5, 20, 0);
echo '<ul>';
echo '<li><p>元の配列：</p><pre>';
print_r($data11);
echo '</pre></li>';
echo '<li><p>ソート後：</p><pre>';
sort($data11, SORT_NUMERIC);
print_r($data11);
echo '</pre></li>';
echo '</ul>';

echo '<p>数値として並べ替える（降順）</p>';
$data12 = array(100, 5, 20, 0);
echo '<ul>';
echo '<li><p>元の配列：</p><pre>';
print_r($data12);
echo '</pre></li>';
echo '<li><p>ソート後：</p><pre>';
rsort($data12, SORT_NUMERIC);
print_r($data12);
echo '</pre></li>';
echo '</ul>';

echo '<p>文字列として並べ替える（昇順）</p>';
$data21 = array('dd', 'aa', 'cc', 'bb');
echo '<ul>';
echo '<li><p>元の配列：</p><pre>';
print_r($data21);
echo '</pre></li>';
echo '<li><p>ソート後：</p><pre>';
sort($data21, SORT_STRING);
print_r($data21);
echo '</pre></li>';
echo '</ul>';

echo '<p>文字列として並べ替える（降順）</p>';
$data22 = array('dd', 'aa', 'cc', 'bb');
echo '<ul>';
echo '<li><p>元の配列：</p><pre>';
print_r($data22);
echo '</pre></li>';
echo '<li><p>ソート後：</p><pre>';
rsort($data22, SORT_STRING);
print_r($data22);
echo '</pre></li>';
echo '</ul>';

echo '<p>連想配列の要素を数値として並べ替える（昇順）</p>';
$data31 = array('a' => 100, 'b' => 5, 'c' => 20, 'd' => 0);
echo '<ul>';
echo '<li><p>元の配列：</p><pre>';
print_r($data31);
echo '</pre></li>';
echo '<li><p>ソート後：</p><pre>';
sort($data31, SORT_NUMERIC);
print_r($data31);
echo '</pre></li>';
echo '</ul>';

echo '<p>連想配列の要素を数値として並べ替える（降順）</p>';
$data32 = array('a' => 100, 'b' => 5, 'c' => 20, 'd' => 0);
echo '<ul>';
echo '<li><p>元の配列：</p><pre>';
print_r($data32);
echo '</pre></li>';
echo '<li><p>ソート後：</p><pre>';
rsort($data32, SORT_NUMERIC);
print_r($data32);
echo '</pre></li>';
echo '</ul>';
?>
</div>
</body>
</html>
