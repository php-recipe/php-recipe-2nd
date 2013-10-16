<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>配列の値を一度に複数の変数へセットしたい</title>
</head>
<body>
<div>
<?php
$data = array('terurou', '八木照朗', '25');

echo '<p>元の配列： ';
print_r($data);
echo '</p>';

# $id、$name、$ageにそれぞれ値をセットします。
list($id, $name, $age) = $data;

echo '<p>ID($id)： ' . $id . '</p>';
echo '<p>名前($name)： ' . $name . '</p>';
echo '<p>年齢($age)： ' . $age . '</p>';
?>
</div>
</body>
</html>
