<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>配列の末尾に値を追加したい</title>
</head>
<body>
<div>
<?php
echo '<p>配列の末尾に値を追加する</p>';
$data = array('a', 'b', 'c');
$val = 'XXX';

echo '<ul>';
echo '<li><p>追加前の配列：</p><pre>';
print_r($data);
echo '</pre></li>';
echo '<li>追加する値： ' . $val . '</li>';

echo '<li><p>追加後の配列：</p><pre>';
$data[] = $val;
print_r($data);
echo '</pre></li>';
echo '</ul>';
?>
</div>
</body>
</html>
