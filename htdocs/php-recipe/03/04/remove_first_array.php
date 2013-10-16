<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>配列の先頭を取り除きたい</title>
</head>
<body>
<div>
<ul>
<?php
$data = array('a', 'b', 'c', 'd');

echo '<li><p>取り除く前の配列：</p><pre>';
print_r($data);
echo '</pre></li>';
echo '<li><p>取り除く後の配列：</p><pre>';
$val = array_shift($data);
print_r($data);
echo '</pre></li>';
echo '<li><p>取り除いた値： ' . $val . '</p></li>';
?>
</ul>
</div>
</body>
</html>
