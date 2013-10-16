<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>配列に値が存在するか調べたい</title>
</head>
<body>
<div>
<?php
$data = array('aaa', 'bbb', 'ccc', 'ddd');
$keyword = 'bbb';

echo '<p>配列： ';
print_r($data);
echo '</p>';
echo '<p>検索する値： ' . $keyword . '</p>';

echo '<ul>';
echo '<li>in_array()関数の結果: ';
if (in_array($keyword, $data)) {
  echo 'true';
} else {
  echo 'false';
}
echo '</li>';

echo '<li>array_search()関数の結果: ';
$index = array_search($keyword, $data);
if ($index !== false) {
  echo $index;
} else {
  echo 'false';
}
echo '</li>';
echo '</ul>';
?>
</div>
</body>
</html>
