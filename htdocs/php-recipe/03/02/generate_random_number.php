<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>乱数を生成したい</title>
</head>
<body>
<div>
<?php
// 乱数のシード値を設定する
mt_srand((double) microtime() * 100000);

echo '<p>乱数を生成する: 0 ～ ' . mt_getrandmax() . '</p>';
echo '<ul>';
echo '<li>' . mt_rand() .  '</li>';
echo '<li>' . mt_rand() .  '</li>';
echo '<li>' . mt_rand() .  '</li>';
echo '</ul>';

echo '<p>5 ～ 20までの乱数を生成する</p>';
echo '<ul>';
echo '<li>' . mt_rand(5, 20) .  '</li>';
echo '<li>' . mt_rand(5, 20) .  '</li>';
echo '<li>' . mt_rand(5, 20) .  '</li>';
echo '</ul>';
?>
</div>
</body>
</html>
