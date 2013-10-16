<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>配列のすべての要素を一括処理したい(array_walk)</title>
</head>
<body>
<div>
<?php
// ユーザー定義関数
function printIdList($value, $index)
{
  echo '<ul>';
  echo '<li>No： ' . $index  . '</li>';
  echo '<li>Id： ' . $value  . '</li>';
  echo '</ul>';
}

echo '<p>対象の配列： ';
$idList = array('terurou', 'taro', 'jiro');
print_r($idList);
echo '</p>';

echo '<p>一括処理した結果</p>';
array_walk($idList, 'printIdList');
?>
</div>
</body>
</html>
