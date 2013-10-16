<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>配列を連結して1つの文字列にしたい</title>
</head>
<body>
<div>
<?php
$data = array('terurou', 'taro', 'jiro');
$glue = ',';

echo '<p>対象の配列： ';
print_r($data);
echo '</p>';
echo '<p>区切り文字： ' . $glue . '</p>';

echo '<p>連結した文字列：' . implode($glue, $data) . '</p>';
?>
</div>
</body>
</html>
