<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>PHPの繰り返し構文を知りたい</title>
</head>
<body>
<div>
<?php
echo 'while構文： ';
$value = 5;
while ($value > 0) {
  echo $value . ' ';
  $value--;
}

echo '<br>for構文： ';
for ($value = 0; $value < 3; $value++) {
    echo $value . ' ';
}

echo '<br>do-while構文： ';
$value = 5;
do {
  echo $value . ' ';
  $value--;
} while ($value > 10);

echo '<br>foreach構文： ';
$fruit = array('apple' => 200, 'orange' => 100, 'grape' => 200);
foreach ($fruit as $key => $value) {
  echo $key . 'は' . $value . '円 ';
}
?>
</div>
</body>
</html>
