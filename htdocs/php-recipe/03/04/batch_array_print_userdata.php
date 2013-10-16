<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>配列のすべての要素を一括処理したい(array_map)</title>
</head>
<body>
<div>
<?php
// ユーザー定義関数
function printUserData($id, $name, $age)
{
  echo '<ul>';
  echo '<li>ID： '   . $id   . '</li>';
  echo '<li>Name： ' . $name . '</li>';
  echo '<li>Age： '  . $age  . '</li>';
  echo '</ul>';
}

$idList   = array('terurou', 'taro', 'jiro');
$nameList = array('八木照朗', '山田太郎', '鈴木次郎');
$ageList  = array(25, 72, 40);

echo '<p>1つ目の配列： ';
print_r($idList);
echo '</p>';
echo '<p>2つ目の配列： ';
print_r($nameList);
echo '</p>';
echo '<p>3つ目の配列： ';
print_r($ageList);
echo '</p>';

echo '<p>一括処理した結果</p>';
array_map('printUserData', $idList, $nameList, $ageList);
?>
</div>
</body>
</html>
